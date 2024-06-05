<h1 id="title" class="cursor-pointer" >LetterKafka
    <a href="/">
        <x-kafka.logo width="120" />
    </a>
</h1>
<header>
    <ul>
        <li><a href="/libros">Libros</a></li>
        <li><a href="/feed">Feed</a></li>
        <li><a href="/mis-estanterias">Mis estanterías</a></li>
        @guest
        <li><a href="/register">Entrar</a></li>
        @endguest
        @auth
        <li><a href="/mi-perfil">Perfil</a></li>

        {{-- Verificar si el usuario logueado tiene un correo electrónico específico --}}
        @if(auth()->user()->email == 'andreigeorgemira@gmail.com')
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
