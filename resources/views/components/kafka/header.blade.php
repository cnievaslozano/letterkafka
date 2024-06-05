<h1 id="title" class="cursor-pointer">LetterKafka
    <a href="/">
        <x-kafka.logo width="120" />
    </a>
</h1>
<header>
    <ul>
        <li><a href="{{ route('libros.index') }}" class="{{ Route::is('libros.index') ? 'font-black' : '' }}">Libros</a>
        </li>
        <li><a href="{{ route('feed.index') }}" class="{{ Route::is('feed.index') ? 'font-black' : '' }}">Feed</a></li>
        <li><a href="{{ route('estanterias.index') }}"
                class="{{ Route::is('estanterias.index') ? 'font-black' : '' }}">Mis estanterías</a></li>
        @guest
            <li><a href="/register">Entrar</a></li>
        @endguest
        @auth
            <li><a href="{{ route('user.mi-perfil') }}"
                    class="{{ Route::is('user.mi-perfil') ? 'font-black' : '' }}">Perfil</a></li>

            {{-- Verificar si el usuario logueado tiene el correo admin --}}
            @if (auth()->user()->email == 'andreigeorgemira@gmail.com')
                <li><a href="/admin">Admin</a></li>
            @endif
        @endauth
    </ul>
</header>

<script>
    document.getElementById('title').addEventListener('click', function() {
        window.location.href = "/";
    });
</script>
