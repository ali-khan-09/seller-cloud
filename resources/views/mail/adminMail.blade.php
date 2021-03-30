@component('mail::message')
# Introduction
{{$account->email}}
{{$password}}
The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
