@props([
    'checked'=>false,
    'label' => '',
    'name' => ''
])

<div class="">
    <input type="checkbox" name="{{ $name }}" id="{{ $name }}">
    <span class="ml-2"> {{ $label }}</span>
</div>