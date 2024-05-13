@props(['user', 'userImage', 'creation_date', 'content', 'libro', 'likes', 'minipost'])

@if (!$minipost)
    <div class="flex w-full p-8 border-b border-[#493736]">
        <img src="{{asset($userImage) }}" class="flex-shrink-0 w-12 h-12 rounded-full object-cover"
            alt="Imagen de perfil del usuario {{ $user->name }}">
        <div class="flex flex-col flex-grow ml-4">
            <div class="flex">
                <a href="{{ route('user.perfil', ['username' => strtolower(str_replace(' ', '', $user->name)), 'id' => $user->id])}}">
                <span class="font-semibold">{{ $user->name }}</span>
                <span class="ml-1">{{ '@' . strtolower(str_replace(' ', '', $user->name)) }}</span></a>
                <span class="ml-auto text-sm">{{ $creation_date }}</span>
            </div>
            <div class="flex mt-3">
                <a href="{{ route('libros.show', ['titulo' => $libro->title, 'id' => $libro->id]) }}"><img src="{{ $libro->cover }}" class="border border-black min-w-32 min-h-48"
                        alt="Portada del libro"></a>
                <p class="ml-4">{{ $content->content }} <a href="{{ route('review.show', ['id' => $content->id]) }}">Leer más...</a></p>
            </div>
            <div class="flex mt-2">
                <button id="likeButton_{{$content->id}}" type="button" @guest disabled @endguest
                class="peercursor-pointer font-medium tracking-wide  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700"
                aria-describedby="tooltipLike">
                <x-heroicon-s-heart class="h-5 w-5 transition duration-300 ease-in-out transform hover:scale-110 hover:filter hover:brightness-110" />
                </button>
                <span id="likesCount_{{$content->id}}" class="font-semibold">{{ $likes }}</span>
                <button><x-fas-share class="h-5 w-5 ml-3" /></button>
            </div>
        </div>
    </div>
@else
    <div class="flex w-full py-4 border-b border-[#493736]">
        <img class="flex-shrink-0 w-10 h-10 rounded-full" src="{{asset($userImage) }}" />
        <div class="flex flex-col flex-grow ml-2">
            <div class="flex text-sm">
                <span class="font-semibold">{{ $user->name }}</span>
                <a href="{{ route('user.perfil', ['username' => strtolower(str_replace(' ', '', $user->name)), 'id' => $user->id])}}"><span class="ml-1">{{ '@' . strtolower(str_replace(' ', '', $user->name)) }}</span></a>
            </div>
            <p class="mt-1 text-sm">{{ substr($content->content, 0, 100) }}. <a href="{{ route('review.show', ['id' => $content->id]) }}">Leer más...</a></p>
            <div class="flex mt-2">
                <button id="likeButton_{{$content->id}}" type="button" @guest disabled @endguest
                class="peercursor-pointer font-medium tracking-wide  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700"
                aria-describedby="tooltipLike">
                <x-heroicon-s-heart class="h-5 w-5 transition duration-300 ease-in-out transform hover:scale-110 hover:filter hover:brightness-110" />
                </button>
                <span id="likesCount_{{$content->id}}" class="font-semibold">{{ $likes }}</span>
            </div>
        </div>
    </div>
@endif


<script>
    document.getElementById('likeButton_{{$content->id}}').addEventListener('click', function() {
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
