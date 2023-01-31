<div class="row">
    <!-- Stuff ID -->
    <div class="col-md-6">
        <x-input name="stuff_id"
                 label="Stuff Id"
                 wire:model.lazy="field.stuff_id"
                 star="*">
        </x-input>
    </div>

    <!-- Pool Number -->
    <div class="col-md-6">
        <x-input name="pool_number"
                 type="number"
                 label="Pool Number"
                 wire:model.lazy="field.pool_number"
                 star="*">
        </x-input>
    </div>

    <!-- Personal Number -->
    <div class="col-md-6">
        <x-input name="personal_number"
                 type="number"
                 label="Personal Number"
                 wire:model.lazy="field.personal_number"
                 star="*">
        </x-input>
    </div>

    <!-- Gender -->
    <div class="col-md-6">
        <x-select name="gender"
                  wire:model.lazy="field.gender"
                  label="Gender">
            <option {{ $bp->gender == 'male' ?'selected':'' }} value="male">Male</option>
            <option {{ $bp->gender == 'female' ?'selected':'' }} value="female">Female</option>
            <option {{ $bp->gender == 'others' ?'selected':'' }} value="others">Others</option>
        </x-select>
    </div>

    <!-- Blood Group -->
    <div class="col-md-6">
        <x-select name="blood_group"
                  wire:model.lazy="field.blood_group"
                  label="Blood Group">
            <option {{ $bp->blood_group == 'a+'?'selected':'' }} value="a+">A+</option>
            <option {{ $bp->blood_group == 'a-'?'selected':'' }} value="a-">A-</option>
            <option {{ $bp->blood_group == 'b+'?'selected':'' }} value="b+">B+</option>
            <option {{ $bp->blood_group == 'b-'?'selected':'' }} value="b-">B-</option>
            <option {{ $bp->blood_group == 'ab+'?'selected':'' }} value="ab+">AB+</option>
            <option {{ $bp->blood_group == 'ab-'?'selected':'' }} value="ab-">AB-</option>
            <option {{ $bp->blood_group == 'o+'?'selected':'' }} value="o+">O+</option>
            <option {{ $bp->blood_group == 'o-'?'selected':'' }} value="o-">O-</option>
        </x-select>
    </div>

    <!-- Education -->
    <div class="col-md-6">
        <x-input name="education"
                 label="Education"
                 wire:model.lazy="field.education">
        </x-input>
    </div>

    <!-- Father Name -->
    <div class="col-md-6">
        <x-input name="father_name"
                 label="Father Name"
                 wire:model.lazy="field.father_name">
        </x-input>
    </div>

    <!-- Mother Name -->
    <div class="col-md-6">
        <x-input name="mother_name"
                 label="Mother Name"
                 wire:model.lazy="field.mother_name">
        </x-input>
    </div>

    <!-- Division -->
    <div class="col-md-6">
        <x-input name="division"
                 label="Division"
                 wire:model.lazy="field.division">
        </x-input>
    </div>

    <!-- District -->
    <div class="col-md-6">
        <x-input name="district"
                 label="District"
                 wire:model.lazy="field.district">
        </x-input>
    </div>

    <!-- Thana -->
    <div class="col-md-6">
        <x-input name="thana"
                 label="Thana"
                 wire:model.lazy="field.thana">
        </x-input>
    </div>

    <!-- Address -->
    <div class="col-md-6">
        <x-input name="address"
                 label="Address"
                 wire:model.lazy="field.address">
        </x-input>
    </div>

    <!-- NID -->
    <div class="col-md-6">
        <x-input name="nid"
                 type="number"
                 label="NID"
                 wire:model.lazy="field.nid">
        </x-input>
    </div>

    <!-- Bank Name -->
    <div class="col-md-6">
        <x-input name="bank_name"
                 label="Bank Name"
                 wire:model.lazy="field.bank_name">
        </x-input>
    </div>

    <!-- Brunch Name -->
    <div class="col-md-6">
        <x-input name="brunch_name"
                 label="Brunch Name"
                 wire:model.lazy="field.brunch_name">
        </x-input>
    </div>

    <!-- Account Number -->
    <div class="col-md-6">
        <x-input name="account_number"
                 type="number"
                 label="Account Number"
                 wire:model.lazy="field.account_number">
        </x-input>
    </div>

    <!-- Salary -->
    <div class="col-md-6">
        <x-input name="salary"
                 type="number"
                 label="Salary"
                 wire:model.lazy="field.salary">
        </x-input>
    </div>

    <!-- Date Of Birth -->
    <div class="col-md-6">
        <x-input name="dob"
                 type="date"
                 label="Date Of Birth"
                 wire:model.lazy="dob">
        </x-input>
    </div>

    <!-- Date Of Joining -->
    <div class="col-md-6">
        <x-input name="joining_date"
                 type="date"
                 label="Date Of Joining"
                 wire:model.lazy="joining_date">
        </x-input>
    </div>

    <!-- Date Of Resign -->
    <div class="col-md-6">
        <x-input name="resigning_date"
                 type="date"
                 label="Date Of Resign"
                 wire:model.lazy="resigning_date">
        </x-input>
    </div>
</div>
