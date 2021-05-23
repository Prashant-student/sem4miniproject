@component('mail::message')
# {{ $data['title']}}

{{ $data['description'] }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
