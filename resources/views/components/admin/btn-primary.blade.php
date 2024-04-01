@props([
    'type'=>'button',
    'class'=> '',
    'name'=>'',
    'id'=>'',
    'disabled' => false,
])

<div {{ $attributes->merge(['class' => $class]) }}>
    <button
        class=" font-semibold focus:outline-none text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" 
        type="{{ $type }}" 
        id="{{ $id }}"
        name="{{ $name }}"
        {{ $disabled ? 'disabled' : '' }} 

    >
        {{ $slot }}
    </button>
</div>


