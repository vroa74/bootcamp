



<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-yellow-800 dark:bg-yellow-200
                                                                border border-transparent rounded-md font-semibold text-xs
                                                                text-dark dark:text-black-800 uppercase tracking-widest hover:bg-yellow-500
                                                                dark:hover:bg-yellow-700 focus:bg-yellow-700 dark:focus:bg-yellow
                                                                active:bg-yellow-900 dark:active:bg-yellow-300 focus:outline-none
                                                                focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
                                                                dark:focus:ring-offset-yellow-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
