@php
    $color = $attributes->get('color', 'white');

    $colorClasses = [
        'white' => 'text-white border-white/60 hover:bg-white/10 hover:border-white focus:ring-white/50',
        'green' =>
            'text-green-600 border-green-600/60 hover:bg-green-600 hover:text-white hover:border-green-600 focus:ring-green-500',
        'neutral' =>
            'text-neutral-600 border-neutral-600/60 hover:bg-neutral-600 hover:text-white hover:border-neutral-600 focus:ring-neutral-500',
        'yellow' =>
            'text-yellow-600 border-yellow-600/60 hover:bg-yellow-600 hover:text-white hover:border-yellow-500 focus:ring-yellow-500',
    ];
@endphp

<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'relative inline-flex items-center gap-2 px-6 py-3 font-semibold bg-transparent border-2 rounded-xl shadow-sm transition-all duration-300 ease-out hover:scale-105 active:scale-95 focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100 overflow-hidden group ' . $colorClasses[$color]]) }}>
    <span class="relative z-10">{{ $slot }}</span>
    <div
        class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300
        {{ $color === 'white' ? 'bg-white/10' : ($color === 'green' ? 'bg-green-600' : ($color === 'yellow' ? 'bg-yellow-500' : 'bg-neutral-600')) }}">
    </div>
</button>
