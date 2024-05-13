<x-kafka-layout>
    <x-kafka.header />
    <div class="flex flex-col md:flex-row justify-around p-6 gap-3">

        {{-- Usuario & libro --}}
        <div class="w-full md:w-2/5 flex-shrink-0 flex flex-col items-center mt-3 rounded-xl">
            <div class="flex items-center space-x-4">
                <a class="flex items-center" href="{{ route('user.perfil', ['username' => strtolower(str_replace(' ', '', $review->user->name)), 'id' => $review->user->id]) }}">
                    <img src="{{ asset($review->user->profile_photo_path) }}"
                    alt="foto perfil {{ $review->user->name }}" class="w-16 h-16 lg:w-20 lg:h-20 rounded-full mr-3">
                    <div class="p-3">
                        <div>
                            <h3 class="p-0 m-0">{{ $review->user->name }}</h3>
                        </div>
                        <div class="text-gray-500">
                            {{ '@'.strtolower(str_replace(' ', '', $review->user->name))}}
                        </div>
                    </div>
                </a>
            </div>
            <div class="flex ">
                <p class="flex items-center">{{ $review->user->followers->count() }} Seguidores |
                    {{ $review->user->following->count() }} Siguiendo | {{ $review->user->likedBooks->count() }}
                    <x-heroicon-s-heart class="w-6 ml-1" />
                </p>
                </p>
            </div>

            <div class="mt-6">
                <a href="{{ route('libros.show', ['titulo' => $review->book->title, 'id' => $review->book->id]) }}"
                    class="group flex flex-col items-center">
                    <div class="overflow-hidden rounded-lg">
                        <img src="{{$review->book->cover}}"
                            alt="{{$review->book->title}}"
                            class="h-full w-full object-cover object-center group-hover:opacity-75">
                    </div>
                    <h3 class="mt-2 mb-0 text-sm text-gray-700">{{$review->book->author}}</h3>
                    <h4 class="mt-1 mb-5 text-lg font-medium text-gray-900">{{$review->book->title}}</h4>
                </a>
            </div>
        </div>

        {{-- Review --}}
        <div class="w-full md:w-3/5">
            <h2 class="text-center">Review</h2>
            <p>{{$review->content}}</p>

            <div class="flex items-center justify-end mr-3">
                <p id="likesCount" class="text-3xl px-1">{{$review->likesCount()}}</p>
                <button id="likeButton" type="button" @guest disabled @endguest
                    class="peercursor-pointer font-medium tracking-wide  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700"
                    aria-describedby="tooltipLike">
                    <x-heroicon-s-heart class="w-8 transition duration-300 ease-in-out transform hover:scale-110 hover:filter hover:brightness-110" />
                </button>
            </div>
            <div id="message" style="display: none; float: right;"></div>
        </div>
    </div>

</x-kafka-layout>

<script>
document.getElementById('likeButton').addEventListener('click', function() {
    var reviewId = {{ $review->id }};

    // Enviar la solicitud AJAX
    fetch('/review/' + reviewId + '/like', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById('message').innerText = 'Like enviado correctamente';
            document.getElementById('message').style.display = 'block';
            // Actualiza el contador de "likes" en el DOM
            document.getElementById('likesCount').innerText = data.likesCount;
        } else {
            document.getElementById('message').innerText = 'Error al enviar el like';
            document.getElementById('message').style.display = 'block';
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
</script>
