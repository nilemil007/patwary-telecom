<div class="row">
    <!-- Current Password -->
    <div class="col-md-6">
        <x-input name="current_password"
                 label="Current Password"
                 type="password"
                 wire:model.debounce.500="current_password"
                 star="*">
        </x-input>
    </div>

    <!-- New Password -->
    <div class="col-md-6">
        <x-input name="password"
                 label="New Password"
                 type="password"
                 wire:model.debounce.500="password"
                 star="*">
        </x-input>
    </div>

    <!-- Confirm Password -->
    <div class="col-md-6">
        <x-input name="password_confirmation"
                 label="Confirm Password"
                 type="password"
                 wire:model.debounce.500="password_confirmation"
                 star="*">
        </x-input>
    </div>
</div>
