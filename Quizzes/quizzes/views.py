from datetime import datetime
import random
import django
from django.contrib.auth import logout, authenticate
from django.contrib.auth.decorators import login_required
from django.contrib.auth.models import User
from django.contrib.auth.views import login
from django.core.exceptions import ObjectDoesNotExist
from django.core.paginator import Paginator, InvalidPage
from django.shortcuts import render_to_response, get_object_or_404
from django.template.context import RequestContext
from django.http import HttpResponseRedirect, HttpResponse, Http404
from django.utils.datastructures import MultiValueDictKeyError
from Quizzes.UserProfile.views import ITEMS_PER_PAGE
from Quizzes.quizzes.forms import *
from Quizzes.quizzes.models import *
from django.db.models import Q
from django.views.decorators.csrf import csrf_exempt

ITEMS_PER_PAGE=5
def main_page(request):
    q = Quizzes.objects.filter(is_public=True).order_by('time').reverse()
    paginator = Paginator(q, ITEMS_PER_PAGE)
    try:
        page_number = int(request.GET['page'])
    except(KeyError,ValueError):
        page_number = 1
    try:
        page = paginator.page(page_number)
    except InvalidPage:
        raise Http404
    quizzes = page.object_list
    var = RequestContext(request,{
        'quizzes': quizzes,
        'show_paginator': paginator.num_pages > 1,
        'has_prev': page.has_previous(),
        'has_next': page.has_next(),
        'page': page_number,
        'pages': paginator.num_pages,
        'next_page': page_number + 1,
        'prev_page': page_number - 1,
        })
    return render_to_response('main/main_page.html', RequestContext(request, var))

@login_required
def add_quiz_page(request):
    if request.method == 'POST':
        form = QuizAddForm(request.POST)
        if form.is_valid():
            flag = True
            value = 5
            while flag:
                try:
                    q = Quizzes.objects.create(quiz_id = random_string(value), user = request.user, time = datetime.now())
                    flag = False
                except :
                    value+=1
            if request.POST['title'] == '':
                q.title='No title'
            else:
                q.title=request.POST['title']
            if request.POST['description'] == '':
                q.description='No description'
            else:
                q.description=request.POST['description']
            try:
                q.is_public=request.POST['is_public']
            except :
                pass
            q.save()
            return HttpResponseRedirect('/quizzes/?id=%s' % q.quiz_id)
    else:
        return render_to_response('quizzes/add_quiz.html', RequestContext(request, {'form':QuizAddForm}))

@login_required
def add_quest_page(request):
    q = get_object_or_404(Quizzes, quiz_id=request.GET.get('id'))
    if request.user!=q.user:
        return HttpResponse("You don't have permission!")
    if request.method == 'POST':
        form = QuestionAddFrom(request.POST)
        if form.is_valid():
            mcq = MCQ.objects.create()
            if request.POST['question'] != '':
                mcq.question=request.POST['question']
            tmp = int(request.POST['choices'])

            for i in xrange(4):
                if request.POST['answer_%d' % i]!='':
                    if i!=tmp:
                        mcq.choices.create(description=request.POST['answer_%d' % i], is_answer=False)
                    else:
                        mcq.choices.create(description=request.POST['answer_%d' % i], is_answer=True)

            mcq.save()
            q.mc.add(mcq)
            q.save()
            return HttpResponseRedirect('/quizzes/?id=%s' % request.GET.get('id'))
    else:
        form = QuestionAddFrom()
    var = RequestContext(request, {
        'form': form,
        'id': request.GET.get('id')
    })
    return render_to_response('quizzes/add_quest.html', var)

@login_required
def edit_quiz_page(request):
    if request.method=='POST':
        form = QuizEditForm(request.POST)
        if form.is_valid():
            q = Quizzes.objects.get(quiz_id = request.POST['hidden_id'])
            if not q:
                raise Http404('Invalid ID')

            q.title = request.POST['title']
            q.description = request.POST['description']
            try:
                q.is_public = request.POST['is_public']
            except MultiValueDictKeyError:
                q.is_public = False
            q.save()
            return HttpResponseRedirect('/')
    else:
        q = get_object_or_404(Quizzes, quiz_id=request.GET.get('id'))
        if request.user != Quizzes.objects.get(quiz_id=q.quiz_id).user:
            return HttpResponse('You don\'t have permission to edit this form')

        list = dict([])

        try:
            list['title'] = q.title
            list['description'] = q.description
            list['is_public'] = q.is_public
            list['hidden_id'] = q.quiz_id
        except:
            pass

        form = QuizEditForm(list)

    var = RequestContext(request, {
        'form': form,
        })
    return render_to_response('quizzes/edit_quiz.html', var)

@login_required
def edit_quest_page(request):
    try:
        q = get_object_or_404(Quizzes, quiz_id=request.GET.get('quiz_id'))
        if request.user!=q.user:
            return HttpResponse("You don't have permission!")
    except :
        pass
    if request.method=='POST':
        form = QuestionEditFrom(request.POST)
        print request.POST['hidden_quiz_id']
        if form.is_valid():
            mcq = MCQ.objects.get(id = request.POST['hidden_id'])

            if not mcq:
                raise Http404('Invalid ID')

            for c in mcq.choices.all():
                c.delete()

            mcq.question = request.POST['question']
            tmp = int(request.POST['choices'])

            for i in xrange(4):
                if i!=tmp:
                    mcq.choices.create(description=request.POST['answer_%d' % i], is_answer=False)
                else:
                    mcq.choices.create(description=request.POST['answer_%d' % i], is_answer=True)

            mcq.save()
            return HttpResponseRedirect('/quizzes/?id=%s' % request.POST['hidden_quiz_id'])
    else:
        mcq = get_object_or_404(MCQ, id=request.GET.get('id'))

        list = dict([])

        try:
            list['question'] = mcq.question
            i = 0
            for c in mcq.choices.all():
                list['answer_%s' % i] = c.description
                if c.is_answer==True:
                    list['choices'] = i
                i+=1
            list['hidden_id'] = request.GET.get('id')
            list['hidden_quiz_id'] = request.GET.get('quiz_id')
        except:
            pass

        form = QuestionEditFrom(list)

    var = RequestContext(request, {
        'form': form,
        })
    return render_to_response('quizzes/edit_quest.html', var)

@login_required
def delete_quiz(request):
    try:
        quiz = get_object_or_404(Quizzes, quiz_id=request.GET.get('id'))
        if request.user!=quiz.user:
            return HttpResponse("You don't have permission!")
    except :
        pass
    try:
        q = Quizzes.objects.get(quiz_id=request.GET.get('id'))
    except ObjectDoesNotExist:
        raise Http404('Quizzes not found')
    for mcq in q.mc.all():
        for c in mcq.choices.all():
            c.delete()
        mcq.delete()
    q.delete()
    return HttpResponseRedirect('/')

@login_required
def delete_quest(request):
    q = get_object_or_404(Quizzes, quiz_id=request.GET.get('quiz_id'))
    if request.user!=q.user:
        return HttpResponse("You don't have permission!")
    try:
        mcq = MCQ.objects.get(id=request.GET.get('id'))
    except ObjectDoesNotExist:
        raise Http404('Question not found')
    for c in mcq.choices.all():
        c.delete()
    mcq.delete()
    return HttpResponseRedirect('/quizzes/?id=%s' % request.GET.get('quiz_id'))

def random_string(n):
    """ Create n length random string """
    code = ''.join([random.choice('abcdefghijklmnoprstuvwyxzABCDEFGHIJKLMNOPRSTUVWXYZ0123456789') for i in range(n)])
    return code

@login_required
def quiz_page(request):
    q = get_object_or_404(Quizzes, quiz_id=request.GET.get('id'))
    user = request.user
    var = RequestContext(request,{
        'quizzes': q,
        'user': user,
        'mcq': q.mc,
        'id': request.GET.get('id'),
        'form': QuestionAddFrom,
    })
    return render_to_response("quizzes/show_quiz.html", var)

@login_required
@csrf_exempt
def quiz(request):
    if request.method == "POST":
        id=request.POST['id']
        q=get_object_or_404(Quizzes, quiz_id=id)
        tmp = [0 for x in xrange(q.mc.count())]
        correct=0
        i=0
        mcqs = q.mc.order_by('id')
        for mcq in mcqs:
            answer=int(request.POST['question%d' % i])
            tmp[i]=answer
            choice=mcq.choices.order_by('id')
            j=0
            for c in choice:
               if c.is_answer and j==answer:
                   correct+=1
                   break
               else:
                   j+=1
            i+=1
        result = History.objects.create(score = correct, user = request.user, quiz = q, time = datetime.now())
        result.save()
        var = RequestContext(request, {
            'id': id,
            'quiz': q,
            'correct': correct,
            'size':q.mc.count(),
            'mcq': q.mc,
            'answer': tmp,
        })
        return render_to_response('quizzes/result.html', var)
    else:
        q = get_object_or_404(Quizzes, quiz_id=request.GET.get('id'))
        value = [0 for x in xrange(q.mc.count())]
        i=0
        mcqs = q.mc.order_by('id')
        for mcq in mcqs:
            value[i] = mcq.question+'***'
            for c in mcq.choices.all():
                value[i] += c.description + '***'
            value[i] = value[i][:-3]
            i += 1
        var = RequestContext(request, {
            'title': q.title,
            'id': request.GET.get('id'),
            'value': value,
            'size': q.mc.count(),
        })
        return render_to_response('quizzes/quiz.html', var)

@login_required
def search_page(request):
    if request.method == 'POST':
        form = SearchForm(request.POST)
        if not form.is_valid():
            return render_to_response('quizzes/search.html',RequestContext(request,{'form': form}))
        else:
            q = Quizzes.objects.filter(Q(title__icontains = form.cleaned_data['keyword']), is_public=True).order_by('-time')
            paginator = Paginator(q, ITEMS_PER_PAGE)
            try:
                page_number = int(request.GET['page'])
            except(KeyError,ValueError):
                page_number = 1
            try:
                page = paginator.page(page_number)
            except InvalidPage:
                raise Http404
            quizzes = page.object_list
            var = RequestContext(request,{
                'quizzes': quizzes,
                'show_paginator': paginator.num_pages > 1,
                'has_prev': page.has_previous(),
                'has_next': page.has_next(),
                'page': page_number,
                'pages': paginator.num_pages,
                'next_page': page_number + 1,
                'prev_page': page_number - 1,
                'form': form,
                })
            return render_to_response('quizzes/search.html', RequestContext(request,var))
    form = SearchForm()
    return render_to_response('quizzes/search.html', RequestContext(request,{'form': form}))

@login_required
def quiz_history(request):
    q = get_object_or_404(Quizzes, quiz_id=request.GET.get('id'))
    history = History.objects.filter(quiz=q).order_by('-time')
    return render_to_response('quizzes/quiz_history.html', RequestContext(request,{
        'history': history,
        'quizzes': q,
        }))

@login_required
def like(request):
    q = get_object_or_404(Quizzes, quiz_id = request.GET.get('id'))
    liker = q.like.filter(user = request.user)
    if not liker:
        q.like.add(request.user)
        q.save()
    return HttpResponseRedirect('/')
