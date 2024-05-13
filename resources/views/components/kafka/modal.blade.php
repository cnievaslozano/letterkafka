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
                    {{ $author }}
                </p>


                <form id="formularioReview" class="mt-5">
                    @csrf
                    <input type="hidden" name="book_id" value="{{ $id }}">{{-- id del libr --}}
                    <div>
                        <label for="review" class="block text-md capitalize">Tu review (5000)</label>
                        <textarea placeholder="Escribe tu review aquí..." rows="4" name="review" id="review" maxlength="5000"
                            class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40"></textarea>
                    </div>

                    <div class="mt-4">
                        <label for="rating" class="block text-md  capitalize ">Rating</label>
                        <select name="rating" id="rating"
                            class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="submit"
                            class="font-bold peer cursor-pointer rounded-xl bg-orange-800 px-4 py-2  tracking-wide  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700  text-white">
                            Enviar review
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
    document.getElementById('formularioReview').addEventListener('submit', function(e) {
        e.preventDefault(); // Evitar el envío del formulario tradicional

        var formData = new FormData(this);

        //Enviar la solicitud AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '{{ route('guardar.review') }}', true);
        xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    console.log('Revisión guardada correctamente');
                } else {
                    console.log('Error al guardar la revisión' + JSON.stringify(response));
                }
            } else {
                console.log('Error en la solicitud');
            }
        };

        xhr.send(formData);
    });
</script>
