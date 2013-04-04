from django.contrib import admin
from Quizzes.quizzes.models import Quizzes, MCQ, Choice, History

admin.site.register(Quizzes)
admin.site.register(MCQ)
admin.site.register(Choice)
admin.site.register(History)