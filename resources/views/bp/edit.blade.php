<x-main>
    <!-- Main Title -->
    <x-slot:title>BP</x-slot:title>

    <div class="container-fluid">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Edit
                    </div>
                    <h2 class="page-title">
                        Information (<em>{{ $bp->user->name }}</em>)
                    </h2>
                </div>

                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <!-- [Full Button]-->
                        <x-link href="{{ route('dashboard') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <x-icon.back/>All BP
                        </x-link>

                        <!-- [Icon Button]-->
                        <x-link href="{{ route('dashboard') }}" class="btn btn-primary d-sm-none btn-icon" >
                            <x-icon.back></x-icon.back>
                        </x-link>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Body -->
    <div class="page-body">
        <div class="container-fluid">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('bp.update', $bp->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <!-- Stuff ID -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input name="stuff_id" label="Stuff ID" error="stuff_id"
                                                     value="{{ old('stuff_id',$bp->stuff_id) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Pool Number -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input name="pool_number" type="number" label="Pool Number" star="*" error="pool_number"
                                                     value="{{ old('pool_number',$bp->pool_number) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Personal Number -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Personal Number" star="*" name="personal_number" error="pool_number" type="number"
                                                     value="{{ old('personal_number',$bp->personal_number) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Gender -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-select name="gender" label="Gender" error="gender">
                                                <option  {{ $bp->gender == 'male' ?'selected':'' }} value="male">Male</option>
                                                <option {{ $bp->gender == 'female' ?'selected':'' }} value="female">Female</option>
                                                <option {{ $bp->gender == 'others' ?'selected':'' }} value="others">Others</option>
                                            </x-select>
                                        </div>
                                    </div>

                                    <!-- Blood Group -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-select name="blood_group" label="Blood Group" error="blood_group">
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
                                    </div>

                                    <!-- Education -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Education" star="*" name="education" error="education"
                                                     value="{{ old('education', $bp->education) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Father Name -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Father Name" star="*" name="father_name" error="father_name"
                                                     value="{{ old('father_name', $bp->father_name) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Mother Name -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Mother Name" star="*" name="mother_name" error="mother_name"
                                                     value="{{ old('mother_name', $bp->mother_name) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Division -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Division" star="*" name="division" error="division"
                                                     value="{{ old('division', $bp->division) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- District -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="District" star="*" name="district" error="district"
                                                     value="{{ old('district', $bp->district) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Thana -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Thana" star="*" name="thana" error="thana"
                                                     value="{{ old('thana', $bp->thana) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Address -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Address" star="*" name="address" error="address"
                                                     value="{{ old('address', $bp->address) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- NID -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="NID" star="*" name="nid" error="nid"
                                                     value="{{ old('nid', $bp->nid) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Bank Name -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Bank Name" star="*" name="bank_name" error="bank_name"
                                                     value="{{ old('bank_name', $bp->bank_name) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Brunch Name -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Brunch Name" star="*" name="brunch_name" error="brunch_name"
                                                     value="{{ old('brunch_name', $bp->brunch_name) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Account Number -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Account Number" star="*" name="account_number" type="number" error="account_number"
                                                     value="{{ old('account_number', $bp->account_number) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Salary -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Salary" star="*" name="salary" type="number" error="salary"
                                                     value="{{ old('salary', $bp->salary) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Date Of Birth -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Date Of Birth" star="*" name="dob" type="date" error="dob"
                                                     value="{{ old('dob', !empty($bp->dob)?$bp->dob->toDateString():'') }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Date Of Joining -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Date Of Joining" star="*" name="joining_date" type="date" error="joining_date"
                                                     value="{{ old('joining_date', !empty($bp->joining_date)?$bp->joining_date->toDateString():'') }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Date Of Resign -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Date Of Resign" star="*" name="resigning_date" type="date" error="resigning_date"
                                                     value="{{ old('resigning_date', !empty($bp->resigning_date)?$bp->resigning_date->toDateString():'') }}" placeholder></x-input>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-footer">
                                    <x-button class="w-100 d-md-none"><x-icon.reload/>Update</x-button>
                                    <x-button class="d-none d-md-block"><x-icon.reload/>Update</x-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main>
