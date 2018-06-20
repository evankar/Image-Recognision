from django.urls import path
from . import views

urlpatterns = [
	path('', views.HomePageView.as_view(), name='home'),
	path('about/', views.AboutPageView.as_view(), name='about'),
#	path('features/', views.FeaturesPageView.as_view(), name='features')
]
