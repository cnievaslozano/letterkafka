@props([
    'autor' => $hotbook['autor'],
    'enlace' => $hotbook['enlace'],
    'imagen' => $hotbook['imagen'],
    'texto' => $hotbook['texto'],
])

<h3 class="title--big">Popular este mes</h3>
<a class="codepen-item pie" href="{{ $enlace }}" target="_blank"><img class="pie__image" alt="portada"
        src="{{ $imagen }}" />
    <div class="pie__subtitle">{{ $autor }}</div>
    <div class="pie__content">
        <p>{{ $texto }}</p>
    </div>
</a>
{{-- Review con más likes de este libro --}}
<div class="sidebar-item captcha" href="#" target="_blank">
    <h5>Review más famosa</h5>
    <p>"<span class="font-bold">El Castillo</span>" es una novela inacabada escrita por Franz Kafka, uno de los autores
        más influyentes del siglo XX. Publicada póstumamente, esta obra ofrece una exploración profunda de temas como el
        <span class="font-bold">poder</span>, la <span class="font-bold">burocracia</span> y la <span
            class="font-bold">alienación</span>. La historia sigue al protagonista, K., quien es contratado para
        trabajar como agrimensor en un remoto pueblo dominado por un castillo imponente y misterioso.
        <a href="#" target="_blank"> Leer más</a>
    </p>
</div>
