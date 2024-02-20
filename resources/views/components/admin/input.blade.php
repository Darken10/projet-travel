@props([
    'name'=> '',
    'type'=>'text',
    'class' => '',
    'placeholder' => '',
    'value'=> '',
    'required'=> False,
    'label' => '',
    'help' => ''


])

<div @class(['mb-3 form-group', $class])>
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>

    @if ($type == "textarea")
        <textarea
            class="form-control @error($name) is-invalid @enderror"
            id="{{ $name }}"
            name="{{ $name }}"
            placeholder="{{ $placeholder }}"
            {{ $required ? 'required' : '' }}
            >{{ old($name,$value) }}</textarea>
    @else
        <input
            type="{{ $type }}"
            class="form-control @error($name) is-invalid @enderror"
            id="{{ $name }}"
            name="{{ $name }}"
            placeholder="{{ $placeholder }}"
            value="{{ old($name,$value) }}"
            {{ $required ? 'required' : '' }}
        >
    @endif


    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    @if ($help != '')
        <small id="helpId" class="form-text text-muted">{{ $help }}</small>
    @endif
</div>
