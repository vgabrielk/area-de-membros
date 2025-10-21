@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-4 pe-4 py-3 border-l-4 border-blue-500 text-start text-base font-semibold text-blue-700 dark:text-blue-400 dark:border-blue-400 bg-blue-50 dark:bg-blue-900/30 rounded-r-xl mx-2 my-1 transition-all duration-200 ease-in-out'
            : 'block w-full ps-4 pe-4 py-3 border-l-4 border-transparent text-start text-base font-medium text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:border-gray-300 dark:hover:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500/20 rounded-r-xl mx-2 my-1 transition-all duration-200 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
