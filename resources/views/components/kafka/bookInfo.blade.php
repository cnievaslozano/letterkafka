<section class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
    <h2 class="text-black  mb-1 title-font text-center tracking-widest"> {{ $titulo }} </h2>
    <p class="text-center mb-8">-- {{ $subtitulo }} --</p>
    @if (empty($libros))
        <x-kafka.errorMessage mensaje="Aún no hay has dado rating a ningún libro." />
    @else
        <div
            class="grid grid-cols-1 gap-x-6 gap-y-10 xs:grid-cols-4 sm:grid-cols-4 border-t-2 border-orange-800 py-4 xl:gap-x-8">
            @foreach ($libros as $libro)
                <a href="{{ route('libros.show', ['titulo' => Str::slug($libro->title), 'id' => $libro->id]) }}"
                    class="group">
                    <div
                        class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg xl:aspect-h-8 xl:aspect-w-7">
                        <img src="{{ $libro->cover }}"
                            alt="Tall slender porcelain bottle with natural clay textured body and cork stopper."
                            class="transition-transform duration-300 transform hover:scale-105 h-96 w-full object-cover object-center">
                    </div>
                    <h3 class="mt-4 text-sm text-gray-700">{{ $libro->author }} </h3>
                    <h4 class="mt-1 text-lg font-medium text-gray-900">{{ $libro->title }}</h4>
                </a>
            @endforeach
        </div>
    @endif
</section>