<x-kafka-layout>
    <x-kafka.header />
    <section class="text-gray-700 body-font overflow-hidden">
        <div class="container py-24 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap ">
                <img alt="Portada del libro {{ $libro->title }}"
                    class="hover:opacity-75 xs:w-full w-1/3 object-cover object-center rounded-lg border"
                    src="{{ $libro->cover }}">
                <div class="xs:w-full w-2/3 lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                    <h2 class="text-sm title-font text-gray-500 tracking-widest">{{ $libro->author_first_name }}
                        {{ $libro->author_last_name }}</h2>
                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $libro->title }}</h1>
                    @foreach (explode(',', $libro->genres) as $genre)
                        <x-bladewind.tag label="{{ $genre }}" color="gray" />
                    @endforeach

                    <div class="flex mb-4">
                        <span class="flex items-center">
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                </path>
                            </svg>
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                </path>
                            </svg>
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                </path>
                            </svg>
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                </path>
                            </svg>
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                                <path
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                </path>
                            </svg>
                            <span class="text-gray-600 ml-3">4 Reviews</span>
                        </span>
                        <span class="flex ml-3 pl-3 py-2 border-l-2 border-orange-800">
                            <a class="text-gray-500">
                                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    class="w-5 h-5" viewBox="0 0 24 24">
                                    <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                                </svg>
                            </a>
                            <a class="ml-2 text-gray-500">
                                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    class="w-5 h-5" viewBox="0 0 24 24">
                                    <path
                                        d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                    </path>
                                </svg>
                            </a>
                        </span>
                    </div>
                    <p class="leading-relaxed pb-2"> {{ $libro->plot }} </p>

                    <div class="flex border-t-2 border-orange-800 py-2">

                        <button
                            class="flex ml-auto text-white bg-orange-800 border-0 py-2 px-6 focus:outline-none hover:bg-orange-900 rounded">Review</button>
                        <button
                            class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                class="w-5 h-5" viewBox="0 0 24 24">
                                <path
                                    d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- REVIEWS DEL LIBRO. (ver mas) --}}
    {{-- Component: User feed  --}}

    <section class="container mx-auto px-28">
        <h2 class="text-black title-font text-center tracking-widest"> REVIEWS </h2>
        <ul aria-label="Reviews feed" role="feed"
            class="mx-auto relative flex flex-col gap-12 py-12 pl-8 before:absolute before:top-0 before:left-8 before:h-full before:border before:-translate-x-1/2 before:border-orange-800 before:border-dashed after:absolute after:top-6 after:left-8 after:bottom-6 after:border after:-translate-x-1/2 after:border-orange-800 ">
            @foreach ($ejReviews as $review)
                <li role="article" class="relative pl-8 ">
                    <div class="flex flex-col flex-1 gap-4">
                        <a href="#"
                            class="absolute z-10 inline-flex items-center justify-center w-8 h-8 text-white rounded-full -left-4 ">
                            <img src="{{ $review->userImage }}" alt="foto de perfil" title="user name" width="48"
                                height="48" class="max-w-full rounded-full" />
                        </a>
                        <h4
                            class="flex flex-col items-start text-lg font-medium leading-8 lg:items-center md:flex-row text-slate-700">
                            <span class="flex-1">{{ $review->username }}<span
                                    class="text-base font-normal text-slate-500">

                                    {!! '@' !!}{{ $review->user }}</span></span><span
                                class="text-sm font-normal text-orange-800">{{ \Carbon\Carbon::parse($review->createdAt)->format('Y/m/d') }}
                            </span>
                        </h4>
                        <p class="text-black">{{ $review->content }}. <a href="#">Leer más...</a></p>
                    </div>
                </li>
            @endforeach
        </ul>
    </section>


    {{-- LIBROS PARECIDOS/ RECOMENDADOS --}}
    <section class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <h2 class="text-black mb-8 title-font text-center tracking-widest"> RECOMENDADOS </h2>

        <div class="grid grid-cols-1 gap-x-6 gap-y-10 xs:grid-cols-4 sm:grid-cols-4 border-t-2 border-orange-800 py-4 xl:gap-x-8">
            @foreach ($ejRecomendaciones as $recomendacion)
                <a href="#" class="group">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg xl:aspect-h-8 xl:aspect-w-7">
                        <img src="{{ $recomendacion->cover }}"
                            alt="Tall slender porcelain bottle with natural clay textured body and cork stopper."
                            class="h-full w-full object-cover object-center group-hover:opacity-75">
                    </div>
                    <h3 class="mt-4 text-sm text-gray-700">{{ $libro->author_first_name }}
                        {{ $libro->author_last_name }}</h3>
                    <h4 class="mt-1 text-lg font-medium text-gray-900">{{ $recomendacion->title }}</h4>
                </a>
            @endforeach

        </div>
    </section>




</x-kafka-layout>
