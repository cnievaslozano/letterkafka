<x-kafka-layout>
    <x-kafka.header />
    @auth
    <div class="flex justify-center h-4/5 px-4">
        <div class="flex w-full max-w-screen-lg">
            {{-- menu lateral --}}
            <div class="flex flex-col w-28 py-4 pr-3">
                <a class="px-3 py-2 mt-2 text-lg font-medium rounded-sm hover:bg-gray-300"
                href="{{route('feed.index')}}">Inicio</a>
                <form class="px-3 py-2 mt-2 text-lg font-medium rounded-sm hover:bg-gray-300" action="{{ route('feed.index') }}" method="POST">
                    @csrf
                    <input type="hidden" name="comunidad" value="true">
                    <button type="submit">Comunidad</button>
                </form>
                <form class="px-3 py-2 mt-2 text-lg font-medium rounded-sm hover:bg-gray-300" action="{{ route('feed.index') }}" method="POST">
                    @csrf
                    <input type="hidden" name="reviews_fav" value="true">
                    <button type="submit">Favs Posts</button>
                </form>
                <a class="flex px-3 py-2 mt-auto text-lg rounded-sm font-medium hover:bg-gray-200"
                href="{{ route('user.perfil', ['username' => strtolower(str_replace(' ', '', Auth::user()->name)), 'id' => Auth::user()->id])}}">
                    @if(Auth::user()->profile_photo_path)
                    <img src="{{asset('storage/'. Auth::user()->profile_photo_path )}}" alt="Profile Image" class="flex-shrink-0 w-10 h-10 rounded-full">
                    @else
                        <span class="flex-shrink-0 w-10 h-10 bg-gray-400 rounded-full"></span>
                    @endif
                    <div class="flex flex-col ml-2">
                        <span class="mt-1 text-sm font-semibold leading-none">{{ Auth::user()->name }}</span>
                        <span class="mt-1 text-xs leading-none">{{ '@' . str_replace(' ', '', Auth::user()->name) }}</span>
                    </div>
                </a>
            </div>
            {{-- fin menu lateral --}}
            {{-- main feed --}}
            <div class="flex flex-col flex-grow border-l border-r border-[#493736]">
                <div class="flex justify-between flex-shrink-0 px-8 py-4 border-b border-[#493736]">
                    @if ($comunidad)
                        <h1 class="text-xl font-semibold">Reviews de seguidos</h1>
                    @elseif ($favPosts)
                        <h1 class="text-xl font-semibold">Reviews Favoritas</h1>
                    @else
                        <h1 class="text-xl font-semibold">Reviews Recientes</h1>
                    @endif
                </div>
                <div class="flex-grow h-0 overflow-auto">
                    @if (isset($noCoincidencias) && $noCoincidencias)
                        <div class="text-red-800 text-center my-4 text-xl">No se encontraron resultados para la búsqueda.</div>
                    @elseif (empty($reviews))
                    <div class="text-red-800 text-center my-4 text-xl">No se encontraron resultados</div>
                    @else
                        @foreach ($reviews as $review)
                            <x-kafka.post :user="$review->user"
                                        :creation_date="$review->formatearFechaCreacion()"
                                        :content="$review"
                                        :libro="$review->book"
                                        :userImage="$review->user->profile_photo_path"
                                        :likes="$review->likesCount()"
                                        :minipost="false"  />
                        @endforeach
                    <div class="flex justify-center my-5">
                        <span id="mostrarMas" class="inline-block bg-br font-extrabold cursor-pointer px-4 py-2">Mostrar mas reviews</span>
                    </div>
                    @endif
                </div>
            </div>
            {{-- end main feed --}}
            {{-- popu --}}
            <div class="flex flex-col flex-shrink-0 w-1/4 py-4 pl-4">
                <form action="{{ route('feed.index') }}" method="GET" class="flex items-center" id="searchForm">
                    <input name="username" class="flex items-center h-8 px-2 border border-gray-500 rounded-sm" type="search" Placeholder="nombre de usuario" required>
                    <button type="submit" class="ml-2 bg-[#493736] text-white px-4 py-1 rounded hover:bg-[#493736] h-8">Buscar</button>
                </form>
                <div>
                    <h3 class="mt-6 font-semibold">Popular</h3>
                    @foreach ($reviewsPopulares as $popu)
                        <x-kafka.post :user="$popu->user"
                            :creation_date="$popu->creation_date"
                            :content="$popu"
                            :userImage="$popu->user->profile_photo_path"
                            :likes="$popu->likesCount()"
                            :minipost="true"  />
                    @endforeach
                    <h3 class="mt-6 font-semibold">Amigos</h3>
                    @foreach ($reviewsAmigos as $amigo)
                        <x-kafka.post :user="$amigo->user"
                            :creation_date="$amigo->creation_date"
                            :content="$amigo"
                            :userImage="$amigo->user->profile_photo_path"
                            :likes="$popu->likesCount()"
                            :minipost="true"  />
                    @endforeach

                </div>
            </div>
            {{-- end popu --}}

        </div>
    </div>
    @else
        <x-kafka.errorAuth />
    @endauth
</x-kafka-layout>
