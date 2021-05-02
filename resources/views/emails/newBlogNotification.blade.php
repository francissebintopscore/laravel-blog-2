@component('mail::message')
# Introduction
<h1>{{$title}}</h1>
The body of your message.

@component('mail::button', ['url' => route('test')])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
