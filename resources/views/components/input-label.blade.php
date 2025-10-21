@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-semibold text-sm text-gray-800 mb-2 dark:text-gray-200']) }}>
    {{ $value ?? $slot }}
</label>
