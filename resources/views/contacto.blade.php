<x-kafka-layout>
    <x-kafka.header />
    {{-- CONTACTO --}}
    <section>
        <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center">Contacta con nosotros </h2>
            <p class="mb-4 lg:mb-16 font-light text-center   sm:text-xl">
                ¿Algún problema técnico? ¿Quiere enviar comentarios sugerencias sobre alguna posible nueva característica? ¿Necesita detalles sobre nuestro plan <span class="font-bold">PRO</span>? Haznos saber
            </p>
            <form action="#" class="space-y-8">
                <div>
                    <label for="email" class="block mb-2 font-medium text-gray-900 ">Tu
                        correo electrónico</label>
                    <input type="email" id="email"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#7e6867] focus:border-[#7e6867] block w-full p-2.5"
                        placeholder="ejemplo@letterkafka.com" required>
                </div>
                <div>
                    <label for="subject" class="block mb-2  font-medium text-gray-900">Asunto</label>
                    <input type="text" id="subject"
                        class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-[#7e6867] focus:border-[#7e6867] "
                        placeholder="Permítenos saber en qué te podemos ayudar" required>
                </div>
                <div class="sm:col-span-2">
                    <label for="message" class="block mb-2  font-medium text-gray-900 ">Tu
                        mensaje</label>
                    <textarea id="message" rows="6"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-[#7e6867] focus:border-[#7e6867]"
                        placeholder="Deja un comentario..."></textarea>
                </div>
                <button type="submit"
                    class="py-3 px-5  font-medium text-center rounded-lg bg-[#493736] text-white sm:w-fit  focus:ring-4 focus:outline-none focus:ring-orange-200  ">Enviar
                    mensaje</button>
            </form>
        </div>
    </section>

    {{-- FAQ --}}
    <section>
        <h2 class="mb-8 text-4xl tracking-tight font-extrabold text-center">F.A.Q </h2>

        <div x-data="{
            activeAccordion: '',
            setActiveAccordion(id) {
                this.activeAccordion = (this.activeAccordion == id) ? '' : id
            }
        }"
            class="relative mb-8 lg:mb-16  mx-auto max-w-screen-md overflow-hidden text-sm font-normal bg-white border border-gray-200 divide-y divide-gray-200 rounded-md">
            <div x-data="{ id: $id('accordion') }" class="cursor-pointer group">
                <button @click="setActiveAccordion(id)"
                    class="flex items-center justify-between w-full p-4 text-left select-none group-hover:underline">
                    <span class="font-bold text-lg">¿Cuál es el propósito de este sitio?</span>
                    <svg class="w-4 h-4 duration-200 ease-out" :class="{ 'rotate-180': activeAccordion == id }"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
                <div x-show="activeAccordion==id" x-collapse x-cloak>
                    <div class="p-4 pt-0 text-lg">
                        El propósito de nuestro sitio es proporcionar a los usuarios una plataforma dedicada a la exploración, descubrimiento y discusión de libros. Aquí puedes compartir tus opiniones sobre libros, descubrir nuevas lecturas, conectarte con otros amantes de la literatura y mucho más.
                    </div>
                </div>
            </div>
            <div x-data="{ id: $id('accordion') }" class="cursor-pointer group">
                <button @click="setActiveAccordion(id)"
                    class="flex items-center justify-between w-full p-4 text-left select-none group-hover:underline">
                    <span class="font-bold text-lg">¿Cómo puedo empezar a utilizar el sitio?</span>
                    <svg class="w-4 h-4 duration-200 ease-out" :class="{ 'rotate-180': activeAccordion == id }"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
                <div x-show="activeAccordion==id" x-collapse x-cloak>
                    <div class="p-4 pt-0 text-lg">
                        Para empezar, simplemente regístrate en nuestro sitio utilizando tu dirección de correo electrónico y crea tu perfil. A partir de ahí, podrás explorar nuestra biblioteca de libros, añadir libros a tu lista de lectura, dejar reseñas, seguir a otros usuarios y participar en discusiones sobre libros.
                    </div>
                </div>
            </div>
            <div x-data="{ id: $id('accordion') }" class="cursor-pointer group">
                <button @click="setActiveAccordion(id)"
                    class="flex items-center justify-between w-full p-4 text-left select-none group-hover:underline">
                    <span class="font-bold text-lg">¿Es seguro mi información personal en este sitio?</span>
                    <svg class="w-4 h-4 duration-200 ease-out" :class="{ 'rotate-180': activeAccordion == id }"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
                <div x-show="activeAccordion==id" x-collapse x-cloak>
                    <div class="p-4 pt-0 text-lg ">
                        Sí, nos tomamos muy en serio la privacidad y seguridad de tus datos personales. Utilizamos medidas de seguridad avanzadas para proteger tu información y nunca compartiremos tus datos con terceros sin tu consentimiento.
                    </div>
                </div>
            </div>
            <div x-data="{ id: $id('accordion') }" class="cursor-pointer group">
                <button @click="setActiveAccordion(id)"
                    class="flex items-center justify-between w-full p-4 text-left select-none group-hover:underline">
                    <span class="font-bold text-lg">¿Cómo puedo contactar con el equipo de soporte?</span>
                    <svg class="w-4 h-4 duration-200 ease-out" :class="{ 'rotate-180': activeAccordion == id }"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
                <div x-show="activeAccordion==id" x-collapse x-cloak>
                    <div class="p-4 pt-0 text-lg">
                        Si tienes alguna pregunta, problema o sugerencia, no dudes en ponerte en contacto con nuestro equipo de soporte. Puedes enviarnos un correo electrónico a support@example.com y estaremos encantados de ayudarte.
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-kafka-layout>
