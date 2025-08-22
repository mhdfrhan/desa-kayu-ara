<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'relative inline-flex items-center gap-2 px-6 py-3 font-semibold text-neutral-600 bg-transparent rounded-xl transition-all duration-300 ease-out hover:scale-105 active:scale-95 hover:bg-neutral-100 hover:text-neutral-800 focus:outline-none focus:ring-2 focus:ring-neutral-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100 overflow-hidden group']) }}>
    <span class="relative z-10">{{ $slot }}</span>
    <div class="absolute inset-0 bg-neutral-100 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
</button>
