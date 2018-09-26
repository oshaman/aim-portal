<h1>{{ __('auth.email_confirmation') }}</h1>
{{ __('auth.email_confirmation_click') }}</br>


<a href="{{url('/verifyemail/'.$email_token)}}">{{ __('auth.email_confirmation_agree') }}</a>

