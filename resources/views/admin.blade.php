<x-kafka-layout>
    <x-kafka.header />
    @if(auth()->check() && auth()->user()->email == 'andreigeorgemira@gmail.com')
    <div class="flex justify-center h-lvh px-4">
        <div class="flex w-full max-w-screen-lg">
            {{-- menu lateral --}}
            <div class="flex flex-col w-32 py-4 pr-3">
                <button class="px-3 py-2 mt-2 text-lg font-medium rounded-sm hover:bg-gray-300"> <a href="{{route('admin.index')}}"> Soporte </a></button>
                <form class="px-3 py-2 mt-2 text-lg font-medium rounded-sm hover:bg-gray-300"  action="{{route('admin.index')}}" method="POST">
                    @csrf
                    <input type="hidden" name="show_book_form" value="true">
                    <button type="submit">Añadir libro</button>
                </form>
                <a class="flex px-3 py-2 mt-auto text-lg rounded-sm font-medium hover:bg-gray-200"
                href="{{ route('user.perfil', ['username' => strtolower(str_replace(' ', '', Auth::user()->name)), 'id' => Auth::user()->id])}}">
                    @if(Auth::user()->profile_photo_path)
                    <img src="{{asset('storage/'. Auth::user()->profile_photo_path)}}" alt="Profile Image" class="flex-shrink-0 w-10 h-10 rounded-full">
                    @else
                        <span class="flex-shrink-0 w-10 h-10 bg-gray-400 rounded-full"></span>
                    @endif
                    <div class="flex flex-col ml-2">
                        <span class="mt-1 text-sm font-semibold leading-none">{{ Auth::user()->name }}</span>
                        <span class="mt-1 text-xs leading-none">{{ '@' . str_replace(' ', '', Auth::user()->name) }}</span>
                    </div>
                </a>
            </div>
            {{-- fin menu lateral --}}
            {{-- main feed --}}
            <div class="flex flex-col flex-grow border-l w-4/5 border-r border-[#493736]">
                <div class="flex justify-between flex-shrink-0 px-8 py-4 border-b border-[#493736]">
                    <h1 class="text-xl font-semibold">Soporte</h1>
                    <form action="{{ route('admin.index') }}" method="GET" class="flex items-center" id="searchForm">
                        <input name="username" class="flex items-center h-8 px-2 border border-gray-500 rounded-sm" type="search" Placeholder="nombre de usuario" required>
                        <button type="submit" class="ml-2 bg-[#493736] text-white px-4 py-1 rounded hover:bg-[#493736] h-8">Buscar</button>
                    </form>
                </div>
                <div class="flex-grow h-80 overflow-auto">
                    @if ($noCoincidencias)
                        <div class="text-red-800 text-center my-4 text-xl">No se encontraron resultados para la búsqueda.</div>
                    @elseif ($showForm)
                        <x-kafka.insertBook
                        :generos="$generos"/>
                    @else
                        @foreach ($datos as $dato)
                            <x-kafka.adminContent :valores="$dato"/>
                        @endforeach
                    @endif

                </div>
            </div>

        </div>
    </div>
    @else
        {{ abort(404) }}
    @endif
</x-kafka-layout>
