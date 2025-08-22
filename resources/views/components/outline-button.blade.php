@php
    $color = $attributes->get('color', 'white');

    $colorClasses = [
        'white' => 'text-white border-white/60 hover:bg-white/10 hover:border-white focus:ring-white/50',
        'green' => 'text-green-600 border-green-200 hover:bg-green-50 hover:border-green-300 focus:ring-green-200',
        'neutral' => 'text-gray-600 border-gray-200 hover:bg-gray-50 hover:border-gray-300 focus:ring-gray-200',
        'yellow' =>
            'text-yellow-600 border-yellow-200 hover:bg-yellow-50 hover:border-yellow-300 focus:ring-yellow-200',
        'red' => 'text-red-600 border-red-200 hover:bg-red-50 hover:border-red-300 focus:ring-red-200',
        'blue' => 'text-blue-600 border-blue-200 hover:bg-blue-50 hover:border-blue-300 focus:ring-blue-200',
    ];
@endphp

<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'relative inline-flex items-center gap-2 px-6 py-3 font-semibold bg-transparent border-2 rounded-xl shadow-sm transition-all duration-300 ease-out hover:scale-105 active:scale-95 focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100 overflow-hidden group ' . $colorClasses[$color]]) }}>
    <span class="relative z-10">{{ $slot }}</span>
    <div
        class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300
        {{ $color === 'white' ? 'bg-white/10' : ($color === 'green' ? 'bg-green-50' : ($color === 'yellow' ? 'bg-yellow-50' : ($color === 'red' ? 'bg-red-50' : ($color === 'blue' ? 'bg-blue-50' : 'bg-gray-50')))) }}">
    </div>
</button>
