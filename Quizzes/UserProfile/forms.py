from django import forms
from django.contrib.auth.models import User
import re

class RegistrationForm(forms.Form):
    required_css_class = 'reg'
    first_name = forms.CharField(widget = forms.TextInput(attrs = {'placeholder' : 'Your first name'}), max_length = 30)
    last_name = forms.CharField(widget = forms.TextInput(attrs = {'placeholder' : 'Your last name'})  ,max_length = 30)
    username = forms.CharField(widget = forms.TextInput(attrs = {'placeholder' : 'Username'}) , label='Username', max_length=30)
    password1 = forms.CharField(widget=forms.PasswordInput(attrs = {'placeholder' : 'Password' },render_value = True), label='Password')
    password2 = forms.CharField(widget=forms.PasswordInput(attrs = {'placeholder' : 'Password (Again)'} , render_value = True),label='Password (Again)')
    email = forms.EmailField(widget = forms.TextInput(attrs = {'placeholder' : 'For_example@gmail.com'}) ,label='Email')
    phone_number = forms.CharField(widget = forms.TextInput(attrs = {'placeholder' : 'Your phone number'}), label = 'Phone Number', max_length = 20, required = False)

    def clean_password2(self):
        if 'password1' in self.cleaned_data:
            password1 = self.cleaned_data['password1']
            password2 = self.cleaned_data['password2']
            if (len(password1) < 6):
                raise forms.ValidationError('Password is too short')
            if password1 != password2:
                raise forms.ValidationError('Passwords do not match.')
            else:
                return self.cleaned_data
    
    def clean_username(self):
        username = self.cleaned_data['username']
        if not re.search(r'^\w+$', username):
            raise forms.ValidationError('Username can only contain alphanumeric characters and the underscore.')
        try:
            User.objects.get(username=username)
        except:
            return username
        raise forms.ValidationError('Username has already exits')
    def clean_email(self):
        email = self.cleaned_data['email']
        try:
            User.objects.get(email = email) 
        except:
            return email
        raise forms.ValidationError('Email is not available')
    def clean_phone_number(self):
        phone_number = self.cleaned_data['phone_number']
        if phone_number=='':
            return phone_number
        if not re.search(r'^\d+$', phone_number):
            raise forms.ValidationError('Phone number must be numeric !')
        else:
            return phone_number
class LoginForm(forms.Form):
    username = forms.CharField(label='Username', max_length=30)
    password = forms.CharField(label='Password',widget=forms.PasswordInput())
    remember = forms.BooleanField(label='Remember me', required=False)

    def clean_username(self):
        username = self.cleaned_data['username']
        try:
            User.objects.get(username=username)
        except:
            raise forms.ValidationError('Username is not exist')
        return username
    def clean_password(self):
        password = self.cleaned_data['password']
        try:
            user = User.objects.get(username = self.cleaned_data['username'])
        except :
            raise forms.ValidationError('Username is not exist')
        if user.check_password(password):
            return password
        else:
            raise forms.ValidationError('Invalid password')


class Edit_Profile_Form(forms.Form):
    password = forms.CharField(widget=forms.PasswordInput(attrs = {'placeholder' : 'Current password' },render_value = True),label = 'Password',required = False)
    password1 = forms.CharField(widget=forms.PasswordInput(attrs = {'placeholder' : 'New password' },render_value = True), label='New Password',required = False)
    password2 = forms.CharField(widget=forms.PasswordInput(attrs = {'placeholder' : 'New password (Again)'} , render_value = True),label='New Password (Again)',required = False)
    first_name = forms.CharField(widget = forms.TextInput(attrs = {'placeholder': 'First Name'}) , max_length = 30, required = False)
    last_name = forms.CharField(widget = forms.TextInput(attrs = {'placeholder': 'Last Name'}) , max_length = 30 , required = False)
    phone_number = forms.CharField(widget = forms.TextInput(attrs = {'placeholder': 'Phone Number'} ), max_length = 20 , required = False)
    def clean_new_password(self):
        if 'password1' in self.cleaned_data:
            pwd1 = self.cleaned_data['password1']
            pwd2 = self.cleaned_data['password2']
            if (len(password1) < 6):
                raise forms.ValidationError('New password is too short')
            if pwd1 == pwd2:
                return pwd1
            else:
                raise forms.ValidationError('New password not match')
        else:
            forms.ValidationError('Wrong submission')
    def clean_phone_number(self):
        phone_number = self.cleaned_data['phone_number']
        if phone_number=='':
            return phone_number
        if not re.search(r'^\d+$', phone_number):
            raise forms.ValidationError('Phone number must be numeric !')
        else:
            return phone_number
class Profile_Form(forms.Form):
    username = forms.CharField(max_length = 30)
    first_name = forms.CharField(max_length = 30)
    last_name = forms.CharField(max_length = 30)
    email = forms.CharField(max_length = 30)
    phone_number = forms.CharField(max_length = 20)
        
        
    
