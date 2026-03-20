@props(['active'])

@php
$classes = ($active ?? false)
    ? 'block px-4 py-4 mt-2 text-sm font-semibold text-white bg-gradient-to-br from-indigo-700 to-indigo-900 hover:from-indigo-600 hover:to-indigo-800 rounded-lg focus:outline-none focus:shadow-outline'
    : 'block px-4 py-4 mt-2 text-sm font-semibold text-white rounded-lg hover:bg-gradient-to-br hover:from-indigo-600 hover:to-indigo-800 focus:outline-none focus:shadow-outline';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>