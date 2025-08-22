@php
    $size = $attributes->get('size', 'md');
    $variant = $attributes->get('variant', 'primary');

    $sizeClasses = [
        'sm' => 'px-4 py-2 text-sm',
        'md' => 'px-6 py-3 text-base',
        'lg' => 'px-8 py-4 text-lg',
        'xl' => 'px-10 py-5 text-xl',
    ];

    $variantClasses = [
        'primary' =>
            'text-white bg-gradient-to-r from-green-600 to-green-700 shadow-lg shadow-green-600/25 hover:shadow-green-500/40 hover:from-green-700 hover:to-green-800 focus:ring-green-500',
        'secondary' =>
            'text-neutral-700 bg-white/80 backdrop-blur-sm border border-neutral-200/60 shadow-sm shadow-neutral-200/50 hover:shadow-neutral-300/60 hover:bg-white hover:border-neutral-300 focus:ring-neutral-500',
        'danger' =>
            'text-white bg-gradient-to-r from-red-600 to-red-700 shadow-lg shadow-red-600/25 hover:shadow-red-500/40 hover:from-red-700 hover:to-red-800 focus:ring-red-500',
        'outline' =>
            'text-white bg-transparent border-2 border-white/60 shadow-sm hover:shadow-white/20 hover:bg-white/10 hover:border-white focus:ring-white/50',
        'ghost' => 'text-neutral-600 bg-transparent hover:bg-neutral-100 hover:text-neutral-800 focus:ring-neutral-500',
        'link' => 'text-green-600 bg-transparent hover:text-green-700 focus:ring-green-500',
    ];

    $baseClasses =
        'relative inline-flex items-center gap-2 font-semibold rounded-xl transition-all duration-300 ease-out hover:scale-105 active:scale-95 focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100 overflow-hidden group';
@endphp

<button
    {{ $attributes->merge(['type' => 'button', 'class' => $baseClasses . ' ' . $sizeClasses[$size] . ' ' . $variantClasses[$variant]]) }}>
    <span class="relative z-10 flex items-center gap-2">
        @if ($attributes->get('loading'))
            <svg class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                </circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
        @endif
        {{ $slot }}
    </span>

    @if ($variant === 'primary' || $variant === 'danger')
        <div
            class="absolute inset-0 bg-gradient-to-r from-current/20 to-current/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
        </div>
    @elseif($variant === 'secondary')
        <div
            class="absolute inset-0 bg-gradient-to-r from-neutral-100/50 to-neutral-200/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
        </div>
    @elseif($variant === 'outline')
        <div class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
        </div>
    @elseif($variant === 'ghost')
        <div class="absolute inset-0 bg-neutral-100 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
        </div>
    @endif

    @if ($variant === 'link')
        <div
            class="absolute bottom-2 left-6 right-6 h-0.5 bg-green-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left">
        </div>
    @endif
</button>
