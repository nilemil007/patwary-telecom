@extends('layouts.app')

@push('title') Edit BP @endpush

@php
    $p_num_warning = !empty($bp->tmp_personal_number)?'bg-warning-lt':'';
    $edu_warning = !empty($bp->tmp_education)?'bg-warning-lt':'';
    $father_name_warning = !empty($bp->tmp_father_name)?'bg-warning-lt':'';
    $division_warning = !empty($bp->tmp_division)?'bg-warning-lt':'';
    $district_warning = !empty($bp->tmp_district)?'bg-warning-lt':'';
    $thana_warning = !empty($bp->tmp_thana)?'bg-warning-lt':'';
    $address_warning = !empty($bp->tmp_address)?'bg-warning-lt':'';
    $mother_name_warning = !empty($bp->tmp_mother_name)?'bg-warning-lt':'';
    $blood_group_warning = !empty($bp->tmp_blood_group)?'bg-warning-lt':'';
    $nid_warning = !empty($bp->tmp_nid)?'bg-warning-lt':'';
    $bank_name_warning = !empty($bp->tmp_bank_name)?'bg-warning-lt':'';
    $brunch_name_warning = !empty($bp->tmp_brunch_name)?'bg-warning-lt':'';
    $account_number_warning = !empty($bp->tmp_account_number)?'bg-warning-lt':'';
    $dob_warning = !empty($bp->tmp_dob)?'bg-warning-lt':'';
    $proposed_blood_group = !empty($bp->tmp_blood_group)?$bp->tmp_blood_group:'';
@endphp

@section('main-content')
    <div class="container-fluid">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Edit/Update
                    </div>
                    <h2 class="page-title">
                        BP (<em>{{ $bp->user->name }}</em>) {!! $bp->status ? '-><span class="text-warning"> Approve Pending</span>':''!!}
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <ul class="nav nav-tabs nav-fill" data-bs-toggle="tabs">
                            <!-- General -->
                            <li class="nav-item">
                                <a href="#general_info" class="nav-link active" data-bs-toggle="tab">
                                    <x-icon.home/>General
                                </a>
                            </li>
                            <!-- Additional -->
                            <li class="nav-item">
                                <a href="#additional" class="nav-link" data-bs-toggle="tab">
                                    <x-icon.circle-plus/>Additional
                                </a>
                            </li>
                            <!-- Change Password -->
                            <li class="nav-item">
                                <a href="#tabs-activity-16" class="nav-link" data-bs-toggle="tab">
                                    <x-icon.key/>Change Password
                                </a>
                            </li>
                        </ul>
                        <div class="card-body">
                            <div class="tab-content">
                                <!-- General -->
                                <div class="tab-pane show active" id="general_info">
                                    <form action="{{ route('bp.profile.update', $bp->id) }}"
                                          method="POST" class="row g-3" autocomplete="off"
                                          enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')

                                        <!-- Image -->
                                        <livewire:bp.profile.image :bp="$bp"/>

                                        <!-- Name -->
                                        <div class="col-md-6">
                                            <x-input label="Name" value="{{ $bp->user->name }}" disabled></x-input>
                                        </div>

                                        <!-- Username -->
                                        <div class="col-md-6">
                                            <x-input name="username"
                                                     label="Username"
                                                     error="username"
                                                     value="{{ old('username', $bp->user->username) }}" placeholder>
                                            </x-input>
                                        </div>

                                        <!-- Email -->
                                        <div class="col-md-6">
                                            <x-input name="email" type="email"
                                                     label="Email"
                                                     error="email"
                                                     value="{{ old('email', $bp->user->email) }}" placeholder></x-input>
                                        </div>

                                        <!-- Role -->
                                        <div class="col-md-6">
                                            <x-input label="Role"
                                                     value="{{ strtoupper($bp->user->role) }}" disabled></x-input>
                                        </div>

                                        <!-- Submit Button -->
                                        @if( !$bp->status )
                                            <div class="form-footer">
                                                <x-button class="w-100 d-md-none">
                                                    <x-icon.save/>Save Changes
                                                </x-button>

                                                <x-button class="d-none d-md-block">
                                                    <x-icon.save/>Save Changes
                                                </x-button>
                                            </div>
                                        @endif
                                    </form>
                                </div>

                                <!-- Additional -->
                                <div class="tab-pane" id="additional">
                                    <form action="{{ route('bp.additional.update', $bp->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')

                                        <div class="row">
                                            <!-- Stuff ID -->
                                            <div class="col-md-6">
                                                <x-input name="stuff_id" error="stuff_id"
                                                         value="{{ old('stuff_id', $bp->stuff_id) }}"
                                                         label="Stuff ID" star="*" placeholder readonly></x-input>
                                            </div>

                                            <!-- Pool Number -->
                                            <div class="col-md-6">
                                                <x-input name="pool_number"
                                                         value="{{ old('pool_number', $bp->pool_number) }}"
                                                         error="pool_number"
                                                         type="number"
                                                         label="Pool Number"
                                                         star="*" placeholder readonly>
                                                </x-input>
                                            </div>

                                            <!-- Personal Number -->
                                            <div class="col-md-6">
                                                <x-input name="personal_number"
                                                         value="{{ old('personal_number', $bp->personal_number) }}"
                                                         class="{{ $p_num_warning }}"
                                                         error="personal_number"
                                                         type="number"
                                                         label="Personal Number"
                                                         star="*" placeholder>
                                                    @if( $bp->tmp_personal_number )
                                                        <small class="text-warning">{{ $bp->tmp_personal_number }}</small>
                                                    @endif
                                                </x-input>
                                            </div>

                                            <!-- Gender -->
                                            <div class="col-md-6">
                                                <x-select name="gender" label="Gender" error="gender" placeholder>
                                                    <option {{ $bp->gender == 'male' ?'selected':'' }} value="male">Male</option>
                                                    <option {{ $bp->gender == 'female' ?'selected':'' }} value="female">Female</option>
                                                    <option {{ $bp->gender == 'others' ?'selected':'' }} value="others">Others</option>
                                                </x-select>
                                            </div>

                                            <!-- Blood Group -->
                                            <div class="col-md-6">
                                                <x-select name="blood_group"
                                                          proposed="{{ $proposed_blood_group }}"
                                                          class="{{ $blood_group_warning }}"
                                                          error="blood_group"
                                                          label="Blood Group" placeholder>
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
                                                <x-input name="education" error="education"
                                                         class="{{ $edu_warning }}"
                                                         value="{{ old('education', $bp->education) }}"
                                                         label="Education" placeholder>
                                                    @if( $bp->tmp_education )
                                                        <small class="text-warning">{{ $bp->tmp_education }}</small>
                                                    @endif
                                                </x-input>
                                            </div>

                                            <!-- Father Name -->
                                            <div class="col-md-6">
                                                <x-input name="father_name" error="father_name"
                                                         class="{{ $father_name_warning }}"
                                                         value="{{ old('father_name', $bp->father_name) }}"
                                                         label="Father Name" placeholder>
                                                    @if( $bp->tmp_father_name )
                                                        <small class="text-warning">{{ $bp->tmp_father_name }}</small>
                                                    @endif
                                                </x-input>
                                            </div>

                                            <!-- Mother Name -->
                                            <div class="col-md-6">
                                                <x-input name="mother_name" error="mother_name"
                                                         class="{{ $mother_name_warning }}"
                                                         value="{{ old('mother_name', $bp->mother_name) }}"
                                                         label="Mother Name" placeholder>
                                                    @if( $bp->tmp_mother_name )
                                                        <small class="text-warning">{{ $bp->tmp_mother_name }}</small>
                                                    @endif
                                                </x-input>
                                            </div>

                                            <!-- Division -->
                                            <div class="col-md-6">
                                                <x-input name="division" error="division"
                                                         class="{{ $division_warning }}"
                                                         value="{{ old('division', $bp->division) }}"
                                                         label="Division" placeholder>
                                                    @if( $bp->tmp_division )
                                                        <small class="text-warning">{{ $bp->tmp_division }}</small>
                                                    @endif
                                                </x-input>
                                            </div>

                                            <!-- District -->
                                            <div class="col-md-6">
                                                <x-input name="district" error="district"
                                                         class="{{ $district_warning }}"
                                                         value="{{ old('district', $bp->district) }}"
                                                         label="District" placeholder>
                                                    @if( $bp->tmp_district )
                                                        <small class="text-warning">{{ $bp->tmp_district }}</small>
                                                    @endif
                                                </x-input>
                                            </div>

                                            <!-- Thana -->
                                            <div class="col-md-6">
                                                <x-input name="thana" error="thana"
                                                         class="{{ $thana_warning }}"
                                                         value="{{ old('thana', $bp->thana) }}"
                                                         label="Thana" placeholder>
                                                    @if( $bp->tmp_thana )
                                                        <small class="text-warning">{{ $bp->tmp_thana }}</small>
                                                    @endif
                                                </x-input>
                                            </div>

                                            <!-- Address -->
                                            <div class="col-md-6">
                                                <x-input name="address" error="address"
                                                         class="{{ $address_warning }}"
                                                         value="{{ old('address', $bp->address) }}"
                                                         label="Address" placeholder>
                                                    @if( $bp->tmp_address )
                                                        <small class="text-warning">{{ $bp->tmp_address }}</small>
                                                    @endif
                                                </x-input>
                                            </div>

                                            <!-- NID -->
                                            <div class="col-md-6">
                                                <x-input name="nid" error="nid" type="number"
                                                         class="{{ $nid_warning }}"
                                                         value="{{ old('nid', $bp->nid) }}"
                                                         label="NID" placeholder>
                                                    @if( $bp->tmp_nid )
                                                        <small class="text-warning">{{ $bp->tmp_nid }}</small>
                                                    @endif
                                                </x-input>
                                            </div>

                                            <!-- Bank Name -->
                                            <div class="col-md-6">
                                                <x-input name="bank_name" error="bank_name"
                                                         class="{{ $bank_name_warning }}"
                                                         value="{{ old('bank_name', $bp->bank_name) }}"
                                                         label="Bank Name" placeholder>
                                                    @if( $bp->tmp_bank_name )
                                                        <small class="text-warning">{{ $bp->tmp_bank_name }}</small>
                                                    @endif
                                                </x-input>
                                            </div>

                                            <!-- Brunch Name -->
                                            <div class="col-md-6">
                                                <x-input name="brunch_name" error="brunch_name"
                                                         class="{{ $brunch_name_warning }}"
                                                         value="{{ old('brunch_name', $bp->brunch_name) }}"
                                                         label="Brunch Name" placeholder>
                                                    @if( $bp->tmp_brunch_name )
                                                        <small class="text-warning">{{ $bp->tmp_brunch_name }}</small>
                                                    @endif
                                                </x-input>
                                            </div>

                                            <!-- Account Number -->
                                            <div class="col-md-6">
                                                <x-input name="account_number" error="account_number"
                                                         type="number" class="{{ $account_number_warning }}"
                                                         value="{{ old('account_number', $bp->account_number) }}"
                                                         label="Account Number" placeholder>
                                                    @if( $bp->tmp_account_number )
                                                        <small class="text-warning">{{ $bp->tmp_account_number }}</small>
                                                    @endif
                                                </x-input>
                                            </div>

                                            <!-- Salary -->
                                            <div class="col-md-6">
                                                <x-input name="salary" error="salary" type="number"
                                                         value="{{ old('salary', $bp->salary) }}"
                                                         label="Salary" placeholder readonly></x-input>
                                            </div>

                                            <!-- Date Of Birth -->
                                            <div class="col-md-6">
                                                <x-input name="dob" error="dob" type="date"
                                                         class="{{ $dob_warning }}"
                                                         value="{{ old('dob', !empty($bp->dob)?$bp->dob->toDateString():'') }}"
                                                         label="Date Of Birth" placeholder>
                                                    @if( $bp->tmp_dob )
                                                        <small class="text-warning">{{ \Carbon\Carbon::parse($bp->tmp_dob)->toFormattedDateString() }}</small>
                                                    @endif
                                                </x-input>
                                            </div>
                                        </div>

                                        @if( !$bp->status )
                                            <div class="form-footer">
                                                <x-button class="w-100 d-md-none">
                                                    <x-icon.save/>Save Changes
                                                </x-button>

                                                <x-button class="d-none d-md-block">
                                                    <x-icon.save/>Save Changes
                                                </x-button>
                                            </div>
                                        @endif
                                    </form>
                                </div>

                                <!-- Change Password -->
                                <div class="tab-pane" id="tabs-activity-16">
                                    <form action="{{ route('bp.change.password') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <!-- Current Password -->
                                            <livewire:bp.change-password/>

                                            <!-- New Password -->
                                            <div class="col-md-6">
                                                <x-input name="password"
                                                         label="New Password"
                                                         type="password"
                                                         error="password"
                                                         star="*" placeholder>
                                                </x-input>
                                            </div>

                                            <!-- Confirm Password -->
                                            <div class="col-md-6">
                                                <x-input name="password_confirmation"
                                                         label="Confirm Password"
                                                         type="password"
                                                         error="password_confirmation"
                                                         star="*" placeholder>
                                                </x-input>
                                            </div>
                                        </div>

                                        @if( !$bp->status )
                                            <div class="form-footer">
                                                <x-button class="w-100 d-md-none">
                                                    <x-icon.save/>Save Changes
                                                </x-button>

                                                <x-button class="d-none d-md-block">
                                                    <x-icon.save/>Save Changes
                                                </x-button>
                                            </div>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
