@component('mail::message')
<h1>Saiu um novo episódio!</h1>

<p>Este e-mail está sendo enviado com o Laravel para {{ $user }}</p>
    @component('mail::button', ['url'=>'#'])
     Teste
    @endcomponent
@endcomponent