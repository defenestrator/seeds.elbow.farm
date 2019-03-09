@component('mail::message')
# New Contact Message:
@component('mail::panel')

### Message
{{ $data['message'] }}

### Name
{{ $data['email_address'] }}

### From Email Address
{{ $data['email_address'] }}

@endcomponent
## Write them back, dude.

Thanks, <br>
{{ config('app.name') }} Happy-ass Mailbot!

@endcomponent
