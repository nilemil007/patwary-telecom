<div class="col-12">
    @if($image)
        <a href="#" onclick="event.preventDefault(); document.getElementById('image').click();"
           class="avatar avatar-upload rounded overflow-hidden">
            <img src="{{ $image->temporaryUrl() }}" alt="Rso Image">
        </a>
    @else
        <a href="#" onclick="event.preventDefault(); document.getElementById('image').click();"
           class="avatar avatar-upload rounded overflow-hidden">
            <img src="{{ asset( $rso->user->image ) }}" alt="Rso Image">
        </a>
    @endif
    <input type="file" id="image" wire:model="image" name="image" accept="image/jpeg,jpg" hidden>
    @error('image')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
