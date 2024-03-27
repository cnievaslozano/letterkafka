<x-kafka-layout>
    <x-kafka.header />
    {{-- @auth --}}
    <div class="flex justify-center h-screen px-4">
        <div class="flex w-full max-w-screen-lg">
            <!-- menu lateral -->
            <div class="flex flex-col w-64 py-4 pr-3">
                <a class="px-3 py-2 mt-2 text-lg font-medium rounded-sm hover:bg-gray-300" href="#">Inicio</a>
                <a class="px-3 py-2 mt-2 text-lg font-medium rounded-sm hover:bg-gray-300" href="#">Discover</a>
                <a class="px-3 py-2 mt-2 text-lg font-medium rounded-sm hover:bg-gray-300"
                    href="#">Notificaciones</a>
                <a class="px-3 py-2 mt-2 text-lg font-medium rounded-sm hover:bg-gray-300" href="#">Listas</a>
                <a class="px-3 py-2 mt-2 text-lg font-medium rounded-sm hover:bg-gray-300" href="#">Favs Posts</a>
                <a class="flex px-3 py-2 mt-auto text-lg rounded-sm font-medium hover:bg-gray-200" href="#">
                    <span class="flex-shrink-0 w-10 h-10 bg-gray-400 rounded-full"></span>
                    <div class="flex flex-col ml-2">
                        <span class="mt-1 text-sm font-semibold leading-none">Username</span>
                        <span class="mt-1 text-xs leading-none">@username</span>
                    </div>
                </a>
            </div>
            <!-- fin menu lateral -->
            <!-- main feed -->
            <div class="flex flex-col flex-grow border-l border-r border-[#493736]">
                <div class="flex justify-between flex-shrink-0 px-8 py-4 border-b border-[#493736]">
                    <h1 class="text-xl font-semibold">Reviews Recientes</h1>
                </div>
                <div class="flex-grow h-0 overflow-auto">
                    @foreach ($reviews as $review)
                        <x-kafka.post :user="$review->user" :username="$review->username" :createdAt="$review->createdAt" :content="$review->content"
                            :portada="$review->portada" :userImage="$review->userImage" :likes="$review->likes" />
                    @endforeach
                </div>
            </div>
            <!-- end main feed -->
            <!-- popu -->
            <div class="flex flex-col flex-shrink-0 w-1/4 py-4 pl-4">
                <input class="flex items-center h-8 px-2 border border-gray-500 rounded-sm" type="search"
                    Placeholder="Search…">
                <div>
                    <h3 class="mt-6 font-semibold">Popular</h3>
                    <div class="flex w-full py-4 border-b border-[#493736]">
                        <span class="flex-shrink-0 w-10 h-10 bg-gray-400 rounded-full"></span>
                        <div class="flex flex-col flex-grow ml-2">
                            <div class="flex text-sm">
                                <span class="font-semibold">Username</span>
                                <span class="ml-1">@username</span>
                            </div>
                            <p class="mt-1 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, et dolore
                                magna aliqua. <a class="underline" href="#">#hashtag</a></p>
                        </div>
                    </div>
                    <div class="flex w-full py-4 border-b border-[#493736]">
                        <span class="flex-shrink-0 w-10 h-10 bg-gray-400 rounded-full"></span>
                        <div class="flex flex-col flex-grow ml-2">
                            <div class="flex text-sm">
                                <span class="font-semibold">Username</span>
                                <span class="ml-1">@username</span>
                            </div>
                            <p class="mt-1 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, et dolore
                                magna aliqua. <a class="underline" href="#">#hashtag</a></p>
                        </div>
                    </div>
                    <div class="flex w-full py-4 border-b border-[#493736]">
                        <span class="flex-shrink-0 w-10 h-10 bg-gray-400 rounded-full"></span>
                        <div class="flex flex-col flex-grow ml-2">
                            <div class="flex text-sm">
                                <span class="font-semibold">Username</span>
                                <span class="ml-1">@username</span>
                            </div>
                            <p class="mt-1 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, et dolore
                                magna aliqua. <a class="underline" href="#">#hashtag</a></p>
                        </div>
                    </div>
                    <h3 class="mt-6 font-semibold">Amigos</h3>
                    <div class="flex w-full py-4 border-b border-[#493736]">
                        <span class="flex-shrink-0 w-10 h-10 bg-gray-400 rounded-full"></span>
                        <div class="flex flex-col flex-grow ml-2">
                            <div class="flex text-sm">
                                <span class="font-semibold">Username</span>
                                <span class="ml-1">@username</span>
                            </div>
                            <p class="mt-1 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, et dolore
                                magna aliqua. <a class="underline" href="#">#hashtag</a></p>
                        </div>
                    </div>
                    <div class="flex w-full py-4 border-b border-[#493736]">
                        <span class="flex-shrink-0 w-10 h-10 bg-gray-400 rounded-full"></span>
                        <div class="flex flex-col flex-grow ml-2">
                            <div class="flex text-sm">
                                <span class="font-semibold">Username</span>
                                <span class="ml-1">@username</span>
                            </div>
                            <p class="mt-1 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, et dolore
                                magna aliqua. <a class="underline" href="#">#hashtag</a></p>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end popu -->

        </div>
    </div>
    {{-- @endauth --}}
</x-kafka-layout>
