<div class=" rounded-md bg-stone-900 shadow-lg mb-4 mt-2">
    <div class="md:flex px-4 leading-none max-w-4xl">
        <div class="flex-none">
            <a href="{{ route('libros.show', ['titulo' => Str::slug($title), 'id' =>  $id ]) }}">                <img src="{{ $imageUrl }}" alt="{{ $title }}"
                    class="transition-transform duration-300 transform hover:scale-105 h-72 w-56 rounded-md transform -translate-y-4 border-2 border-white  shadow-lg" />
            </a>
        </div>

        <div class="flex-col text-gray-300">
            <p class="pt-4 text-center text-2xl font-bold">{{ $title }}</p>
            <hr class="hr-text mt-0 mb-1" data-content="" />
            <div class="text-md flex justify-between px-4">
                <span class="font-bold">{{ $autor }} | {{ $genres }} | {{ $duration }}</span>
            </div>
            <p class="hidden md:block px-4 my-4 text-md text-left">{{ implode(' ', array_slice(explode(' ', $description), 0, 60)) }}...</p>

            <p class="flex text-md px-4 mt-2 mb-6">
                Rating: {{ $rating }}
                <span class="font-bold px-2">|</span>
                Likes: {{ $like }}
            </p>

            
        </div>
    </div>

</div>
