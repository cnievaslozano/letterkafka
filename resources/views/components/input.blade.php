@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-400 focus:border-yellow-500 focus:ring-yellow-500 rounded-md shadow-sm']) !!}>
