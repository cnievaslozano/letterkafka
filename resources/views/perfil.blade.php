<x-kafka-layout>
    <x-kafka.header />

    <div class="container mx-auto p-4 mt-4 gap-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 grid-rows-4">
        <div
            class=" col-span-1 md:col-span-2 lg:col-span-2 row-span-2 flex-shrink-0 p-3 flex flex-col items-center justify-center rounded-xl ">
            <div class="flex items-center space-x-4">
                <img src="{{ asset($usuario->profile_photo_path) }}" alt="foto de perfil del usuario {{ $usuario->name }}"
                    class="w-16 h-16 lg:w-20 lg:h-20 rounded-full">
                <div class="p-3">
                    <div>
                        <h3 class="p-0 m-0">{{ $usuario->name }}</h3>
                    </div>
                    <div class=" text-gray-500">
                        {!! '@' !!}{{ strtolower(str_replace(' ', '', $usuario->name)) }}
                    </div>
                </div>
            </div>
            <div class="flex flex-col">
                <p class="flex items-center">{{ $usuario->followers->count() }} Seguidores |
                    {{ $usuario->following->count() }} Siguiendo | {{ $usuario->likedBooks->count() }}
                    <x-heroicon-s-heart class="w-6 ml-1" />
                </p>
                @auth
                    <p class="flex justify-around mt-4">

                        @if (!$sigueAlUsuario)
                            <button id="seguirButton"><i id="userPlus" class="fa-solid fa-user-plus fa-2x"></i></button>
                        @else
                            <button><i class="fa-solid fa-user-check fa-2x"></i></button>
                        @endif
                    </p>
                @endauth
            </div>
        </div>

        <div class=" col-span-1 md:col-span-1 lg:col-span-3 row-span-4 px-4 py-2 rounded-xl  flex-shrink-0">
            <h2> Sobre mí </h2>
            <p> {{ $usuario->about_us }}</p>
        </div>
        <div
            class=" col-span-1 md:col-span-2 lg:col-span-2 row-span-2 px-16 flex-shrink-0 flex flex-col items-start justify-center rounded-xl ">
            <h3 class="mb-0 ml-6 ">Listas:</h3>
            <ul class="ml-8">
                @if ($usuario->bookLists->isEmpty())
                    <li class="mt-2">Este usuario no tiene  <a class="inline font-bold"
                            href="{{ route('estanterias.index') }}">estanterias.</a></li>
                @else
                    @foreach ($usuario->bookLists as $bookList)
                        <li>- <a class="inline" href="{{ route('estanterias.user', ['username' => strtolower(str_replace(' ', '', $usuario->name)), 'id' => $usuario->id]) }}">{{ $bookList->list_name }}</a></li>
                    @endforeach
                @endif
            </ul>

        </div>
    </div>

    {{-- SUS FAVORITOS --}}
    <x-kafka.bookInfo titulo="FAVORITOS" subtitulo="Tus 4 libros con mayor rating" :libros="$librosFavoritos" />


    {{-- las 4 ultimas REVIEWS. (ver mas) --}}
    <x-kafka.reviews subtitulo="Tus últimas 4 reviews" :reviews="$lastReviews" />


</x-kafka-layout>

<script>
    document.getElementById('seguirButton').addEventListener('click', function() {
        var idUserToFollow = {{ $usuario->id }};

        // Enviar la solicitud AJAX
        fetch('/seguir/' + idUserToFollow, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('userPlus').className = 'fa-solid fa-user-check fa-2x';
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
</script>
