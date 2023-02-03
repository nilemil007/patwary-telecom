@props(['label','error','star'=>'','proposed'=>''])

<div class="form-floating mb-3">

    <select {{ $attributes->merge(['class'=>'form-select']) }}>
        <option value="">-- Select {{ $label }} --</option>
        {{ $slot }}
    </select>

    <label>
        {{ $label }}
        <span class="text-danger">{{ $star }}</span>
    </label>

    @error( $error ?? '' )
    <small class="text-danger">{{ $message }}</small>
    @enderror

    <small class="text-warning">{{ $proposed }}</small>
</div>
