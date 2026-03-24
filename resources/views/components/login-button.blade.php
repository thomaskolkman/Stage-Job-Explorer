@php
$base = "group flex items-center justify-between px-6 py-4 rounded-2xl font-semibold text-lg transition-all duration-300";

$variants = [
    'primary' => "bg-gradient-to-r from-indigo-700 to-indigo-900 text-white shadow-lg shadow-indigo-900/30 hover:scale-[1.02] hover:shadow-xl hover:shadow-indigo-900/40",

    'secondary' => "bg-transparent border border-indigo-700 text-indigo-700 hover:bg-gradient-to-r hover:from-indigo-700 hover:to-indigo-900 hover:text-white hover:scale-[1.02] hover:shadow-lg hover:shadow-indigo-900/30",
];
@endphp

<a {{ $attributes->merge(['class' => $base . ' ' . $variants[$variant]]) }}>
    
    <div class="flex items-center gap-3">
        
        {{-- Icon --}}
        @if($variant === 'primary')
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 opacity-90" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                <path stroke-width="2" d="M12 14l6.16-3.422A12.083 12.083 0 0118 20.944M12 14L5.84 10.578A12.083 12.083 0 006 20.944" />
            </svg>
        @else
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 opacity-90" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-width="2" d="M3 7h18M3 7v13h18V7M8 7V5a4 4 0 118 0v2" />
            </svg>
        @endif

        <span>{{ $label }}</span>
    </div>

    {{-- Arrow --}}
    <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path d="M9 5l7 7-7 7" />
    </svg>

</a>