@props(['genres' => $genres])

<div>
    <!-- PC -->
    <main class="mx-auto max-w-2xl px-4 sm:px-6  lg:max-w-7xl lg:px-8">


        <div class=" ">
            <aside>
                <h2 class="sr-only">Filters</h2>

                <div class="hidden lg:block">
                    <form class="space-y-10 divide-y divide-black" action="{{ route('libros.index') }}" method="GET">
                        <div class="grid grid-cols-2 gap-4">
                            @php
                                $middleIndex = ceil($genres->count() / 2);
                            @endphp
                            <fieldset>
                                <legend class="block text-md font-medium text-gray-900">Géneros</legend>
                                <div class="space-y-3 pt-6">
                                    @foreach ($genres->take($middleIndex) as $index => $genre)
                                        <div class="flex items-center">
                                            <input id="genre-{{ $index }}" name="genre[]"
                                                value="{{ $genre }}" type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-stone-900 focus:ring-orange-300">
                                            <label for="genre-{{ $index }}"
                                                class="ml-3 text-sm text-gray-600">{{ $genre }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend class="block text-md font-medium text-gray-900">Géneros</legend>
                                <div class="space-y-3 pt-6">
                                    @foreach ($genres->skip($middleIndex) as $index => $genre)
                                        <div class="flex items-center">
                                            <input id="genre-{{ $index }}" name="genre[]"
                                                value="{{ $genre }}" type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-stone-900 focus:ring-orange-300">
                                            <label for="genre-{{ $index }}"
                                                class="ml-3 text-sm text-gray-600">{{ $genre }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </fieldset>
                        </div>
                        <div class="pt-10">
                            <fieldset>
                                <legend class="block text-md font-medium text-gray-900">Duración</legend>
                                <div class="space-y-3 pt-6 grid grid-cols-2 gap-4">
                                    @php
                                        $interval = 100;
                                    @endphp
                                    @for ($i = 0; $i <= 800; $i += $interval * 2)
                                        <div class="flex items-center">
                                            <input id="category-{{ $i }}" name="category[]"
                                                value="{{ $i }}" type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-stone-900 focus:ring-orange-300">
                                            <label for="category-{{ $i }}"
                                                class="ml-3 text-sm text-gray-600">{{ $i }} -
                                                {{ $i + $interval }} págs</label>
                                        </div>
                                        @if ($i + $interval <= 800)
                                            <div class="flex items-center">
                                                <input id="category-{{ $i + $interval }}" name="category[]"
                                                    value="{{ $i + $interval }}" type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-stone-900 focus:ring-orange-300">
                                                <label for="category-{{ $i + $interval }}"
                                                    class="ml-3 text-sm text-gray-600">{{ $i + $interval }} -
                                                    {{ $i + $interval * 2 }} págs</label>
                                            </div>
                                        @endif
                                    @endfor
                                </div>
                            </fieldset>
                        </div>
                        <div class="pt-10">
                            <fieldset>
                                <legend class="block text-md font-medium text-gray-900">Mejores valorados</legend>
                                <div class="space-y-3 pt-6">
                                    @for ($i = 0; $i < 5; $i++)
                                        <div class="flex items-center">
                                            @php
                                                $minRating = $i;
                                                $maxRating = $i + 1;
                                            @endphp
                                            <input id="rating-{{ $i }}" name="ratings[]"
                                                value="{{ $minRating }}-{{ $maxRating }}" type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-stone-900 focus:ring-orange-300">
                                            <label for="rating-{{ $i }}"
                                                class="ml-3 text-sm text-gray-600">Rating: {{ $minRating }} -
                                                {{ $maxRating }}</label>
                                        </div>
                                    @endfor
                                    <div class="flex items-center">
                                        <input id="rating-5" name="ratings[]" value="5-5" type="checkbox"
                                            class="h-4 w-4 rounded border-gray-300 text-stone-900 focus:ring-orange-300">
                                        <label for="rating-5" class="ml-3 text-sm text-gray-600">Rating: 5</label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Filtrar</button>
                    </form>
                </div>
            </aside>


        </div>
    </main>
</div>
