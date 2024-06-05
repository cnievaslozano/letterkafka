<x-kafka-layout>
    <x-kafka.header />
    @auth
        <div class="container flex mx-auto p-4 mt-4 gap-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 grid-rows-4">
            <div
                class=" col-span-1 md:col-span-2 lg:col-span-2 row-span-2 flex-shrink-0 p-3 flex flex-col items-center justify-center rounded-xl ">
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('storage/' . $usuario->profile_photo_path) }}"
                        alt="foto de perfil del usuario {{ $usuario->name }}" class="w-16 h-16 lg:w-20 lg:h-20 rounded-full">
                    <div class="p-3">
                        <div>
                            <h3 class="p-0 m-0">{{ $usuario->name }}</h3>
                        </div>
                        <div class=" text-gray-500">
                            {!! '@' !!}{{ strtolower(str_replace(' ', '', $usuario->name)) }}
                        </div>
                    </div>
                </div>
                <div class="flex">
                    <p class="flex items-center">{{ $usuario->followers->count() }} Seguidores |
                        {{ $usuario->following->count() }} Siguiendo | {{ $usuario->likedBooks->count() }}
                        <x-heroicon-s-heart class="w-6 ml-1" />
                    </p>
                </div>
            </div>

            <div class="items-center justify-center col-span-1 md:col-span-2 lg:col-span-3 row-span-4 px-4 py-2 rounded-xl  flex-shrink-0">
                <h2 class="text-center"> Sobre mí </h2>
                <p class="text-center"> {{ $usuario->about_us }}</p>
                <div class="flex gap-3 justify-center">
                    <a href="/user/profile"
                        class="w-fit border border-gray-400 text-white rounded-md px-4 py-2 mt-2 transition duration-500 ease select-none  focus:outline-none focus:shadow-outline bg-[#493736]">Editar
                        perfil</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-fit block border border-gray-400 text-white rounded-md px-4 py-2 mt-2 transition duration-500 ease select-none focus:outline-none focus:shadow-outline bg-[#493736]">
                            Cerrar Sesión
                        </button>
                    </form>
                </div>


            </div>
            <div
                class=" items-center justify-center col-span-1 md:col-span-2 lg:col-span-2 row-span-2 px-16 flex-shrink-0 flex flex-col items-start justify-center rounded-xl ">
                <h3 class="mb-0 ml-6 ">Mis listas:</h3>
                <ul class="ml-8">
                    @if ($usuario->bookLists->isEmpty())
                        <li class="mt-2">No hay listas de libros crea uno en <a class="inline font-bold"
                                href="{{ route('estanterias.index') }}">mis estanterias.</a></li>
                    @else
                        @foreach ($usuario->bookLists as $bookList)
                            <li>- <a class="inline" href="{{ route('estanterias.index') }}">{{ $bookList->list_name }}</a>
                            </li>
                        @endforeach
                    @endif
                </ul>

            </div>
        </div>

        {{-- TUS FAVORITOS --}}
        <x-kafka.bookInfo titulo="FAVORITOS" subtitulo="Tus 4 libros con mayor rating" :libros="$librosFavoritos" />


        {{-- las 4 ultimas REVIEWS. (ver mas) --}}

        <x-kafka.reviews subtitulo="Tus últimas 4 reviews" :reviews="$lastReviews" />
    @else
        <x-kafka.errorAuth />
    @endauth
</x-kafka-layout>
