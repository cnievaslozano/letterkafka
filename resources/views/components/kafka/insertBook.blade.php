@props(['generos'])

<form action="{{ route('admin.insertar-libro') }}" method="POST" enctype="multipart/form-data" class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md">
    @csrf
    <div class="mb-4">
        <label for="title" class="block text-gray-700 font-bold mb-2">Título:</label>
        <input type="text" name="title" id="title" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:border-indigo-500">
    </div>
    <div class="mb-4">
        <label for="author" class="block text-gray-700 font-bold mb-2">Autor:</label>
        <input type="text" name="author" id="author" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:border-indigo-500">
    </div>
    <div class="mb-4">
        <label for="description" class="block text-gray-700 font-bold mb-2">Descripción:</label>
        <textarea name="description" id="description" rows="3" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:border-indigo-500"></textarea>
    </div>
    <div class="mb-4">
        <label for="genre" class="block text-gray-700 font-bold mb-2">Género:</label>
        <select name="genre" id="genre" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:border-indigo-500">
            <option value="" disabled selected>Seleccione un género</option>
            @foreach ($generos as $genero)
                <option value="{{ $genero }}">{{ $genero }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-4">
        <label for="buy_links" class="block text-gray-700 font-bold mb-2">Enlaces de compra:</label>
        <input type="text" name="buy_links" id="buy_links" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:border-indigo-500">
    </div>
    <div class="mb-4">
        <label for="pages" class="block text-gray-700 font-bold mb-2">Páginas:</label>
        <input type="number" name="pages" id="pages" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:border-indigo-500">
    </div>
    <div class="mb-4">
        <label for="release_date" class="block text-gray-700 font-bold mb-2">Fecha de lanzamiento:</label>
        <input type="date" name="release_date" id="release_date" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:border-indigo-500">
    </div>
    <div class="mb-4">
        <label for="cover" class="block text-gray-700 font-bold mb-2">Portada:</label>
        <input type="text" name="cover" id="cover" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:border-indigo-500">
    </div>
    <div class="mt-6">
        <button type="submit" class="w-full bg-indigo-500 text-white font-bold py-2 px-4 rounded hover:bg-indigo-700 focus:outline-none focus:bg-indigo-700">Insertar Libro</button>
    </div>
</form>
