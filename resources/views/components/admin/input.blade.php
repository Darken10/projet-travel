@props([
    'disabled' => false,
    'name'=> '',
    'type'=>'text',
    'class' => '',
    'inputClass' => '',
    'placeholder' => '',
    'value' => '',
    'required'=> False,
    'label' => '',
    'help' => '',
    'min'=>'',
    'max'=>'',
    'hidden'=>false,
    "multiple" => false,
    "accept" => '',
])


<div {{ $attributes->merge(['class' => $class]) }}>
    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">
        {{ $label }}
    </label>
    
    @if ($type == "textarea")
        <textarea
            class ="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full {{ $inputClass }} "
            {{ $disabled ? 'disabled' : '' }} 
            {{ $hidden ? 'hidden' : '' }} 
            id="{{ $name }}"
            name="{{ $name }}"
            placeholder="{{ $placeholder }}"
            {{ $required ? 'required' : '' }}
            >{{ old($name,$value) }}</textarea>
    @else
    <input 
        class ="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full {{ $inputClass }} "
        {{ $disabled ? 'disabled' : '' }} 
        type="{{ $type }}"
        id="{{ $name }}"
        name="{{ $name }}"
        placeholder="{{ $placeholder }}"
        value="{{ $value=='' ? $value : old($name,$value) }}"
        {{  $hidden =='' ? null : "hidden " }}
        {{  $min =='' ? null : "min = $min " }}
        {{  $max =='' ? null : "max = $max " }}
        {{  ! $multiple  ? null : "multiple" }}
        {{  $accept =='' ? null : "accept = $accept " }}
        
        max = "{{ $max }}"
        {{ $required ? 'required' : '' }}
    > 
    @endif

    @error ($name)
    <div class="text-sm text-red-600 dark:text-red-400 space-y-1">
        {{ $message }}
    </div>
    @enderror
 
</div>