@props([
    'label' => '',
    'autofocus' => false,
    'type' => 'text',
    'theme' => 'default',
    'id' => 'floating_input'
])

@php
    $themes = [
        'default' => 'text-gray-900 border-gray-300 focus:ring-cyan-50 focus:border-blue-400 dark:bg-dark dark:text-dark-9',
        'primary' => 'text-blue-800 border-blue-300 focus:ring-blue-100 focus:border-blue-500 dark:bg-dark dark:text-dark-9',
        'danger' => 'text-red-800 border-red-300 focus:ring-red-100 focus:border-red-500 dark:bg-dark dark:text-dark-9',
    ];

    $baseClasses = 'block px-2.5 pb-2.5 pt-3 w-full dark:bg-dark dark:text-dark-9 bg-transparent rounded-lg border-1 appearance-none tracking-wide focus:outline-none peer';
    $inputClass = $baseClasses . ' ' . ($themes[$theme] ?? $themes['default']);
@endphp

<div class="relative w-full">
    <textarea
        {{ $attributes->merge([
            'class' => $inputClass,
            'id' => $id,
            'placeholder' => '', // <- Important for floating label
            'autofocus' => $autofocus,
        ]) }}>{{ trim($slot) }}</textarea>

    <label for="{{ $id }}"
           class="absolute text-sm text-gray-500  duration-300
           transform -translate-y-4 scale-75 top-2 z-10 origin-[0]
           bg-white px-2 peer-focus:px-2 peer-focus:text-blue-400 dark:bg-dark dark:text-dark-9
           peer-focus:dark:text-blue-300 peer-placeholder-shown:scale-100
           peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2
           peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4
           rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1 pointer-events-none">
        {{ $label }}
    </label>
</div>
