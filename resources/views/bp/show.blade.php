@extends('layouts.app')
@push('title') Edit BP @endpush

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
                                                         label="Stuff ID" star="*" placeholder></x-input>
                                            </div>

                                            <!-- Pool Number -->
                                            <div class="col-md-6">
                                                <x-input name="pool_number"
                                                         value="{{ old('pool_number', $bp->pool_number) }}"
                                                         error="pool_number"
                                                         type="number"
                                                         label="Pool Number"
                                                         star="*" placeholder>
                                                </x-input>
                                            </div>

                                            <!-- Personal Number -->
                                            <div class="col-md-6">
                                                <x-input name="personal_number"
                                                         value="{{ old('personal_number', $bp->personal_number) }}"
                                                         error="personal_number"
                                                         type="number"
                                                         label="Personal Number"
                                                         star="*" placeholder>
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
                                                         value="{{ old('education', $bp->education) }}"
                                                         label="Education" placeholder></x-input>
                                            </div>

                                            <!-- Father Name -->
                                            <div class="col-md-6">
                                                <x-input name="father_name" error="father_name"
                                                         value="{{ old('father_name', $bp->father_name) }}"
                                                         label="Father Name" placeholder></x-input>
                                            </div>

                                            <!-- Mother Name -->
                                            <div class="col-md-6">
                                                <x-input name="mother_name" error="mother_name"
                                                         value="{{ old('mother_name', $bp->mother_name) }}"
                                                         label="Mother Name" placeholder></x-input>
                                            </div>

                                            <!-- Division -->
                                            <div class="col-md-6">
                                                <x-input name="division" error="division"
                                                         value="{{ old('division', $bp->division) }}"
                                                         label="Division" placeholder></x-input>
                                            </div>

                                            <!-- District -->
                                            <div class="col-md-6">
                                                <x-input name="district" error="district"
                                                         value="{{ old('district', $bp->district) }}"
                                                         label="District" placeholder></x-input>
                                            </div>

                                            <!-- Thana -->
                                            <div class="col-md-6">
                                                <x-input name="thana" error="thana"
                                                         value="{{ old('thana', $bp->thana) }}"
                                                         label="Thana" placeholder></x-input>
                                            </div>

                                            <!-- Address -->
                                            <div class="col-md-6">
                                                <x-input name="address" error="address"
                                                         value="{{ old('address', $bp->address) }}"
                                                         label="Address" placeholder></x-input>
                                            </div>

                                            <!-- NID -->
                                            <div class="col-md-6">
                                                <x-input name="nid" error="nid" type="number"
                                                         value="{{ old('nid', $bp->nid) }}"
                                                         label="NID" placeholder></x-input>
                                            </div>

                                            <!-- Bank Name -->
                                            <div class="col-md-6">
                                                <x-input name="bank_name" error="bank_name"
                                                         value="{{ old('bank_name', $bp->bank_name) }}"
                                                         label="Bank Name" placeholder></x-input>
                                            </div>

                                            <!-- Brunch Name -->
                                            <div class="col-md-6">
                                                <x-input name="brunch_name" error="brunch_name"
                                                         value="{{ old('brunch_name', $bp->brunch_name) }}"
                                                         label="Brunch Name" placeholder></x-input>
                                            </div>

                                            <!-- Account Number -->
                                            <div class="col-md-6">
                                                <x-input name="account_number" error="account_number" type="number"
                                                         value="{{ old('account_number', $bp->account_number) }}"
                                                         label="Account Number" placeholder></x-input>
                                            </div>

                                            <!-- Salary -->
                                            <div class="col-md-6">
                                                <x-input name="salary" error="salary" type="number"
                                                         value="{{ old('salary', $bp->salary) }}"
                                                         label="Salary" placeholder></x-input>
                                            </div>

                                            <!-- Date Of Birth -->
                                            <div class="col-md-6">
                                                <x-input name="dob" error="dob" type="date"
                                                         value="{{ old('dob', $bp->dob) }}"
                                                         label="Date Of Birth" placeholder></x-input>
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
