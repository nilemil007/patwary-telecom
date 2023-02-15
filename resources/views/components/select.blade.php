@props(['label','name','star'=>'','proposed'=>''])

<select {{ $attributes->merge(['class'=>'form-select']) }} name="{{ $name ?? '' }}">
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
