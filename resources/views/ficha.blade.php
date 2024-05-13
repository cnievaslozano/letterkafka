<x-kafka-layout>
    <x-kafka.header />
    {{-- FICHA DEL LIBRO --}}
    <section class="text-gray-700 body-font overflow-hidden">
        <div class="container py-12 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap ">
                <img alt="Portada del libro {{ $libro->title }}"
                    class="h-full transition-transform duration-300 transform hover:scale-105 xs:w-full w-1/3 object-cover object-center rounded-lg border"
                    src="{{ $libro->cover }}">
                <div class="xs:w-full w-2/3 lg:pl-10 mt-6 lg:mt-0">
                    <h2 class="text-sm text-gray-500 tracking-widest">{{ $libro->author }}</h2>
                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $libro->title }}</h1>
                    @foreach (explode(',', $libro->genre) as $genre)
                        <x-bladewind.tag label="{{ $genre }}" color="gray" />
                    @endforeach

                    <div class="flex mb-4">
                        <div class="flex items-center">
                            <span class="text-gray-600 ml-3">Rating {{ $libro->avgRating() }}</span>
                            <span class="text-gray-600 ml-3">Reviews {{ $libro->reviews()->count() }}</span>
                            <span class="text-gray-600 ml-3 flex align-middle"><x-heroicon-s-heart class="w-5" />
                                {{ $libro->likes()->count() }}</span>
                        </div>
                        <span class="flex ml-3 pl-3 py-2 border-l-2 border-orange-800">
                            <a class="text-gray-500 transition duration-300 ease-in-out transform hover:scale-110"
                                href="https://web.whatsapp.com/send?text=letterkafka.es%2F&text=Me%20encanta%20este%20libro:%20{{ $libro->title }}">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12,2C6.477,2,2,6.477,2,12c0,1.592,0.382,3.091,1.043,4.427l-1.005,4.019c-0.229,0.915,0.6,1.745,1.516,1.516 l4.019-1.005C8.909,21.618,10.408,22,12,22c5.523,0,10-4.477,10-10C22,6.477,17.523,2,12,2z"
                                        opacity=".35"></path>
                                    <path
                                        d="M16.393,13.467c-0.809-0.809-2.121-0.809-2.93,0l-0.516,0.516l-2.93-2.93l0.516-0.516c0.809-0.809,0.809-2.121,0-2.93	s-2.121-0.809-2.93,0c-0.517,0.517-0.7,1.239-0.556,1.904c0.123,0.919,0.606,3.029,2.509,4.932c1.903,1.903,4.013,2.386,4.932,2.509	c0.665,0.144,1.387-0.039,1.904-0.556C17.202,15.587,17.202,14.276,16.393,13.467z">
                                    </path>
                                </svg>
                            </a>
                            <a class="ml-2 text-gray-500 transition duration-300 ease-in-out transform hover:scale-110"
                                href="https://twitter.com/intent/post?url=https%3A%2F%2Fletterkafka.es%2F&text=Me%20encanta%20este%20libro:%20{{ $libro->title }}">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                    viewBox="0 0 24 24">
                                    <path d="M16,6c-0.552,0-1,0.448-1,1s0.448,1,1,1s1-0.448,1-1S16.552,6,16,6z"></path>
                                    <path
                                        d="M21.418,4.776c0.313-0.368-0.08-0.91-0.526-0.723c-0.745,0.312-1.56,0.591-2.138,0.705	c-0.029,0.008-0.053,0.017-0.081,0.025c-0.876-0.864-2.075-1.399-3.403-1.399c-2.676,0-4.846,2.17-4.846,4.846	c0,0.141-0.012,0.401,0,0.538c-3.026,0-5.446-1.328-7.31-3.18c-0.473-0.47-1.277-0.152-1.313,0.513	C1.79,6.284,1.785,6.468,1.785,6.649c0,1.509,1.179,2.991,3.016,3.909c-0.338,0.087-0.711,0.15-1.099,0.15	c-0.355,0-0.848-0.146-1.247-0.301c-0.314-0.122-0.628,0.168-0.536,0.492c0.476,1.67,2.389,2.796,4.116,3.143	c-0.404,0.238-1.218,0.262-1.615,0.262c-0.117,0-0.359-0.022-0.62-0.052c-0.422-0.048-0.707,0.429-0.457,0.772	c0.847,1.164,2.452,1.809,3.995,1.836c-1.046,0.82-2.766,1.278-4.482,1.477c-0.606,0.071-0.738,0.9-0.183,1.153	c1.575,0.719,3.148,1.125,4.893,1.125c8.002,0,12.55-6.099,12.55-11.848c0.001-0.204-0.007-0.752-0.019-0.978	c0.604-0.436,1.151-0.948,1.626-1.52c0.167-0.201-0.033-0.495-0.281-0.414c-0.536,0.175-1.095,0.298-1.671,0.367	C20.28,5.918,20.909,5.375,21.418,4.776z"
                                        opacity=".35"></path>
                                </svg>
                            </a>
                            <a class="ml-2 text-gray-500 transition duration-300 ease-in-out transform hover:scale-110"
                                href="https://telegram.me/share/urlurl=https%3A%2F%2Fletterkafka.es%2F&text=text=Me%20encanta%20este%20libro:%20{{ $libro->title }}">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M2.926,13.098l3.085,1.209c0.326,0.128,0.578,0.395,0.688,0.727l1.287,3.918	c0.274,0.835,1.301,1.134,1.98,0.576l2.228-1.829c0.282-0.232,0.692-0.22,0.961,0.028l2.851,2.63	c1.035,0.955,2.716,0.408,2.991-0.973l2.979-14.961c0.186-0.935-0.747-1.698-1.627-1.33l-17.454,7.3	C1.687,10.9,1.706,12.62,2.926,13.098z"
                                        opacity=".35"></path>
                                    <path
                                        d="M11.458,16.271l6.99-9.163c0.328-0.43-0.211-0.982-0.648-0.665L6.467,14.645c0.098,0.115,0.184,0.242,0.232,0.389	l1.287,3.918c0.126,0.383,0.413,0.647,0.75,0.773C9.639,19.981,11.458,16.271,11.458,16.271z">
                                    </path>
                                </svg>
                            </a>
                        </span>
                    </div>
                    <p class="leading-relaxed pb-2"> {{ $libro->description }} </p>

                    <div class="flex justify-end border-t-2 border-orange-800 py-2 gap-2">
                        <!-- modal component -->
                        <div x-data="{ modelOpen: false }">
                            <button @click="modelOpen =!modelOpen"
                                class="font-bold peer cursor-pointer rounded-xl bg-orange-800 px-4 py-2  tracking-wide  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700  text-white "
                                aria-describedby="tooltipReview">

                                <span>Hacer review</span>
                            </button>

                            <x-kafka.modal id="{{ $libro->id }}" title="{{ $libro->title }}"
                                author="{{ $libro->author }}" />
                        </div>
                        <!-- end modal component -->
                        <div class="relative">
                            <button id="likeButton" type="button" @guest disabled @endguest
                                class="peer cursor-pointer rounded-xl bg-orange-800 px-4 py-2 font-medium tracking-wide  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700  text-slate-300 "
                                aria-describedby="tooltipLike">
                                <x-heroicon-s-heart id="heartIcon"
                                    class="w-6 transition duration-300 ease-in-out transform hover:scale-110 hover:filter hover:brightness-110" />
                            </button>
                            
                            @guest
                                <div id="tooltipLike"
                                    class="absolute -top-9 left-1/2 -translate-x-1/2 z-10 whitespace-nowrap rounded  px-2 py-1 text-center text-sm  opacity-0 transition-all ease-out peer-hover:opacity-100 peer-focus:opacity-100 bg-white text-black"
                                    role="tooltip">¡Inicia sesión!</div>
                            @endguest
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- REVIEWS DEL LIBRO. (ver mas) --}}
    <x-kafka.reviews subtitulo="Las últimas 4 reviews" :reviews="$lastReviews" />


    {{-- LIBROS PARECIDOS/ RECOMENDADOS --}}
    <x-kafka.bookInfo titulo="RECOMENDADOS" subtitulo="4 libros parecidos" :libros="$recomendaciones" />


</x-kafka-layout>

<script>
    document.getElementById('likeButton').addEventListener('click', function() {
        var bookId = {{ $libro->id }};

        // Enviar la solicitud AJAX
        fetch('/libro/' + bookId + '/like', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('heartIcon').classList.add('text-red-500'); 
            } 
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
</script>
