<section class="container mx-auto px-28">
    <h2 class="text-black mb-1 title-font text-center tracking-widest"> REVIEWS </h2>
    <p class="text-center mb-8">-- {{ $subtitulo }} --</p>
    
    {{-- Mostrar mensaje flash --}}
    @if (flash()->message)
        <div class="{{ flash()->class }}">
            {{ flash()->message }}
        </div>
    @endif

    @if ($reviews->isEmpty())
        <div class="w-full flex flex-col justify-center items-center pt-12">
            <img class="w-36 transition-transform duration-300 transform hover:scale-105 "
                src="{{ asset('images/errors/sadness.png') }}" alt="ilustración triste">
            <p class="text-center text-xl">Aún no hay reviews en este libro.</p>
        </div>
    @else
        <ul aria-label="Reviews feed" role="feed"
            class="mx-auto relative flex flex-col gap-12 pt-12 pl-8 before:absolute before:top-0 before:left-8 before:h-full before:border before:-translate-x-1/2 before:border-orange-800 before:border-dashed after:absolute after:top-6 after:left-8 after:bottom-6 after:border after:-translate-x-1/2 after:border-orange-800 ">

            @foreach ($reviews as $review)
                <li role="article" class="relative pl-8 ">
                    <div class="flex flex-col flex-1 gap-2">
                        <a href="{{ route('user.perfil', ['username' => strtolower(str_replace(' ', '', $review->user->name)), 'id' => $review->user->id]) }}"
                            class="absolute z-10 inline-flex items-center justify-center w-14  text-white rounded-full -left-7 ">
                            <img src="{{asset('storage/'. $review->user->profile_photo_path) }}"
                                alt="foto de perfil del usuario {{ $review->user->name }}" width="32"
                                height="32" class="max-w-full rounded-full" />
                        </a>
                        <h4
                            class="flex flex-col items-start text-lg font-medium leading-8 lg:items-center md:flex-row text-slate-700">
                            <span class="flex-1">{{ $review->user->name }}<span
                                    class="text-base font-normal text-slate-500">

                                    <a class="inline text-slate-500"
                                        href="{{ route('user.perfil', ['username' => strtolower(str_replace(' ', '', $review->user->name)), 'id' => $review->user->id]) }}">{!! '@' !!}{{ strtolower(str_replace(' ', '', $review->user->name)) }}</a>
                                </span></span><span
                                class="text-sm font-normal text-orange-800">{{ \Carbon\Carbon::parse($review->createdAt)->format('Y/m/d') }}
                            </span>
                        </h4>
                        <p class="text-black">{{ $review->content }}. <a
                                href="{{ route('review.show', ['id' => $review->id]) }}">Leer
                                más...</a>
                        </p>
                    </div>
                </li>
            @endforeach
        </ul>
        <div
            class="fter:h-px flex items-center before:h-px before:flex-1  before:bg-orange-800 before:content-[''] after:h-px after:flex-1 after:bg-orange-800  after:content-['']">
            <a type="button" href="#"
                class="flex items-center rounded-full border border-orange-800 bg-secondary-50 px-3 py-2 text-center text-sm font-medium text-gray-900 hover:bg-orange-100">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    class="mr-1 h-4 w-4">
                    <path fill-rule="evenodd"
                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                        clip-rule="evenodd" />
                </svg>
                Ver más
            </a>
        </div>
    @endif
</section>