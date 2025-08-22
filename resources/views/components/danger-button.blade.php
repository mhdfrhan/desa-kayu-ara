<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'relative inline-flex items-center gap-2 px-6 py-3 font-semibold text-white bg-gradient-to-r from-red-600 to-red-700 rounded-xl shadow-lg shadow-red-600/25 hover:shadow-red-500/40 transition-all duration-300 ease-out hover:scale-105 active:scale-95 hover:from-red-700 hover:to-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100 overflow-hidden group']) }}>
    <span class="relative z-10">{{ $slot }}</span>
    <div
        class="absolute inset-0 bg-gradient-to-r from-red-500/20 to-red-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
    </div>
</button>
