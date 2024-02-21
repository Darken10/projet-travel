@props(['class'=>'','name'=>'','label'=>'','options'=>[],'value'=>'','multiple'=>False,])

<div @class(['form-group', $class])>
    <label for="{{ $name }}" class="form-label row">{{$label}}</label>
   
    @if (!$multiple)
        <select class="form-select select2 form-select-sm" name="{{ $name }}" id="{{ $name }}" aria-label=".form-select-sm example" >
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
    
        <select class="form-select select2 select-multiple form-select-sm" name="{{ $name }}[]" id="{{ $name }}" aria-label=".form-select-sm example" multiple>
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
