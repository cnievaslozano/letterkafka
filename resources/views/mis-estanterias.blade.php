<x-kafka-layout>
    <x-kafka.header />
    @auth
    <div class="flex flex-col items-center justify-center">
        <h2 class="text-center mt-4 ">Mis Estanterías</h2>
        <div class="flex">
            <div class="flex items-center">
                <span class="font-bold"><a href="#">Readlist</a></span>
                <span class="mx-1">•</span>
            </div>
            <div class="flex items-center">
                <span><a href="#">Only Fantasy</a></span>
                <span class="mx-1">•</span>
            </div>
            <div class="flex items-center">
                <span><a href="#">Filosofica</a></span>
                <span class="mx-1">•</span>
            </div>
            <div class="flex items-center">
                <span><a href="#">Fantasía Medieval</a></span>
            </div>
        </div>

        <hr class="bg-orange-800 border-t-1 w-2/3 ">
        <div class="flex flex-wrap">
            @for ($i = 0; $i < 16; $i++)
                @if ($i % 4 == 0)
                    <div class="flex w-full justify-center gap-4">
                @endif
                <a href="#" class="group flex flex-col items-center">
                    <div class="overflow-hidden rounded-lg">
                        <img src="https://placehold.co/177x250"
                            alt="Tall slender porcelain bottle with natural clay textured body and cork stopper."
                            class="h-full w-full object-cover object-center group-hover:opacity-75">
                    </div>
                    <h3 class="mt-2 mb-0 text-sm text-gray-700">Franz Kafka</h3>
                    <h4 class="mt-1 mb-5 text-lg font-medium text-gray-900">La metamorfosis</h4>
                </a>
                @if (($i + 1) % 4 == 0 || $i == 19)
        </div>
                @endif
            @endfor
    </div>

    {{-- PAGINATOR CUANDO ESTE EL BACKEND
    {{ $books->links('components.kafka.pagination') }}
   --}}
   @else
        <x-kafka.errorAuth />
    @endauth
</x-kafka-layout>
