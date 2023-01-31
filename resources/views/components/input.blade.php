@props([
'name'=>'name',
'type'=>'text',
'label',
'disabled'=>false,
'required'=>false,
'placeholder'=>'Placeholder...',
'star'=>'',
])

<div class="form-floating mb-3">

    <input {!! $attributes->merge(['class'=>'form-control']) !!}
           name="{{ $name }}"
           id="{{ $name }}"
           type="{{ $type }}"
           placeholder="{{ $placeholder }}" {{ $disabled }} {{ $required }}>

    <label for="{{ $name }}" class="form-label">
        {{ $label }}
        <span class="text-danger">{{ $star }}</span>
    </label>

    @error('field.'.$name)
    <small class="text-danger">{{ $message }}</small>
    @enderror
    @error($name)
    <small class="text-danger">{{ $message }}</small>
    @enderror

</div>
