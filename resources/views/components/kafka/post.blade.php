@props(['user', 'userImage', 'creation_date', 'content', 'portada', 'likes', 'minipost'])

@if (!$minipost)
    <div class="flex w-full p-8 border-b border-[#493736]">
        <img src="{{asset($userImage) }}" class="flex-shrink-0 w-12 h-12 rounded-full object-cover"
            alt="Imagen de perfil del usuario {{ $user }}">
        <div class="flex flex-col flex-grow ml-4">
            <div class="flex">
                <span class="font-semibold">{{ $user }}</span>
                <a href="#"><span class="ml-1">{{ '@' . str_replace(' ', '', $user) }}</span></a>
                <span class="ml-auto text-sm">{{ $creation_date }}</span>
            </div>
            <div class="flex mt-3">
                <a href="#"><img src="{{ $portada }}" class="border border-black min-w-32 min-h-48"
                        alt="Portada del libro"></a>
                <p class="ml-4">{{ $content }} <a href="#">Leer más...</a></p>
            </div>
            <div class="flex mt-2">
                <button><x-heroicon-s-heart class="h-6 w-6" /></button>
                <span class="font-semibold">{{ $likes }}</span>
                <button><x-far-comment class="h-5 w-5 ml-3" /></button>
                <span class="font-semibold ml-1">0</span>
                <button><x-fas-share class="h-5 w-5 ml-3" /></button>
            </div>
        </div>
    </div>
@else
    <div class="flex w-full py-4 border-b border-[#493736]">
        <img class="flex-shrink-0 w-10 h-10 rounded-full" src="{{asset($userImage) }}" />
        <div class="flex flex-col flex-grow ml-2">
            <div class="flex text-sm">
                <span class="font-semibold">{{ $user }}</span>
                <span class="ml-1">{{ '@' . str_replace(' ', '', $user) }}</span>
            </div>
            <p class="mt-1 text-sm">{{ substr($content, 0, 100) }}. <a href="#">Leer más...</a></p>
            <div class="flex mt-2">
                <button><x-heroicon-s-heart class="h-4 w-4" /></button>
                <span class="font-semibold">{{ $likes }}</span>
            </div>
        </div>
    </div>
@endif

<?php


?>
