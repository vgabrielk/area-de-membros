@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-3 py-2 border-b-2 border-blue-500 text-sm font-semibold leading-5 text-blue-700 dark:text-blue-400 dark:border-blue-400 bg-blue-50/50 dark:bg-blue-900/20 rounded-t-lg transition-all duration-200 ease-in-out'
            : 'inline-flex items-center px-3 py-2 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 hover:border-gray-300 dark:hover:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800/50 rounded-t-lg focus:outline-none focus:ring-2 focus:ring-blue-500/20 transition-all duration-200 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
