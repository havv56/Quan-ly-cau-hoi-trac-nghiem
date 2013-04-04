import os
from django.conf import settings
from django.conf.urls.defaults import patterns, include, url
from django.views.generic.simple import direct_to_template
from quizzes.views import *
from UserProfile.views import *

site_media = os.path.join(
    os.path.dirname(__file__), 'site_media'
)

from django.contrib import admin
admin.autodiscover()

urlpatterns = patterns('',
	(r'^admin/', include(admin.site.urls)),
    (r'^$', main_page),
    (r'user_quizzes/(\w+)/$', user_page),
    (r'^login/$', login_page),
    (r'^logout/$', logout_page),
    (r'^register/$', register_page),
    (r'^register/success/$', direct_to_template,{ 'template': 'account/register_success.html'}),
    (r'^site_media/(?P<path>.*)$', 'django.views.static.serve',{ 'document_root': site_media }),
    (r'^mc/$', add_quest_page),
    (r'^add_quiz/$', add_quiz_page),
    (r'^edit_quiz/$', edit_quiz_page),
    (r'^edit_quest/$', edit_quest_page),
    (r'^delete/$', delete_quiz),
    (r'^del_quest/$', delete_quest),
    (r'^quizzes/$', quiz_page),
    (r'^profile/$', profile_page),
    (r'^edit_profile/$', edit_profile_page),
    (r'^do_quizzes/$', quiz),
    (r'^result/$', quiz),
    (r'^history/$', user_history),
    (r'^quiz_his/$', quiz_history),
    (r'^search/$', search_page),
    (r'^like/$', like),
    (r'^about/$', about),
    (r'^avatar/', include('avatar.urls')),
    url(r'^media/(?P<path>.*)$', 'django.views.static.serve',{'document_root': settings.MEDIA_ROOT,}),
    (r'^setting/', 'django.contrib.auth.views.password_change',{ 'template_name': 'account/setting.html', 'post_change_redirect': '/' }),
    
)