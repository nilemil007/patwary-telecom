<x-main>

    <!-- Main Title -->
    <x-slot:title>BP Edit</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>Edit</x-slot:page-pre-title>

    <!-- Page Title -->
    <x-slot:page-title>
        Information (<em>{{ $bp->user->name }}</em>)
    </x-slot:page-title>

    <!-- Page title actions -->
    <x-slot:button>
        <!-- [Full Button]-->
        <x-link href="{{ route('bp.index') }}" class="btn btn-primary d-none d-sm-inline-block">
            <x-icon.back/>All BP
        </x-link>
    </x-slot:button>

    <x-slot:icon-button>
        <!-- [Icon Button]-->
        <x-link href="{{ route('bp.index') }}" class="btn btn-primary d-sm-none btn-icon" >
            <x-icon.back/>
        </x-link>
    </x-slot:icon-button>

    <!-- Page Body -->
    <div class="page-body">
        <div class="container-fluid">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('bp.update', $bp->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <!-- Stuff ID -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input name="stuff_id" label="Stuff ID" value="{{ old('stuff_id',$bp->stuff_id) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Pool Number -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input name="pool_number" type="number" label="Pool Number" star="*" value="{{ old('pool_number',$bp->pool_number) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Personal Number -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Personal Number" star="*" name="personal_number" type="number" value="{{ old('personal_number',$bp->personal_number) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Gender -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-select name="gender" label="Gender">
                                                <option  {{ $bp->gender == 'male' ?'selected':'' }} value="male">Male</option>
                                                <option {{ $bp->gender == 'female' ?'selected':'' }} value="female">Female</option>
                                                <option {{ $bp->gender == 'others' ?'selected':'' }} value="others">Others</option>
                                            </x-select>
                                        </div>
                                    </div>

                                    <!-- Blood Group -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-select name="blood_group" label="Blood Group">
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
                                            <x-input label="Education" star="*" name="education" value="{{ old('education', strtoupper($bp->education)) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Father Name -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Father Name" star="*" name="father_name" value="{{ old('father_name', $bp->father_name) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Mother Name -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Mother Name" star="*" name="mother_name" value="{{ old('mother_name', $bp->mother_name) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Division -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Division" star="*" name="division" value="{{ old('division', $bp->division) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- District -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="District" star="*" name="district" value="{{ old('district', $bp->district) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Thana -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Thana" star="*" name="thana" value="{{ old('thana', $bp->thana) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Address -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Address" star="*" name="address" value="{{ old('address', $bp->address) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- NID -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="NID" star="*" name="nid" value="{{ old('nid', $bp->nid) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Bank Name -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Bank Name" star="*" name="bank_name" value="{{ old('bank_name', $bp->bank_name) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Brunch Name -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Brunch Name" star="*" name="brunch_name" value="{{ old('brunch_name', $bp->brunch_name) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Account Number -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Account Number" star="*" name="account_number" type="number" value="{{ old('account_number', $bp->account_number) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Salary -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Salary" star="*" name="salary" type="number" value="{{ old('salary', $bp->salary) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Date Of Birth -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Date Of Birth" star="*" name="dob" type="date" value="{{ old('dob', !empty($bp->dob)?$bp->dob->toDateString():'') }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Date Of Joining -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Date Of Joining" star="*" name="joining_date" type="date" value="{{ old('joining_date', !empty($bp->joining_date)?$bp->joining_date->toDateString():'') }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Date Of Resign -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Date Of Resign" star="*" name="resigning_date" type="date" value="{{ old('resigning_date', !empty($bp->resigning_date)?$bp->resigning_date->toDateString():'') }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Document Upload -->
                                    <div class="col-md-6">
                                        <a href="#" onclick="event.preventDefault();document.getElementById('document').click();" class="avatar avatar-upload rounded">
                                            <x-icon.upload/>
                                            <span class="avatar-upload-text">Document</span>
                                        </a>
                                        <x-input id="document" name="document" type="file" hidden accept="application/pdf"/>
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
