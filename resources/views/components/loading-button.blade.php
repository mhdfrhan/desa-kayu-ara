<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'relative inline-flex items-center gap-2 px-6 py-3 font-semibold text-white bg-gradient-to-r from-green-600 to-green-700 rounded-xl shadow-lg shadow-green-600/25 hover:shadow-green-500/40 transition-all duration-300 ease-out hover:scale-105 active:scale-95 hover:from-green-700 hover:to-green-800 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100 overflow-hidden group']) }}>
    <span class="relative z-10 flex items-center gap-2">
        @if ($attributes->get('loading'))
            <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                </circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
        @endif
        {{ $slot }}
    </span>
    <div
        class="absolute inset-0 bg-gradient-to-r from-green-500/20 to-green-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
    </div>
</button>
