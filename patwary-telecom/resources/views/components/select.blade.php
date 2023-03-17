@props(['label','name','star'=>'','proposed'=>'','disabled'=>''])

<select {{ $attributes->merge(['class'=>'form-select']) }} name="{{ $name ?? '' }}" {{ $disabled }}>
    <option value="">-- Select {{ __($label) }} --</option>
    {{ $slot }}
</select>

<label>
    {{ __($label) }}
    <span class="text-danger">{{ $star }}</span>
</label>

@error( $name ?? '' )
<small class="text-danger">{{ $message }}</small>
@enderror

<small class="text-warning">{{ $proposed }}</small>
