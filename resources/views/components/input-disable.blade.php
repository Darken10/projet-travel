@props([
    'class'=>'',
    'value'=>'',
    'label'=>'',
])
<div class="{{ $class }}">
    <labe class="block font-medium text-sm text-gray-700 dark:text-gray-300">
        {{ $label }}
    </label>
    <input type="text" value="{{ $value }}" aria-label="disabled input" class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"  disabled>
</div>