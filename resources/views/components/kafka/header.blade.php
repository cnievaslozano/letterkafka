<h1>LetterKafka
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
        @endauth
    </ul>
</header>
