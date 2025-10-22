@props(['disabled' => false, 'label' => ''])

<div class="flex flex-col">

    <x-input-label>{{$label}}</x-input-label>
   <input type="{{ $attributes['type'] ?? 'text' }}"
       @disabled($disabled)
       {{ $attributes->merge([
           'class' => 'w-full px-4 py-3 text-gray-900 bg-white border-2 border-gray-200 rounded-xl shadow-sm transition-all duration-200 ease-in-out placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 hover:border-gray-300 disabled:bg-gray-50 disabled:text-gray-500 disabled:border-gray-200 disabled:cursor-not-allowed dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:border-blue-400 dark:focus:ring-blue-400/10 dark:hover:border-gray-500 dark:disabled:bg-gray-700'
       ]) }}
       value="{{ $attributes['type'] === 'file' ? '' : ($attributes['value'] ?? '') }}">
</div>
