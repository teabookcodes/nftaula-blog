<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-indigo-500 border
    border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest
    hover:bg-indigo-600 dark:hover:bg-indigo-400 focus:bg-indigo-600 dark:focus:bg-indigo-400 active:bg-indigo-700
    dark:active:bg-indigo-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
    dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>