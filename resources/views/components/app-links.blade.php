@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block px-4 py-4 mt-2 text-sm font-semibold text-white bg-gradient-to-br from-indigo-950 to-purple-950 rounded-lg dark:bg-gradient-to-br from-indigo-900 to-purple-900 dark:hover:bg-gradient-to-br from-indigo-900 to-purple-900 dark:focus:bg-gradient-to-br from-indigo-900 to-purple-900 focus:outline-none focus:shadow-outline'
            : 'block px-4 py-4 mt-2 text-sm font-semibold text-white rounded-lg dark:hover:bg-gradient-to-br from-indigo-900 to-purple-900 dark:focus:bg-gradient-to-br from-indigo-900 to-purple-900 focus:outline-none focus:shadow-outline';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
