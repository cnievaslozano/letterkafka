<div class=" rounded-md bg-stone-900 shadow-lg mb-4 mt-2">
    <div class="md:flex px-4 leading-none max-w-4xl">
        <div class="flex-none">
            <a href="#">
                <img src="{{ $imageUrl }}" alt="{{ $title }}"
                    class="h-72 w-56 rounded-md shadow-2xl transform -translate-y-4 border-2 border-white  shadow-lg" />
            </a>
        </div>

        <div class="flex-col text-gray-300">
            <p class="pt-4 text-center text-2xl font-bold">{{ $title }}</p>
            <hr class="hr-text mt-0 mb-1" data-content="" />
            <div class="text-md flex justify-between px-4">
                <span class="font-bold">{{ $autor }} | {{ $genres }} | {{ $duration }}</span>
            </div>
            <p class="hidden md:block px-4 my-4 text-sm text-left">{{ $description }}</p>

            <p class="flex text-md px-4 my-2">
                Rating: {{ $rating }}
                <span class="font-bold px-2">|</span>
                Mood: {{ $mood }}
            </p>

            <div class="text-xs text-center mb-4">
                <button type="button"
                    class="border border-gray-400  rounded-md px-4 py-2 m-2 transition duration-500 ease select-none  focus:outline-none focus:shadow-outline bg-[#493736]">REVIEWS</button>
                <button type="button"
                    class="border border-gray-400  rounded-md px-4 py-2 m-2 transition duration-500 ease select-none  focus:outline-none focus:shadow-outline bg-[#493736]">VER</button>
            </div>
        </div>
    </div>
    
</div>
