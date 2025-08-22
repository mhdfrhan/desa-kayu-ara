<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'relative inline-flex items-center gap-2 px-6 py-3 font-semibold text-green-600 bg-transparent rounded-xl transition-all duration-300 ease-out hover:scale-105 active:scale-95 hover:text-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100 group']) }}>
    <span class="relative z-10">{{ $slot }}</span>
    <div
        class="absolute bottom-2 left-6 right-6 h-0.5 bg-green-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left">
    </div>
</button>
