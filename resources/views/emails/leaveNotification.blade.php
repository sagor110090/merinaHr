@component('mail::message')
# {{ $details['title'] }}

@component('mail::button', ['url' => url('/').$details['url']])
Show Detail
@endcomponent

@endcomponent