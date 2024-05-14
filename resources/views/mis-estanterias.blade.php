<x-kafka-layout>
    <x-kafka.header />
    @auth
        <div class="flex flex-col items-center justify-center">
            <h2 class="text-center mt-4 ">@if ($permisos) Mis Estanterías @else Estanterías de {{$usuario->name}} @endif</h2>
            <div class="flex">

                @if ($usuario->bookLists->isEmpty())
                @else
                    @foreach ($usuario->bookLists as $bookList)
                        <div class="flex items-center">
                            <span class="font-bold"><a href="#">{{ $bookList->list_name }}</a></span>
                            <span class="mx-1">•</span>
                        </div>
                    @endforeach
                @endif

                @if ($permisos)
                    <div class="flex items-center ">
                        <span class="text-md">
                            <!-- modal component -->
                            <div class="inline" x-data="{ modelOpen: false }">
                                <button @click="modelOpen =!modelOpen"
                                    class="font-bold peer cursor-pointer rounded-xl bg-orange-800 px-4 py-2  tracking-wide  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700  text-white ">Crear
                                    lista</button>

                                <x-kafka.modalEstanteria title="Crear Lista" usuarioNombre="{{ $usuario->name }}" />
                            </div>
                            <!-- end modal component -->
                        </span>
                    </div>
                @endif
            </div>

            <hr class="bg-orange-800 border-t-1 w-2/3 ">
            <div class="flex flex-wrap">
                {{-- Mostrar mensaje flash --}}
                @if (flash()->message)
                    <div class="{{ flash()->class }}">
                        {{ flash()->message }}
                    </div>
                @endif
                @if ($usuario->bookLists->isEmpty())
                    <p>No hay listas de libros, crea una en <a class="inline font-bold"
                            href="{{ route('estanterias.index') }}"> mis estanterias.</a></p>
                @else
                    <div class="flex flex-wrap justify-center gap-8">
                        @foreach ($usuario->bookLists as $lista)
                            <div class="border border-orange-800 rounded-lg p-4 mb-8">
                                <h2 class="text-xl font-bold mb-4">{{ $lista->list_name }}</h2>
                                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                                    @foreach ($lista->books as $book)
                                        <a href="{{ route('libros.show', ['titulo' => Str::slug($book->title), 'id' => $book->id]) }}"
                                            class="group flex flex-col items-center">
                                            <div class="overflow-hidden rounded-lg">
                                                <img src="{{ asset($book->cover) }}"
                                                    alt="Portada del libro {{ $book->title }}"
                                                    class="transition-transform duration-300 transform hover:scale-105 h-96 w-full object-cover object-center">
                                            </div>
                                            <h3 class="mt-2 mb-1 text-sm text-gray-700">{{ $book->title }}</h3>
                                            <h4 class="mb-2 text-sm text-gray-500">{{ $book->author }}</h4>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>



        </div>

        {{-- PAGINATOR CUANDO ESTE EL BACKEND
    {{ $books->links('components.kafka.pagination') }}
   --}}
    @else
        <x-kafka.errorAuth />
    @endauth
</x-kafka-layout>
