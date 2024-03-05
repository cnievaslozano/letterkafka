@props(['enlace' => $blogsAleatorios['enlace'], 'fuente' => $blogsAleatorios['fuente'], 'titulo' => $blogsAleatorios['titulo'], 'texto' => $blogsAleatorios['texto'], 'imagen' => $blogsAleatorios['imagen']])

<div class="item-with-image cssgrid-collection">
    <a class="cssgrid-collection__image" href="{{ $enlace }}" target="_blank">
        <img src="{{$imagen}}" />
    </a>
    <div class="cssgrid-collection__content">
        <h4><a href="{{ $enlace }}" target="_blank">{{ $titulo }} <figcaption>(fuente: {{ $fuente }})
                </figcaption></a></h4>
        <div class="multi-column-3">
            <p>
                {{ $texto }} <a href="{{ $enlace }}" target="_blank">Leer más</a>
            </p>
        </div>
    </div>
</div>
