@props(['disabled' => false, 'value' => '', 'placeholder' => ''])


<input
    type="text"
    class="p-3 dark:bg-gray-700 border-none rounded-xl block shadow-md dark:shadow-gray-800 dark:text-gray-100 dark:placeholder-gray-300"
    {{ $disabled ? 'disabled' : '' }}

    {{ $attributes->merge(['value' => $value, 'placeholder' => $placeholder]) }}
/>
