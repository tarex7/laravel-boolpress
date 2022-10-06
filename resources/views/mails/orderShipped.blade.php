@component('mail::message')
# Ciao!
Il tuo ordine è stato spedito!

@component('mail::button', ['url' => ''])
Tracking
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
