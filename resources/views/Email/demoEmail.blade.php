@component('mail::message')
# Welcome to Company app

Congratulations user, you just got registered with company app!  You are truly awesome! 

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
