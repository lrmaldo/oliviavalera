@props([
    'type' => 'button',
    'variant' => 'primary',
    'href' => null,
    'size' => 'md',
    'fullWidth' => false,
    'disabled' => false,
    'icon' => null
])

@php
    $baseClasses = "group inline-flex justify-center items-center gap-2 font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 transition-all duration-200 ease-in-out";

    $sizes = [
        'xs' => 'px-2.5 py-1.5 text-xs',
        'sm' => 'px-3 py-2 text-sm',
        'md' => 'px-4 py-2 text-sm',
        'lg' => 'px-5 py-2.5 text-base',
        'xl' => 'px-6 py-3 text-base'
    ];

    $variants = [
        'primary' => 'text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 shadow-sm',
        'secondary' => 'text-slate-700 bg-white border border-slate-300 hover:bg-slate-50 focus:ring-indigo-300 shadow-sm',
        'danger' => 'text-white bg-red-600 hover:bg-red-700 focus:ring-red-500 shadow-sm',
        'success' => 'text-white bg-green-600 hover:bg-green-700 focus:ring-green-500 shadow-sm',
        'warning' => 'text-slate-900 bg-yellow-500 hover:bg-yellow-600 focus:ring-yellow-500 shadow-sm',
        'info' => 'text-white bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 shadow-sm',
        'link' => 'text-indigo-600 underline hover:text-indigo-800 p-0 shadow-none focus:ring-indigo-300',
    ];

    $classes = $baseClasses . ' ' .
               $sizes[$size] . ' ' .
               $variants[$variant] . ' ' .
               ($fullWidth ? 'w-full' : 'w-auto') . ' ' .
               ($disabled ? 'opacity-60 pointer-events-none' : '');
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        @if ($icon)
            @if (str_contains($icon, '<'))
                {!! $icon !!}
            @else
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1.5 -ml-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    @if ($icon == 'edit' || $icon == 'pencil')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    @elseif ($icon == 'plus')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    @elseif ($icon == 'trash')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    @elseif ($icon == 'close' || $icon == 'x')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    @else
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    @endif
                </svg>
            @endif
        @endif
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes, 'disabled' => $disabled]) }}>
        @if ($icon)
            @if (str_contains($icon, '<'))
                {!! $icon !!}
            @else
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1.5 -ml-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    @if ($icon == 'edit' || $icon == 'pencil')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    @elseif ($icon == 'plus')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    @elseif ($icon == 'trash')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    @elseif ($icon == 'close' || $icon == 'x')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    @else
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    @endif
                </svg>
            @endif
        @endif
        {{ $slot }}
    </button>
@endif
