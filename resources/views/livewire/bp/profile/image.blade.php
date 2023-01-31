<div class="col-12">
    @if($image)
        <a href="#" onclick="event.preventDefault(); document.getElementById('image').click();"
           class="avatar avatar-upload rounded overflow-hidden">
            <img src="{{ $image->temporaryUrl() }}" alt="BP Image">
        </a>
    @else
        <a href="#" onclick="event.preventDefault(); document.getElementById('image').click();"
           class="avatar avatar-upload rounded overflow-hidden">
            <img src="{{ asset( $bp->user->image ) }}" alt="BP Image">
        </a>
    @endif
    <input type="file" id="image" wire:model="image" name="image" accept="image/jpeg" hidden>
    @error('image')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
