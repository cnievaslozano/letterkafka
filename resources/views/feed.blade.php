<x-kafka-layout>
    <x-kafka.header />
    @auth
    <div class="flex justify-center h-4/5 px-4">
        <div class="flex w-full max-w-screen-lg">
            {{-- menu lateral --}}
            <div class="flex flex-col w-64 py-4 pr-3">
                <a class="px-3 py-2 mt-2 text-lg font-medium rounded-sm hover:bg-gray-300" href="#">Inicio</a>
                <a class="px-3 py-2 mt-2 text-lg font-medium rounded-sm hover:bg-gray-300"
                    href="#">Notificaciones</a>
                <a class="px-3 py-2 mt-2 text-lg font-medium rounded-sm hover:bg-gray-300" href="#">Listas</a>
                <a class="px-3 py-2 mt-2 text-lg font-medium rounded-sm hover:bg-gray-300" href="#">Favs Posts</a>
                <a class="flex px-3 py-2 mt-auto text-lg rounded-sm font-medium hover:bg-gray-200" href="#">
                    @if(Auth::user()->profile_photo_path)
                    <img src="{{Auth::user()->profile_photo_path }}" alt="Profile Image" class="flex-shrink-0 w-10 h-10 rounded-full">
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
                    <h1 class="text-xl font-semibold">Reviews Recientes</h1>
                </div>
                <div class="flex-grow h-0 overflow-auto">
                    @foreach ($reviews as $review)
                    <x-kafka.post :user="$review->user->name"
                                  :creation_date="$review->formatearFechaCreacion()"
                                  :content="$review->content"
                                  :portada="$review->book->cover"
                                  :userImage="$review->user->profile_photo_path"
                                  :likes="$likesReview[$review->id]"
                                  :minipost="false"  />
                @endforeach
                </div>
            </div>
            {{-- end main feed --}}
            {{-- popu --}}
            <div class="flex flex-col flex-shrink-0 w-1/4 py-4 pl-4">
                <input class="flex items-center h-8 px-2 border border-gray-500 rounded-sm" type="search"
                    Placeholder="Search…">
                <div>
                    <h3 class="mt-6 font-semibold">Popular</h3>
                    @foreach ($reviewsPopulares as $popu)
                        <x-kafka.post :user="$popu->user->name"
                            :creation_date="$popu->creation_date"
                            :content="$popu->content"
                            :userImage="$popu->user->profile_photo_path"
                            :likes="$popu->likes_count"
                            :minipost="true"  />
                    @endforeach
                    <h3 class="mt-6 font-semibold">Amigos</h3>
                    @foreach ($reviewsAmigos as $amigo)
                        <x-kafka.post :user="$amigo->user->name"
                            :creation_date="$amigo->creation_date"
                            :content="$amigo->content"
                            :userImage="$amigo->user->profile_photo_path"
                            :likes="$popu->likes_count"
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
