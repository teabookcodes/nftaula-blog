@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-input border-none rounded-xl shadow-sm
bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500
focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) !!}>