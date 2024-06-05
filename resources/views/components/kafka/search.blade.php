<form action="{{ route('libros.buscar') }}" method="GET"
    class="flex items-center max-w-sm mx-auto mt-28 mb-4 px-4 sm:px-6  lg:max-w-7xl lg:px-8">
    <label for="simple-search" class="sr-only">Buscar</label>
    <div class="relative w-full">
        <input type="text" id="simple-search" name="search"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-300 block w-full ps-4 p-2.5"
            placeholder="Buscar por nombre..." />
    </div>
    <button type="submit"
        class="p-2.5 ms-2 text-sm font-medium text-white bg-orange-400 rounded-lg border  hover:bg-orange-500 focus:ring-2 focus:outline-none focus:ring-orange-300 ">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
        </svg>
        <span class="sr-only">Buscar</span>
    </button>
</form>
