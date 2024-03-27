@props(['user', 'userImage' , 'username' , 'createdAt', 'content', 'portada', 'likes'])

<div class="flex w-full p-8 border-b border-[#493736]">
    <img src="{{ $userImage }}" class="flex-shrink-0 w-12 h-12 rounded-full object-cover" alt="Imagen de perfil del usuario {{$username}}">
    <div class="flex flex-col flex-grow ml-4">
        <div class="flex">
            <span class="font-semibold">{{ $username }}</span>
            <a href="#"><span class="ml-1">{!! '@' !!}{{ $user }}</span></a>
            <span class="ml-auto text-sm">{{ $createdAt }}</span>
        </div>
        <div class="flex mt-3"> 
            <a href="#"><img src="{{ $portada }}" class="border border-black min-w-32 min-h-48" alt="Portada del libro"></a>
            <p class="ml-4"> {{ $content }} <a href="#">Leer más...</a></p>
        </div>
        <div class="flex mt-2">
            <button><x-heroicon-s-heart class="h-6 w-6" /></button>
            <span class="font-semibold">{{ $likes }}</span>
            <button><x-far-comment class="h-5 w-5 ml-3" /></button>
            <span class="font-semibold ml-1">0</span>
            <button><x-fas-share  class="h-5 w-5 ml-3" /></button>
        </div>
    </div>
</div>