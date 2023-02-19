@php

@endphp

<x-main>

    <!-- Main Title -->
    <x-slot:title>Edit Rso</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>Edit</x-slot:page-pre-title>

    <!-- Page Title -->
    <x-slot:page-title>
        Rso Information (<em>{{ $rso->user->name }}</em>) {!! $rso->status ? '-><span class="text-warning"> Approve Pending</span>':''!!}
    </x-slot:page-title>

    <!-- Page title actions -->
    <x-slot:button>
        <!-- [Full Button]-->
        <x-link href="{{ route('rso.index') }}" class="btn btn-primary d-none d-sm-inline-block">
            <x-icon.back></x-icon.back>All Rsos
        </x-link>
    </x-slot:button>

    <x-slot:icon-button>
        <!-- [Icon Button]-->
        <x-link href="{{ route('rso.index') }}" class="btn btn-primary d-sm-none btn-icon" >
            <x-icon.back></x-icon.back>
        </x-link>
    </x-slot:icon-button>

    <!-- Page Body -->
    <div class="page-body">
        <div class="container-fluid">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('rso.update', $rso->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <!-- Supervisor -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-select name="supervisor_id" label="Supervisor">
                                                @foreach( $supervisors as $supervisor )
                                                    <option {{ $supervisor->id == $rso->supervisor_id?'selected':'' }} value="{{ $supervisor->id }}"> {{ $supervisor->pool_number }} - {{ $supervisor->user->name }}</option>
                                                @endforeach
                                            </x-select>
                                        </div>
                                    </div>

                                    <!-- Route -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-select name="routes[]" label="Route" multiple="multiple">
                                                @foreach( $routes as $route )
                                                    <option {{ in_array($route->id, $rso->routes)?'selected':'' }} value="{{ $route->id }}"> {{ $route->code }} - {{ $route->name }}</option>
                                                @endforeach
                                            </x-select>
                                        </div>
                                    </div>

                                    <!-- Rso Code -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Rso Code" name="code" value="{{ old('code', $rso->code) }}" star="*" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Itop Number -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Itop Number" name="itop_number" type="number" value="{{ old('itop_number', $rso->itop_number) }}" star="*" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Pool Number -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Pool Number" name="pool_number" type="number" value="{{ old('pool_number', $rso->pool_number) }}" star="*" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Personal Number -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Personal Number" name="personal_number" type="number" value="{{ old('personal_number', $rso->personal_number) }}" star="*" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- RID -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="RID" name="rid" value="{{ old('rid', $rso->rid) }}" star="*" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Father Name -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Father Name" name="father_name" value="{{ old('father_name', $rso->father_name) }}" star="*" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Mother Name -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Mother Name" name="mother_name" value="{{ old('mother_name', $rso->mother_name) }}" star="*" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Division -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Division" name="division" value="{{ old('division', $rso->division) }}" star="*" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- District -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="District" name="district" value="{{ old('district', $rso->district) }}" star="*" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Thana -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Thana" name="thana" value="{{ old('thana', $rso->thana) }}" star="*" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Address -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Address" name="address" value="{{ old('address', $rso->address) }}" star="*" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Blood Group -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-select name="blood_group" label="Blood Group">
                                                <option {{ $rso->blood_group == 'a+'?'selected':'' }} value="a+">A+</option>
                                                <option {{ $rso->blood_group == 'a-'?'selected':'' }} value="a-">A-</option>
                                                <option {{ $rso->blood_group == 'b+'?'selected':'' }} value="b+">B+</option>
                                                <option {{ $rso->blood_group == 'b-'?'selected':'' }} value="b-">B-</option>
                                                <option {{ $rso->blood_group == 'ab+'?'selected':'' }} value="ab+">AB+</option>
                                                <option {{ $rso->blood_group == 'ab-'?'selected':'' }} value="ab-">AB-</option>
                                                <option {{ $rso->blood_group == 'o+'?'selected':'' }} value="o+">O+</option>
                                                <option {{ $rso->blood_group == 'o-'?'selected':'' }} value="o-">O-</option>
                                            </x-select>
                                        </div>
                                    </div>

                                    <!-- SR No -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="SR No" name="sr_no" value="{{ old('sr_no', $rso->sr_no) }}" star="*" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Account Number -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Account Number" name="account_number" type="number" value="{{ old('account_number', $rso->account_number) }}" star="*" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Bank Name -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Bank Name" name="bank_name" value="{{ old('rid', $rso->rid) }}" star="*" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Brunch Name -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Brunch Name" name="brunch_name" value="{{ old('brunch_name', $rso->brunch_name) }}" star="*" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Routing Number -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Routing Number" name="routing_number" type="number" value="{{ old('routing_number', $rso->routing_number) }}" star="*" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Market Type -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Market Type" name="market_type" value="{{ old('rid', $rso->rid) }}" star="*" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Salary -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Salary" name="salary" type="number" value="{{ old('salary', $rso->salary) }}" star="*" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Education -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Education" name="education" value="{{ old('education', $rso->education) }}" star="*" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Marital Status -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-select name="marital_status" label="Marital Status">
                                                <option {{ $rso->marital_status == 'Married'?'selected':'' }} value="married">Married</option>
                                                <option {{ $rso->marital_status == 'Unmarried'?'selected':'' }} value="unmarried">Unmarried</option>
                                            </x-select>
                                        </div>
                                    </div>

                                    <!-- Gender -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-select name="gender" label="Gender">
                                                <option {{ $rso->gender == 'male'?'selected':'' }} value="male">Male</option>
                                                <option {{ $rso->gender == 'female'?'selected':'' }} value="female">Female</option>
                                                <option {{ $rso->gender == 'others'?'selected':'' }} value="others">Others</option>
                                            </x-select>
                                        </div>
                                    </div>

                                    <!-- Date Of Birth -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Date Of Birth" name="dob" type="date" value="{{ old('dob', !empty($rso->dob)?$rso->dob->toDateString():'') }}" star="*" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- NID -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="NID" name="nid" type="number" value="{{ old('nid', $rso->nid) }}" star="*" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Date Of Joining -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Date Of Joining" name="joining_date" type="date" value="{{ old('joining_date', !empty($rso->joining_date)?$rso->joining_date->toDateString():'') }}" star="*" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Date Of Resign -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Date Of Resign" name="resigning_date" type="date" value="{{ old('resigning_date', !empty($rso->resigning_date)?$rso->resigning_date->toDateString():'') }}" star="*" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Document Upload -->
                                    <div class="col-md-12">
                                        <a href="#" onclick="event.preventDefault();document.getElementById('document').click();" class="avatar avatar-upload rounded">
                                            <x-icon.upload></x-icon.upload>
                                            <span class="avatar-upload-text">Document</span>
                                        </a>
                                        <x-input id="document" name="document" type="file" hidden accept="application/pdf"></x-input>
                                    </div>
                                </div>

                                <div class="form-footer">
                                    <x-button class="w-100 d-md-none"><x-icon.reload></x-icon.reload>Update</x-button>
                                    <x-button class="d-none d-md-block"><x-icon.reload></x-icon.reload>Update</x-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main>
