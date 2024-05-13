<div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="review" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
        <div x-cloak @click="modelOpen = false" x-show="modelOpen"
            x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"></div>

        <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">
            @auth


                <div class="flex items-center justify-between space-x-4">
                    <h1 class="text-xl font-medium text-gray-800 ">{{ $title }}</h1>
                    <button @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>

                <p class="mt-2 text-sm text-gray-500 ">
                    {{ $usuarioNombre }}
                </p>


                <form action="{{route('lista.crear')}}" method="POST" class="mt-5">
                    @csrf
                    <div>
                        <label for="nombre" class="block text-md capitalize">Nombre de la lista</label>
                        <input type="text" name="nombre" id="nombre"
                            class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                    </div>

                    <div>
                        <label for="descripcion" class="mt-2 block text-md capitalize">Descripción</label>
                        <textarea placeholder="Descripción de la lista..." rows="4" name="descripcion" id="descripcion" maxlength="5000"
                            class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40"></textarea>
                    </div>

                    <div>
                        <label for="buscarLibro" class="mt-2 block text-md capitalize">Buscar libro</label>
                        <input type="text" id="buscarLibro"
                            class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                        <select name="libros[]" id="libros" multiple
                            class="mt-1 block w-full px-3 py-2  text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                            <!-- Aquí se mostrarán las opciones de libros -->
                        </select>
                    </div>


                    <div class="flex justify-end mt-6">
                        <button type="submit"
                            class="font-bold peer cursor-pointer rounded-xl bg-orange-800 px-4 py-2 tracking-wide focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700 text-white">
                            Enviar lista
                        </button>
                    </div>
                </form>


            @endauth

            @guest
                <x-kafka.errorAuth pyClass="p-12" imgClass="w-48"
                    mensaje="Necesitas iniciar sesión para hacer una review" />
            @endguest
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        const librosSelect = $('#libros');
        const buscarLibroInput = $('#buscarLibro');

        // Inicializar Select2
        librosSelect.select2({
            placeholder: 'Seleccione los libros',
            multiple: true // Permitir selección múltiple
        });

        // Manejar el evento de entrada de texto para la búsqueda dinámica
        buscarLibroInput.on('input', function(event) {
            const busqueda = event.target.value.trim();
            if (busqueda.length >= 3) {

                // Realizar la búsqueda dinámica y actualizar las opciones del campo de selección
                $.ajax({
                    url: '/buscar-libros',
                    type: 'POST', // Cambiado a POST
                    data: {
                        q: busqueda,
                        _token: '{{ csrf_token() }}' // Agregar token CSRF
                    },
                    dataType: 'json',
                    success: function(data) {
                        // Limpiar las opciones actuales
                        librosSelect.empty();
                        // Agregar las nuevas opciones
                        data.items.forEach(function(libro) {
                            librosSelect.append($('<option>', {
                                value: libro.id,
                                text: libro.text
                            }));

                        });
                        // Actualizar Select2
                        librosSelect.trigger('change');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error al buscar libros:');
                        console.error(error); // Imprimir el mensaje de error
                    }

                });
            }
        });
    });
</script>
