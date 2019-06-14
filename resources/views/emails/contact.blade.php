@component('mail::message')

<strong>Nom :</strong> {{ $data['name'] }}

<strong>Email :</strong> {{ $data['email'] }}

<strong>Sujet :</strong> {{ $data['subject'] }}

<strong>Message :</strong>

{{ $data['message'] }}

@endcomponent
