<x-kafka-layout>
    <x-kafka.header />

    <section class="grid grid-cols-2 md:grid-cols-3 gap-4">
        <!-- Columna izquierda: libros -->
        <div class="col-span-2 md:col-span-2">
            <h2 class="mt-4 mb-4 text-center">Libros Destacados</h2>
            <div class="mt-8 grid grid-cols-1 gap-4"> 
                @foreach ($books as $book)
                    <div class="col-span-2 md:col-span-1">
                        <x-kafka.card
                            id="{{ $book->id }}" 
                            title="{{ $book->title }}" 
                            imageUrl="{{ $book->cover }}"
                            autor="{{ $book->author_first_name ? $book->author_first_name : ' ' }} {{ $book->author_last_name ? $book->author_last_name : ' ' }}"
                            duration="{{ $book->pages }} pág" 
                            genres="{{ $book->genres }}" 
                            description="{{ $book->plot }}" 
                            rating="{{ $book->rating }}" 
                            mood="{{ $book->mood }}" 
                        />
                    </div>
                @endforeach
            </div>
            {{ $books->links('components.kafka.pagination') }}
        </div>

        <!-- Columna derecha: filtros -->
        <div class="col-span-1 md:col-span-1">
            <x-kafka.search />
            <x-kafka.filter />
        </div>
    </section>
</x-kafka-layout>
