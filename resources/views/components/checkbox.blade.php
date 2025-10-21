@props(['disabled' => false])

<input @disabled($disabled) type="checkbox" {{ $attributes->merge(['class' => 'w-5 h-5 text-blue-600 bg-white border-2 border-gray-300 rounded-lg focus:ring-blue-500 focus:ring-4 focus:ring-blue-500/20 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600 transition-all duration-200 ease-in-out hover:border-blue-400 disabled:opacity-50 disabled:cursor-not-allowed']) }}>
