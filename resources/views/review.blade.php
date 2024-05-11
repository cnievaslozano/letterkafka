<x-kafka-layout>
    <x-kafka.header />
    <div class="flex flex-col md:flex-row justify-around p-6 gap-3">

        {{-- Usuario & libro --}}
        <div class="w-full md:w-2/5 flex-shrink-0 flex flex-col items-center mt-3 rounded-xl">
            <div class="flex items-center space-x-4">
                <img src="https://avatars2.githubusercontent.com/u/1490347?s=460&u=39d7a6b9bc030244e2c509119e5f64eabb2b1727&v=4"
                    alt="My profile" class="w-16 h-16 lg:w-20 lg:h-20 rounded-full">
                <div class="p-3">
                    <div>
                        <h3 class="p-0 m-0">Antério Vieira da Silva Lima</h3>
                    </div>
                    <div class=" text-gray-500">
                        @anterioVieria
                    </div>
                </div>
            </div>
            <div class="flex ">
                <p class="flex items-center">100 Seguidores | 22 Siguiendo | 42 <x-heroicon-s-heart class="w-6 ml-1" />
                </p>
            </div>

            <div class="mt-6">
                <a href="#" class="group flex flex-col items-center">
                    <div class="overflow-hidden rounded-lg">
                        <img src="https://placehold.co/250x400"
                            alt="Tall slender porcelain bottle with natural clay textured body and cork stopper."
                            class="h-full w-full object-cover object-center group-hover:opacity-75">
                    </div>
                    <h3 class="mt-2 mb-0 text-sm text-gray-700">Franz Kafka</h3>
                    <h4 class="mt-1 mb-5 text-lg font-medium text-gray-900">La metamorfosis</h4>
                </a>
            </div>
        </div>

        {{-- Review --}}
        <div class="w-full md:w-3/5">
            <h2 class="text-center">Review</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam voluptatibus impedit distinctio modi
                laborum necessitatibus, delectus repellat. Accusantium unde necessitatibus placeat, dolorum similique
                eos ab odio. Voluptate aperiam sit molestiae.</p>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam voluptatibus impedit distinctio modi
                laborum necessitatibus, delectus repellat. Accusantium unde necessitatibus placeat, dolorum similique
                eos ab odio. Voluptate aperiam sit molestiae.</p>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam voluptatibus impedit distinctio modi
                laborum necessitatibus, delectus repellat. Accusantium unde necessitatibus placeat, dolorum similique
                eos ab odio. Voluptate aperiam sit molestiae.</p>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam voluptatibus impedit distinctio modi
                laborum necessitatibus, delectus repellat. Accusantium unde necessitatibus placeat, dolorum similique
                eos ab odio. Voluptate aperiam sit molestiae.</p>

            <div class="flex items-center justify-end mr-3">
                <x-heroicon-s-heart
                    class="w-8 transition duration-300 ease-in-out transform hover:scale-110 hover:filter hover:brightness-110" />
            </div>
        </div>
    </div>

</x-kafka-layout>
