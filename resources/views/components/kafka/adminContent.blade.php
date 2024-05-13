@props(['valores'])

<div class="flex w-full p-8 border-b border-[#493736]">
    @if (!empty($valores->user->profile_photo_path))
        <img src="{{ asset('storage/' . $valores->user->profile_photo_path) }}"
            class="flex-shrink-0 w-12 h-12 rounded-full object-cover"
            alt="Imagen de perfil del usuario {{ $valores->user->name }}">
    @else
        <img src="https://img.freepik.com/premium-vector/male-avatar-icon-unknown-anonymous-person-default-avatar-profile-icon-social-media-user-business-man-man-profile-silhouette-isolated-white-background-vector-illustration_735449-120.jpg"
            class="flex-shrink-0 w-12 h-12 rounded-full object-cover" alt="Imagen de perfil del usuario anonimo">
    @endif
    <div class="flex flex-col flex-grow ml-4">
        <div class="flex">
            <a
                href="{{ route('user.perfil', ['username' => strtolower(str_replace(' ', '', $valores->user->name ?? 'anonimo')), 'id' => $valores->user->id ?? 0]) }}">
                <span class="font-semibold">{{ $valores->user->name ?? 'Anonimo' }}</span>
                <span
                    class="ml-1">{{ '@' . strtolower(str_replace(' ', '', $valores->user->name ?? 'anonimo')) }}</span></a>
            <span class="ml-auto text-sm">{{ $valores->formatearFechaCreacion() }}</span>
        </div>
        <p class="mt-1 text-sm"><b>Asunto: </b>{{ $valores->subject }}</p>
        <p class="mt-3 text-sm"><b>Mensaje: </b>{{ $valores->message }}</p>
    </div>
</div>
