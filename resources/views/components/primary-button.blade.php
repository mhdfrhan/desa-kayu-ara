<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'relative inline-flex items-center gap-2 px-6 py-3 font-semibold text-white bg-gradient-to-r from-green-500 to-green-600 rounded-xl shadow-lg shadow-green-600/25 hover:shadow-green-500/30 transition-all duration-300 ease-out hover:scale-105 active:scale-95 hover:from-green-600 hover:to-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100 overflow-hidden group']) }}>
    <span class="relative z-10 inline-flex gap-3 w-full justify-center  items-center">{{ $slot }}</span>
    <div
        class="absolute inset-0 bg-gradient-to-r from-green-500/20 to-green-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
    </div>
</button>
