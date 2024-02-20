@props([
    'disabled' => false,
    'name'=> '',
    'type'=>'text',
    'class' => '',
    'inputClass' => '',
    'placeholder' => '',
    'value'=> '',
    'required'=> False,
    'label' => '',
    'help' => ''

])

<div {{ $attributes->merge(['class' => $class]) }}>
    <labe class="block font-medium text-sm text-gray-700 dark:text-gray-300">
        {{ $label }}
    </label>
    <input 
    {{ $disabled ? 'disabled' : '' }} 
    class ="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full {{ $inputClass }} "
    type="{{ $type }}"
    id="{{ $name }}"
    name="{{ $name }}"
    placeholder="{{ $placeholder }}"
    value="{{ old($name,$value) }}"
    {{ $required ? 'required' : '' }}
    >   
    @error ($name)
    <div class="text-sm text-red-600 dark:text-red-400 space-y-1">
        {{ $message }}
    </div>
    @enderror
 
</div>