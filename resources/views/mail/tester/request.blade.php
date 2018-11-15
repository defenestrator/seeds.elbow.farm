@component('mail::message')
# New Tester Request:
@component('mail::panel')
### Mailing Address
{{$data->address_1}}<br>
{{$data->address_2}}<br>
{{$data->city}}, {{$data->state}}<br>
{{$data->country}}, {{$data->postcode}}

### Message
{{ $data->message }}

### Email Address
{{ $data->email_address }}

### Journal

{{ $data->journal_link }}

Don't click it if it looks too sketchy.

@component('mail::button', ['url' => $data->journal_link])
See Journal
@endcomponent
@endcomponent
## Write them back, or send them beans, dude.

Thanks, <br>
{{ config('app.name') }}

@endcomponent
