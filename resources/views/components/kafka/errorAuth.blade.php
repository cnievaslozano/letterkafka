<div class="{{ $pyClass ?? 'py-32' }} flex flex-col justify-center items-center gap-5">
    <img src="{{ $imageSrc ?? asset('images/errors/errorAuth.webp') }}" class="{{ $imgClass ?? 'w-64' }}" alt="">
    <h2 class="text-center">
        {{ $mensaje ?? 'Creo que necesitas iniciar sesión para estar aquí...' }}
    </h2>
    <p class="text-xl"><a href="{{ route('register') }}">Vamos allá</a></p>
</div>
