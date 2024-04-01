@props(['class'=>'','name'=>'','label'=>'','options'=>[],'value'=>'','multiple'=>False,])

<div @class(['form-group', $class])>
    <labe class="block font-medium text-sm text-gray-700 dark:text-gray-300">
        {{ $label }}
    </label> 
      
    @if (!$multiple)
        <select class="form-select select2 form-select-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full " 
            name="{{ $name }}" 
            id="{{ $name }}" 
            aria-label=".form-select-sm example" 
        >
            @foreach ($options as $key => $val)
                <option @selected($value == $key) value="{{$key}}">{{ $val }}</option>
            @endforeach
        </select>
        @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    @else
    
        <select class="select2 select-multiple border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full  " 
            name="{{ $name }}[]" 
            id="{{ $name }}" 
            aria-label=".form-select-sm example" 
            multiple
        >
            @foreach ($options as $key => $val)
                <option @selected($value->contains($key)) value="{{$key}}">{{ $val }}</option>
            @endforeach
        </select>
        @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    @endif


</div>
