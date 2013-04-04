from django.contrib.auth.decorators import login_required
from django.template.context import RequestContext
from django.shortcuts import render_to_response, get_object_or_404
from django.http import HttpResponseRedirect, HttpResponse, Http404
from django.contrib.auth import *
from django.contrib.auth.models import check_password, User
from django.core.mail import send_mail
from django.core.paginator import Paginator ,InvalidPage
from django.views.generic.simple import direct_to_template
from UserProfile.forms import *
from UserProfile.models import Profile
from Quizzes.UserProfile.forms import Profile_Form, RegistrationForm, LoginForm, Edit_Profile_Form
from Quizzes.quizzes.models import History, Quizzes
from quizzes.models import *

def register_page(request):
    if request.method == 'POST':
        form = RegistrationForm(request.POST)
        if form.is_valid():
            user = User.objects.create_user(
                username=form.cleaned_data['username'],
                password=form.cleaned_data['password1'],
                email=form.cleaned_data['email']
            )
            user.first_name = form.cleaned_data['first_name']
            user.last_name = form.cleaned_data['last_name']
            user.save()   
            profile = Profile.objects.create(user = user ,phone_number = form.cleaned_data['phone_number'])
            profile.save()
            return HttpResponseRedirect('/register/success/')
    else:
        form = RegistrationForm()
    variables = RequestContext(request, {'form': form})
    return render_to_response('account/register.html',variables)

def login_page(request):
    if request.user.is_authenticated():
        return HttpResponseRedirect('/user/%s' % request.user.username)
    else:
        if request.method == 'POST':
            form = LoginForm(request.POST)
            if form.is_valid():
                if not request.POST.get('remember', None):
                    request.session.set_expiry(0)
                username=request.POST['username']
                password=request.POST['password']
                user = authenticate(username=username, password=password)
                if user is not None:
                    if user.is_active:
                        login(request, user)
                        return HttpResponseRedirect('/')
                    else:
                        return HttpResponse('Your account is not active')
                else:
                    return HttpResponse('Invalid login')
        else:
            form = LoginForm()
        var = RequestContext(request, {
            'head_title': 'Login',
            'title':'LOGIN',
            'form':form,
        })
        return render_to_response('account/login.html', RequestContext(request, var))

def logout_page(request):
    logout(request)
    return HttpResponseRedirect('/')

ITEMS_PER_PAGE = 10
@login_required
def user_page(request, username):
    user = get_object_or_404(User, username=username)
    q = Quizzes.objects.filter(user=user).order_by('like.count').order_by('-time')
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
    variables = RequestContext(request,{
        'quizzes': quizzes,
        'show_paginator': paginator.num_pages > 1,
        'has_prev': page.has_previous(),
        'has_next': page.has_next(),
        'page': page_number,
        'pages': paginator.num_pages,
        'next_page': page_number + 1,
        'prev_page': page_number - 1,
    })
    return render_to_response('account/user_page.html', variables)

@login_required
def change_password_page(request):
    if request.method == 'POST' :
        form = Change_Password_Form(request.POST)
        if form.is_valid():
            user = User.objects.get(username = request.user.username)
            raw_pass = self.cleaned_data['password']
            new_pass = self.cleaned_data['password1']
            encode_pass = user.password
            if check_password(raw_pass, encode_pass):
                user.set_password(new_pass)
                user.save()
                return HttpResponseRedirect('home.html')
            else:
                return HttpResponseRedirect('change_password.html')
    else:
        form = Change_Password_Form()
    variables = RequestContext(request, {'form': form})
    return render_to_response('account/change_password.html', variables)

@login_required
def profile_page(request):
    user = get_object_or_404(User,username = request.GET.get('u'))
    profile = get_object_or_404(Profile, user = user)
    username = profile.user.username
    first_name = profile.user.first_name
    last_name = profile.user.last_name
    email = profile.user.email
    phone_number = profile.phone_number
    q = Quizzes.objects.filter(user=user, is_public=True).order_by('like.count').order_by('-time')
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
    var = RequestContext(request, {
        'username' : username,
        'first_name' : first_name,
        'last_name' : last_name,
        'email' : email,
        'phone_number' : phone_number,
        'quizzes': quizzes,
        'show_paginator': paginator.num_pages > 1,
        'has_prev': page.has_previous(),
        'has_next': page.has_next(),
        'page': page_number,
        'pages': paginator.num_pages,
        'next_page': page_number + 1,
        'prev_page': page_number - 1,
    })
    return render_to_response('account/profile.html', var)

@login_required
def edit_profile_page(request):
    if request.method == 'POST':
        form = Edit_Profile_Form(request.POST)
        if form.is_valid():
            user = get_object_or_404(User, username=request.user)
            old_pwd = form.cleaned_data['password']
            new_pwd = form.cleaned_data['password1']
            hash_pwd = user.password
            if check_password(old_pwd,hash_pwd):
                user.set_password(new_pwd)
            user.first_name = form.cleaned_data['first_name']
            user.last_name = form.cleaned_data['last_name']
            user.save()
            phone_number = form.cleaned_data['phone_number']
            profile = get_object_or_404(Profile, user = request.user)
            profile.phone_number = phone_number
            profile.save()
            return direct_to_template(request, "account/edit_profile_success.html")
    else:

        profile = get_object_or_404(Profile, user = request.user)
        first_name = profile.user.first_name
        last_name = profile.user.last_name
        phone_number = profile.phone_number
        form = Edit_Profile_Form(
                                 {
                                  'first_name': first_name,
                                'last_name' : last_name,
                                'phone_number' : phone_number
                                })
    variables = RequestContext(request,
                               {'form': form}
                                )
    return render_to_response('account/edit_profile.html', variables)


@login_required
def user_history(request):
    user = get_object_or_404(User, username=request.GET.get('u'))
    history = History.objects.filter(user = user).order_by('-time')
    return render_to_response('account/user_history.html', RequestContext(request,{
        'history': history,
        'user': user,
    }))

def about(request):
    return direct_to_template(request, 'main/about_us.html')