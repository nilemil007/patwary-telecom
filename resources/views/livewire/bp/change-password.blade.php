<div class="col-md-6">
    <x-input name="current_password"
             label="Current Password"
             type="password"
             error="current_password"
             wire:model.debounce.500="current_password"
             star="*" placeholder>
    </x-input>
</div>
