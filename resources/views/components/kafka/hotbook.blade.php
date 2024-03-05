@props(['autor' => $hotbook['autor'],'enlace' => $hotbook['enlace'], 'imagen' => $hotbook['imagen'], 'texto' => $hotbook['texto']])

<h3 class="title--big">Popular este mes</h3>
<a class="codepen-item pie" href="{{ $enlace }}" target="_blank"><img class="pie__image" alt="portada"
        src="{{$imagen}}" />
    <div class="pie__subtitle">{{$autor}}</div>
    <div class="pie__content">
        <p>{{ $texto }}</p>
    </div>
</a>
