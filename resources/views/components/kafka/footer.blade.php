<footer id="footer" class="w-full max-w-screen-xl mx-auto md:py-8 bottom-0 left-0 right-0">
    <div class="sm:flex sm:items-center sm:justify-between">
        <a href="#" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
            <x-kafka.logo width="35" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap ">LetterKafka</span>
        </a>
        <ul class="flex flex-wrap items-center mb-6 text-sm font-medium  sm:mb-0 ">
            <li>
                <a href="{{ route('sobre-nosotros') }}" class="hover:underline me-4 md:me-6">Sobre nosotros</a>
            </li>
            <li>
                <a href="{{ route('politica-privacidad') }}" class="hover:underline me-4 md:me-6">Política de Privacidad</a>
            </li>
            <li>
                <a href="{{ route('contacto') }}" class="hover:underline">Contacto</a>
            </li>
        </ul>
    </div>
    <hr class="bg-black">
    <span class="block text-sm  sm:text-center ">© 2024 <a href="/" class="hover:underline">LetterKafka™</a> Todos
        los derechos reservados.</span>

</footer>
<script>
    window.addEventListener('DOMContentLoaded', () => {
        const footer = document.getElementById('footer');
        const isScrollable = document.body.scrollHeight > window.innerHeight;
        if (!isScrollable) {
            footer.classList.add('fixed');
        }
        window.addEventListener('scroll', () => {
            const isFooterFixed = footer.classList.contains('fixed');
            const isScrollable = document.body.scrollHeight > window.innerHeight;
            if (!isFooterFixed && !isScrollable) {
                footer.classList.add('fixed');
            } else if (isFooterFixed && isScrollable) {
                footer.classList.remove('fixed');
            }
        });
    });
</script>