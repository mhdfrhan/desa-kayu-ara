<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'relative inline-flex items-center justify-center w-12 h-12 font-semibold text-neutral-600 bg-white/80 backdrop-blur-sm border border-neutral-200/60 rounded-xl shadow-sm shadow-neutral-200/50 hover:shadow-neutral-300/60 transition-all duration-300 ease-out hover:scale-105 active:scale-95 hover:bg-white hover:border-neutral-300 hover:text-neutral-800 focus:outline-none focus:ring-2 focus:ring-neutral-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100 overflow-hidden group']) }}>
    <span class="relative z-10">{{ $slot }}</span>
    <div
        class="absolute inset-0 bg-gradient-to-r from-neutral-100/50 to-neutral-200/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
    </div>
</button>
