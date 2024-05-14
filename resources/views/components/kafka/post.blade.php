@props(['user', 'userImage', 'creation_date', 'content', 'libro', 'likes', 'minipost'])

@if (!$minipost)
    <div class="flex w-full p-8 border-b border-[#493736]">
        <img src="{{ asset('storage/' . $userImage) }}" class="flex-shrink-0 w-12 h-12 rounded-full object-cover"
            alt="Imagen de perfil del usuario {{ $user->name }}">
        <div class="flex flex-col flex-grow ml-4">
            <div class="flex">
                <a
                    href="{{ route('user.perfil', ['username' => strtolower(str_replace(' ', '', $user->name)), 'id' => $user->id]) }}">
                    <span class="font-semibold">{{ $user->name }}</span>
                    <span class="ml-1">{{ '@' . strtolower(str_replace(' ', '', $user->name)) }}</span></a>
                <span class="ml-auto text-sm">{{ $creation_date }}</span>
            </div>
            <div class="flex mt-3">
                <a href="{{ route('libros.show', ['titulo' => $libro->title, 'id' => $libro->id]) }}"><img
                        src="{{ $libro->cover }}" class="border border-black min-w-32 min-h-48"
                        alt="Portada del libro"></a>
                <p class="ml-4">{{ $content->content }} <a
                        href="{{ route('review.show', ['id' => $content->id]) }}">Leer más...</a></p>
            </div>
            <div class="flex mt-2">
                <button id="likeButton_{{ $content->id }}" type="button" @guest disabled @endguest
                    class="peercursor-pointer font-medium tracking-wide  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700"
                    aria-describedby="tooltipLike">
                    <x-heroicon-s-heart
                        class="h-5 w-5 transition duration-300 ease-in-out transform hover:scale-110 hover:filter hover:brightness-110" />
                </button>
                <span id="likesCount_{{ $content->id }}" class="font-semibold">{{ $likes }}</span>
                <button id="shareButton_{{ $content->id }}">
                    <x-fas-share class="h-5 w-5 ml-3" />
                </button>
                <div id="shareModal" class="fixed inset-0 overflow-y-auto hidden">
                    <div class="flex items-center justify-center min-h-screen">
                        <!-- Fondo del modal -->
                        <div class="fixed inset-0 bg-black opacity-50"></div>

                        <!-- Contenido del modal -->
                        <div class="relative bg-white rounded-lg p-8 max-w-md mx-auto">
                            <!-- Encabezado -->
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-xl font-bold">Compartir review</h2>
                                <!-- Botón para cerrar el modal -->
                                <button id="closeModalButton"
                                    class="text-gray-500 hover:text-gray-700 focus:outline-none">
                                    <i class="fa-solid fa-x"></i>
                                </button>
                            </div>

                            <!-- Opciones de compartir -->
                            <div class="grid grid-cols-1 gap-4">
                                <!-- Opción de copiar el enlace -->
                                <div>
                                    <button id="copyLinkButton"
                                        class="flex items-center space-x-2 text-gray-600 hover:text-gray-800 focus:outline-none">
                                        <i class="fa-regular fa-clipboard"></i>
                                        <span>Copiar enlace</span>
                                    </button>
                                </div>
                                <!-- Opción de compartir en Twitter -->
                                <div>
                                    <a id="shareTwitterButton" href="#" target="_blank" rel="noopener noreferrer"
                                        class="flex items-center space-x-2 text-blue-400 hover:text-blue-600 focus:outline-none">
                                        <i class="fa-brands fa-x-twitter"></i>
                                        <span>Compartir en Twitter</span>
                                    </a>
                                </div>
                                <!-- Opción de compartir en WhatsApp -->
                                <div>
                                    <a id="shareWhatsAppButton" href="#" target="_blank" rel="noopener noreferrer"
                                        class="flex items-center space-x-2 text-green-400 hover:text-green-600 focus:outline-none">
                                        <i class="fa-brands fa-whatsapp"></i>
                                        <span>Compartir en WhatsApp</span>
                                    </a>
                                </div>
                                <!-- Otras opciones de compartir -->
                                <!-- Añade más opciones aquí si lo deseas -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="flex w-full py-4 border-b border-[#493736]">
        <img class="flex-shrink-0 w-10 h-10 rounded-full" src="{{ asset('storage/' . $userImage) }}" />
        <div class="flex flex-col flex-grow ml-2">
            <div class="flex text-sm">
                <span class="font-semibold">{{ $user->name }}</span>
                <a
                    href="{{ route('user.perfil', ['username' => strtolower(str_replace(' ', '', $user->name)), 'id' => $user->id]) }}"><span
                        class="ml-1">{{ '@' . strtolower(str_replace(' ', '', $user->name)) }}</span></a>
            </div>
            <p class="mt-1 text-sm">{{ substr($content->content, 0, 100) }}. <a
                    href="{{ route('review.show', ['id' => $content->id]) }}">Leer más...</a></p>
            <div class="flex mt-2">
                <button id="likeButton_{{ $content->id }}" type="button" @guest disabled @endguest
                    class="peercursor-pointer font-medium tracking-wide  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700"
                    aria-describedby="tooltipLike">
                    <x-heroicon-s-heart
                        class="h-5 w-5 transition duration-300 ease-in-out transform hover:scale-110 hover:filter hover:brightness-110" />
                </button>
                <span id="likesCount_{{ $content->id }}" class="font-semibold">{{ $likes }}</span>
            </div>
        </div>
    </div>
@endif


<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://unpkg.com/tippy.js@6"></script>

<script>
    document.querySelectorAll('[id^="shareButton_"]').forEach(function(button) {
        button.addEventListener('click', function() {
            // Mostrar el modal de compartir
            document.getElementById('shareModal').style.display = 'block';

            // Obtener el ID de la revisión de PHP
            var reviewId = this.id.split('_')[1]; // Obtener el ID del botón de compartir

            // URL base de la revisión
            var baseUrl = 'http://127.0.0.1:8000/review/';

            // Objeto para el modal de compartir
            var shareModal = {
                showShareModal: false,

                // Método para copiar el enlace
                copyLink() {
                    var reviewUrl = baseUrl + reviewId; // Construir la URL completa de la revisión
                    // Código para copiar el enlace al portapapeles
                    var input = document.createElement('input');
                    input.value = reviewUrl;
                    document.body.appendChild(input);
                    input.select();
                    document.execCommand('copy');
                    document.body.removeChild(input);

                    // Mostrar tooltip indicando que se copió el enlace
                    var tooltip = tippy('#copyLinkButton', {
                        content: 'Enlace copiado al portapapeles',
                        placement: 'bottom',
                        animation: 'scale',
                        duration: 200,
                    });
                    tooltip.show();
                }
            };

            shareModal.twitterShareUrl =
                `https://twitter.com/intent/tweet?url=${encodeURIComponent(baseUrl + reviewId)}&text=${encodeURIComponent('Me ha encantado esta review de LetterKafka')}`;
            shareModal.whatsappShareUrl =
                `https://api.whatsapp.com/send/?text=${encodeURIComponent('Me ha encantado esta review de LetterKafka')} ${encodeURIComponent(baseUrl + reviewId)}`;

            // Agregar evento click al botón de compartir en Twitter
            document.getElementById('shareTwitterButton').addEventListener('click', function() {
                // Abrir una nueva ventana con la URL de compartir en Twitter
                window.open(shareModal.twitterShareUrl);
            });

            // Agregar evento click al botón de compartir en WhatsApp
            document.getElementById('shareWhatsAppButton').addEventListener('click', function() {
                // Abrir una nueva ventana con la URL de compartir en WhatsApp
                window.open(shareModal.whatsappShareUrl);
            });

            // Agregar evento click al botón de copiar enlace
            document.getElementById('copyLinkButton').addEventListener('click', function() {
                // Llamar al método para copiar el enlace
                shareModal.copyLink();
            });
        });
    });

    // Agregar evento click al botón de cerrar modal
    document.getElementById('closeModalButton').addEventListener('click', function() {
        // Ocultar el modal de compartir
        document.getElementById('shareModal').style.display = 'none';
    });


    document.getElementById('likeButton_{{ $content->id }}').addEventListener('click', function() {
        var reviewId = {{ $content->id }};

        // Enviar la solicitud AJAX
        fetch('/feed/' + reviewId + '/like', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Actualiza el contador de "likes" en el DOM
                    document.getElementById('likesCount_' + reviewId).innerText = data.likesCount;
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
</script>
