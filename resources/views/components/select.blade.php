@props([
'name'=>'name',
'label',
'required'=>false,
'disabled'=>false,
'star'=>'',
])

<div class="form-floating mb-3">

    <select {{ $attributes->merge(['class'=>'form-select']) }}
            name="{{ $name }}"
            id="{{ $name }}" {{ $required }} {{ $disabled }}>
        <option value="">-- Select {{ $label }} --</option>
        {{ $slot }}
    </select>

    <label for="{{ $name }}">
        {{ $label }}
        <span class="text-danger">{{ $star }}</span>
    </label>

    @error($name)
    <small class="text-danger">{{ $message }}</small>
    @enderror

</div>
