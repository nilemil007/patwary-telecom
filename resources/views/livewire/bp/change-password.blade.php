<div class="col-md-6">
    <div class="form-floating mb-3">
        <x-input name="current_password"
             label="Current Password"
             type="password"
             error="current_password"
             wire:model.debounce.500="current_password"
             star="*" placeholder></x-input>
    </div>
</div>
