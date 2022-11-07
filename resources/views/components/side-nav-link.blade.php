@props(['active'])

@php
    $classes = ($active ?? false)
    ? 'bg-red-500 text-white'
    : 'hover:bg-red-300 hover:text-white transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->class(['block py-2.5 px-4 rounded-lg'])->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
