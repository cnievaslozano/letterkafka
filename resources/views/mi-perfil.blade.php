<x-kafka-layout>
    <x-kafka.header />

    <div class="container mx-auto p-4 mt-4 gap-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 grid-rows-4">
        <div
            class=" col-span-1 md:col-span-2 lg:col-span-2 row-span-2 flex-shrink-0 p-3 flex flex-col items-center justify-center rounded-xl ">
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
            <div class="flex">
                <p class="flex items-center">100 Seguidores | 22 Siguiendo | 42 <x-heroicon-s-heart class="w-6 ml-1" /></p>
            </div>
        </div>

        <div class=" col-span-1 md:col-span-1 lg:col-span-3 row-span-4 px-4 py-2 rounded-xl  flex-shrink-0">
            <h2> Sobre mí </h2>
            <p>
                Tincidunt quam neque in cursus viverra orci, dapibus nec tristique. Nullam ut sit dolor consectetur
                urna, dui cras nec sed. Cursus risus congue arcu aenean posuere aliquam.

                Et vivamus lorem pulvinar nascetur non. Pulvinar a sed platea rhoncus ac mauris amet. Urna, sem pretium
                sit pretium urna, senectus vitae. Scelerisque fermentum, cursus felis dui suspendisse velit pharetra.
                Augue et duis cursus maecenas eget quam lectus. Accumsan vitae nascetur pharetra rhoncus praesent dictum
                risus suspendisse.
            </p>
            <button type="button" href="#" class="border border-gray-400 text-white rounded-md px-4 py-2 mt-2 transition duration-500 ease select-none  focus:outline-none focus:shadow-outline bg-[#493736]">Editar perfil</button>
        </div>
        <div
            class=" col-span-1 md:col-span-2 lg:col-span-2 row-span-2 px-16 flex-shrink-0 flex flex-col items-start justify-center rounded-xl ">
            <h3 class="mb-0">Mis listas:</h3>
            <ul>
                <li><a href="">Readlist</a></li>
                <li><a href="">Only Fantasy</a></li>
                <li><a href="">Filosofia</a></li>
            </ul>
            <button type="button" href="#" class="border border-gray-400 text-white rounded-md px-4 py-2 mt-2 transition duration-500 ease select-none  focus:outline-none focus:shadow-outline bg-[#493736]">Crear Lista</button>
        </div>
    </div>

    <section class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <h2 class="text-black mb-8 title-font text-center tracking-widest"> FAVORITOS </h2>
        <div
            class="grid grid-cols-1 gap-x-6 gap-y-10 xs:grid-cols-4 sm:grid-cols-4 border-t-2 border-orange-800 py-4 xl:gap-x-8">
            @for ($i = 0; $i < 4; $i++)
                <a href="#" class="group">

                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg xl:aspect-h-8 xl:aspect-w-7">
                        <img src="https://placehold.co/365x500"
                            alt="Tall slender porcelain bottle with natural clay textured body and cork stopper."
                            class="h-full w-full object-cover object-center group-hover:opacity-75">
                    </div>
                    <h3 class="mt-4 text-sm text-gray-700">Franz Kafka</h3>
                    <h4 class="mt-1 text-lg font-medium text-gray-900">La metamorfosis</h4>
                </a>
            @endfor
        </div>

    </section>


    <section class="container mx-auto px-28 mb-10">
        <h2 class="text-black title-font text-center tracking-widest"> REVIEWS </h2>
        <ul aria-label="Reviews feed" role="feed"
            class="mx-auto relative flex flex-col gap-12 pt-12 pl-8 before:absolute before:top-0 before:left-8 before:h-full before:border before:-translate-x-1/2 before:border-orange-800 before:border-dashed after:absolute after:top-6 after:left-8 after:bottom-6 after:border after:-translate-x-1/2 after:border-orange-800 ">
            @for ($i = 0; $i < 5; $i++)
                <li role="article" class="relative pl-8 ">
                    <div class="flex flex-col flex-1 gap-4">
                        <a href="#"
                            class="absolute z-10 inline-flex items-center justify-center w-8 h-8 text-white rounded-full -left-4 ">
                            <img src="https://placehold.co/16x16" alt="foto de perfil" title="user name" width="48"
                                height="48" class="max-w-full rounded-full" />
                        </a>
                        <h4
                            class="flex flex-col items-start text-lg font-medium leading-8 lg:items-center md:flex-row text-slate-700">
                            <span class="flex-1">Nietzche<span class="text-base font-normal text-slate-500">

                                    {!! '@' !!}nitch99</span></span><span
                                class="text-sm font-normal text-orange-800">2024-01-18
                            </span>
                        </h4>
                        <p class="text-black">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos aut
                            modi dolorum, quaerat nemo blanditiis quam magnam fugiat repellat placeat error dolorem
                            provident totam cumque maxime deleniti nesciunt incidunt nostrum. <a href="#">Leer
                                más...</a></p>
                    </div>
                </li>
            @endfor
        </ul>
        <div
            class="fter:h-px flex items-center before:h-px before:flex-1  before:bg-orange-800 before:content-[''] after:h-px after:flex-1 after:bg-orange-800  after:content-['']">
            <button type="button"
                class="flex items-center rounded-full border border-orange-800 bg-secondary-50 px-3 py-2 text-center text-sm font-medium text-gray-900 hover:bg-orange-100">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mr-1 h-4 w-4">
                    <path fill-rule="evenodd"
                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                        clip-rule="evenodd" />
                </svg>
                Ver más
            </button>
        </div>
    </section>
</x-kafka-layout>
