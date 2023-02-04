@props(['label','error','star'])

<input {{ $attributes->merge(['class'=>'form-control','type' => 'text']) }}>

<label class="form-label">
    {{ $label ?? '' }}
    @if( $star ?? '' )
        <span class="text-danger">{{ $star }}</span>
    @endif
</label>

@error( $error ?? '' )
<small class="text-danger">{{ $message }}</small>
@enderror

{!! $slot !!}
