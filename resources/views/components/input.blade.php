@props(['label','name','star'])

<input {{ $attributes->merge(['class'=>'form-control','type' => 'text']) }} name="{{ $name ?? '' }}">

<label class="form-label">
    {{ __($label) ?? '' }}
    @if( $star ?? '' )
        <span class="text-danger">{{ $star }}</span>
    @endif
</label>

@error( $name ?? '' )
<small class="text-danger">{{ $message }}</small>
@enderror

{!! $slot !!}
