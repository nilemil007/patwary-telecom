    @props([
    'label' => 'Label Name',
    'error',
    'star'=>'',
    ])


<div class="form-floating mb-3">

    <input {{ $attributes->merge(['class'=>'form-control','type' => 'text']) }}>

    <label class="form-label">
        {{ $label }}
        <span class="text-danger">{{ $star }}</span>
    </label>

    @error( $error ?? '' )
    <small class="text-danger">{{ $message }}</small>
    @enderror

</div>
