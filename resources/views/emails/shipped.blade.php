@component('mail::message')


Olá <strong>{{$mailData['people']}}</strong>,

O bolo <strong>{{$mailData['cake']}}</strong>, que você me pediu para avisar, voltou ao estoque.

clique no botão abaixo para encomendar a quantidade que você precisa

@component('mail::button', ['url' => '#'])
Encomendar bolo
@endcomponent

Obrigado,<br>
 {{env('APP_ENV')}}
@endcomponent