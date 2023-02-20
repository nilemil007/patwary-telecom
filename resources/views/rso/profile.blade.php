@php
    $p_num_warning = !empty($rso->tmp_personal_number)?'bg-warning-lt':'';
    $father_name_warning = !empty($rso->tmp_father_name)?'bg-warning-lt':'';
    $mother_name_warning = !empty($rso->tmp_mother_name)?'bg-warning-lt':'';
    $address_warning = !empty($rso->tmp_address)?'bg-warning-lt':'';
    $blood_group_warning = !empty($rso->tmp_blood_group)?'bg-warning-lt':'';
    $account_number_warning = !empty($rso->tmp_account_number)?'bg-warning-lt':'';
    $bank_name_warning = !empty($rso->tmp_bank_name)?'bg-warning-lt':'';
    $routing_number_warning = !empty($rso->tmp_routing_number)?'bg-warning-lt':'';
    $edu_warning = !empty($rso->tmp_education)?'bg-warning-lt':'';
    $marital_warning = !empty($rso->tmp_marital_status)?'bg-warning-lt':'';
    $dob_warning = !empty($rso->tmp_dob)?'bg-warning-lt':'';
    $nid_warning = !empty($rso->tmp_nid)?'bg-warning-lt':'';
    $brunch_name_warning = !empty($rso->tmp_brunch_name)?'bg-warning-lt':'';
@endphp

<x-main>

    <!-- Main Title -->
    <x-slot:title>Profile</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>Edit/Update</x-slot:page-pre-title>

    <!-- Page Title -->
    <x-slot:page-title>
        Rso (<em>{{ $rso->user->name }}</em>) {!! $rso->status ? '-><span class="text-warning"> Approve Pending</span>':''!!}
    </x-slot:page-title>

    <!-- Page title actions -->
    <x-slot:button>
        <!-- [Full Button]-->
        <x-link href="{{ route('dashboard') }}" class="btn btn-primary d-none d-sm-inline-block">
            <x-icon.back></x-icon.back>Dashboard
        </x-link>
    </x-slot:button>

    <x-slot:icon-button>
        <!-- [Icon Button]-->
        <x-link href="{{ route('dashboard') }}" class="btn btn-primary d-sm-none btn-icon" >
            <x-icon.back></x-icon.back>
        </x-link>
    </x-slot:icon-button>

    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <ul class="nav nav-tabs nav-fill" data-bs-toggle="tabs">
                            <!-- General -->
                            <li class="nav-item">
                                <a href="#general_info" class="nav-link active" data-bs-toggle="tab">
                                    <x-icon.home></x-icon.home>General
                                </a>
                            </li>
                            <!-- Additional -->
                            <li class="nav-item">
                                <a href="#additional" class="nav-link" data-bs-toggle="tab">
                                    <x-icon.circle-plus></x-icon.circle-plus>Additional
                                </a>
                            </li>
                            <!-- Change Password -->
                            <li class="nav-item">
                                <a href="#tabs-activity-16" class="nav-link" data-bs-toggle="tab">
                                    <x-icon.key></x-icon.key>Change Password
                                </a>
                            </li>
                        </ul>
                        <div class="card-body">
                            <div class="tab-content">
                                <!-- General -->
                                <div class="tab-pane show active" id="general_info">
                                    <form action="{{ route('rso.profile.update', $rso->id) }}"
                                          method="POST" class="row g-3" autocomplete="off"
                                          enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')

                                    <!-- Image -->
                                        <livewire:rso.profile.picture :rso="$rso"/>

                                        <!-- Name -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input label="Name" value="{{ $rso->user->name }}" disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- Username -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="username" label="Username" value="{{ old('username', $rso->user->username) }}" placeholder></x-input>
                                            </div>
                                        </div>

                                        <!-- Email -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="email" type="email" label="Email" value="{{ old('email', $rso->user->email) }}" placeholder></x-input>
                                            </div>
                                        </div>

                                        <!-- Role -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input label="Role" value="{{ strtoupper( $rso->user->role ) }}" disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        @if( !$rso->status )
                                            <div class="form-footer">
                                                <x-button class="w-100 d-md-none">
                                                    <x-icon.save></x-icon.save>Save Changes
                                                </x-button>

                                                <x-button class="d-none d-md-block">
                                                    <x-icon.save></x-icon.save>Save Changes
                                                </x-button>
                                            </div>
                                        @endif
                                    </form>
                                </div>

                                <!-- Additional -->
                                <div class="tab-pane" id="additional">
                                    <form action="{{ route('rso.additional.info.update', $rso->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')

                                        <div class="row">
                                            <!-- Supervisor -->
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <x-input value="{{ $rso->supervisor->user->name }} - {{ $rso->supervisor->pool_number }}" label="Supervisor" placeholder disabled></x-input>
                                                </div>
                                            </div>

                                            <!-- Code -->
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <x-input name="code" value="{{ $rso->code }}" label="Code" star="*" placeholder disabled></x-input>
                                                </div>
                                            </div>

                                            <!-- Itop Number -->
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <x-input name="itop_number" value="{{ $rso->itop_number }}" type="number" label="Itop Number" star="*" placeholder disabled></x-input>
                                                </div>
                                            </div>

                                            <!-- Pool Number -->
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <x-input name="pool_number" value="{{ $rso->pool_number }}" type="number" label="Pool Number" star="*" placeholder disabled></x-input>
                                                </div>
                                            </div>

                                            <!-- Personal Number -->
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <x-input name="personal_number" value="{{ old('personal_number', $rso->personal_number) }}" class="{{ $p_num_warning }}" type="number" label="Personal Number" star="*" placeholder>
                                                        @if( $rso->tmp_personal_number )
                                                            <small class="text-warning">New: {{ $rso->tmp_personal_number }}</small>
                                                        @endif
                                                    </x-input>
                                                </div>
                                            </div>

                                            <!-- RID -->
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <x-input name="rid" value="{{ $rso->rid }}" label="RID" star="*" placeholder disabled></x-input>
                                                </div>
                                            </div>

                                            <!-- Father Name -->
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <x-input name="father_name" class="{{ $father_name_warning }}" value="{{ old('father_name', $rso->father_name) }}" label="Father Name" placeholder>
                                                        @if( $rso->tmp_father_name )
                                                            <small class="text-warning">New: {{ $rso->tmp_father_name }}</small>
                                                        @endif
                                                    </x-input>
                                                </div>
                                            </div>

                                            <!-- Mother Name -->
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <x-input name="mother_name" class="{{ $mother_name_warning }}" value="{{ old('mother_name', $rso->mother_name) }}" label="Mother Name" placeholder>
                                                        @if( $rso->tmp_mother_name )
                                                            <small class="text-warning">New: {{ $rso->tmp_mother_name }}</small>
                                                        @endif
                                                    </x-input>
                                                </div>
                                            </div>

                                            <!-- Division -->
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <x-input name="division" value="{{ $rso->division }}" label="Division" placeholder disabled></x-input>
                                                </div>
                                            </div>

                                            <!-- District -->
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <x-input name="district" value="{{ $rso->district }}" label="District" placeholder disabled></x-input>
                                                </div>
                                            </div>

                                            <!-- Thana -->
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <x-input name="thana" value="{{ $rso->thana }}" label="Thana" placeholder disabled></x-input>
                                                </div>
                                            </div>

                                            <!-- Address -->
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <x-input name="address" class="{{ $address_warning }}" value="{{ old('address', $rso->address) }}" label="Address" placeholder>
                                                        @if( $rso->tmp_address )
                                                            <small class="text-warning">New: {{ $rso->tmp_address }}</small>
                                                        @endif
                                                    </x-input>
                                                </div>
                                            </div>

                                            <!-- Blood Group -->
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <x-select name="blood_group" proposed="{{ !empty($rso->tmp_blood_group)? 'New: '.strtoupper($rso->tmp_blood_group):'' }}" class="{{ $blood_group_warning }}" label="Blood Group" placeholder>
                                                        <option {{ $rso->blood_group == 'a+'?'selected':'' }} value="a+">{{ __('A+') }}</option>
                                                        <option {{ $rso->blood_group == 'a-'?'selected':'' }} value="a-">{{ __('A-') }}</option>
                                                        <option {{ $rso->blood_group == 'b+'?'selected':'' }} value="b+">{{ __('B+') }}</option>
                                                        <option {{ $rso->blood_group == 'b-'?'selected':'' }} value="b-">{{ __('B-') }}</option>
                                                        <option {{ $rso->blood_group == 'ab+'?'selected':'' }} value="ab+">{{ __('AB+') }}</option>
                                                        <option {{ $rso->blood_group == 'ab-'?'selected':'' }} value="ab-">{{ __('AB-') }}</option>
                                                        <option {{ $rso->blood_group == 'o+'?'selected':'' }} value="o+">{{ __('O+') }}</option>
                                                        <option {{ $rso->blood_group == 'o-'?'selected':'' }} value="o-">{{ __('O-') }}</option>
                                                    </x-select>
                                                </div>
                                            </div>

                                            <!-- Sr No -->
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <x-input name="sr_no" value="{{ $rso->sr_no }}" label="Sr No" placeholder disabled></x-input>
                                                </div>
                                            </div>

                                            <!-- Account Number -->
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <x-input name="account_number" type="number" class="{{ $account_number_warning }}" value="{{ old('account_number', $rso->account_number) }}" label="Account Number" placeholder>
                                                        @if( $rso->tmp_account_number )
                                                            <small class="text-warning">New: {{ $rso->tmp_account_number }}</small>
                                                        @endif
                                                    </x-input>
                                                </div>
                                            </div>

                                            <!-- Bank Name -->
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <x-input name="bank_name" class="{{ $bank_name_warning }}" value="{{ old('bank_name', $rso->bank_name) }}" label="Bank Name" placeholder>
                                                        @if( $rso->tmp_bank_name )
                                                            <small class="text-warning">New: {{ $rso->tmp_bank_name }}</small>
                                                        @endif
                                                    </x-input>
                                                </div>
                                            </div>

                                            <!-- Brunch Name -->
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <x-input name="brunch_name" class="{{ $brunch_name_warning }}" value="{{ old('brunch_name', $rso->brunch_name) }}" label="Brunch Name" placeholder>
                                                        @if( $rso->tmp_brunch_name )
                                                            <small class="text-warning">New: {{ $rso->tmp_brunch_name }}</small>
                                                        @endif
                                                    </x-input>
                                                </div>
                                            </div>

                                            <!-- Routing Number -->
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <x-input name="routing_number" type="number" class="{{ $routing_number_warning }}" value="{{ old('routing_number', $rso->routing_number) }}" label="Routing Number" placeholder>
                                                        @if( $rso->tmp_routing_number )
                                                            <small class="text-warning">New: {{ $rso->tmp_routing_number }}</small>
                                                        @endif
                                                    </x-input>
                                                </div>
                                            </div>

                                            <!-- Market Type -->
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <x-input name="market_type" value="{{ $rso->market_type }}" label="Market Type" placeholder disabled></x-input>
                                                </div>
                                            </div>

                                            <!-- Salary -->
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <x-input name="salary" type="number" value="{{ $rso->salary }}" label="Salary" placeholder disabled></x-input>
                                                </div>
                                            </div>

                                            <!-- Education -->
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <x-input name="education" class="{{ $edu_warning }}" value="{{ old('education', strtoupper($rso->education)) }}" label="Education" placeholder>
                                                        @if( $rso->tmp_education )
                                                            <small class="text-warning">New: {{ $rso->tmp_education }}</small>
                                                        @endif
                                                    </x-input>
                                                </div>
                                            </div>

                                            <!-- Marital Status -->
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <x-input name="marital_status" class="{{ $marital_warning }}" value="{{ old('marital_status', $rso->marital_status) }}" label="Marital Status" placeholder>
                                                        @if( $rso->tmp_marital_status )
                                                            <small class="text-warning">New: {{ $rso->tmp_marital_status }}</small>
                                                        @endif
                                                    </x-input>
                                                </div>
                                            </div>

                                            <!-- Gender -->
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <x-select name="gender" label="Gender" placeholder disabled>
                                                        <option {{ $rso->gender == 'male' ?'selected':'' }} value="male">{{ __('Male') }}</option>
                                                        <option {{ $rso->gender == 'female' ?'selected':'' }} value="female">{{ __('Female') }}</option>
                                                        <option {{ $rso->gender == 'others' ?'selected':'' }} value="others">{{ __('Others') }}</option>
                                                    </x-select>
                                                </div>
                                            </div>

                                            <!-- Date Of Birth -->
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <x-input name="dob" type="date" class="{{ $dob_warning }}" value="{{ old('dob', !empty($rso->dob)?$rso->dob->toDateString():'') }}" label="Date Of Birth" placeholder>
                                                        @if( $rso->tmp_dob )
                                                            <small class="text-warning">New: {{ \Carbon\Carbon::parse($rso->tmp_dob)->toFormattedDateString() }}</small>
                                                        @endif
                                                    </x-input>
                                                </div>
                                            </div>

                                            <!-- NID -->
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <x-input name="nid" type="number" class="{{ $nid_warning }}" value="{{ old('nid', $rso->nid) }}" label="NID" placeholder>
                                                        @if( $rso->tmp_nid )
                                                            <small class="text-warning">{{ $rso->tmp_nid }}</small>
                                                        @endif
                                                    </x-input>
                                                </div>
                                            </div>

                                            <!-- Routes -->
                                            <div class="col-md-12">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Routes</label>
                                                    <div>
                                                        @foreach($rso->routes ?? [] as $route)
                                                        <label class="form-check">
                                                            <input class="form-check-input" type="checkbox" checked disabled>
                                                            <span class="form-check-label">{{ \App\Models\Route::firstWhere('id', $route)->code.' - '.\App\Models\Route::firstWhere('id', $route)->name }}</span>
                                                        </label>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if( !$rso->status )
                                            <div class="form-footer">
                                                <x-button class="w-100 d-md-none">
                                                    <x-icon.save></x-icon.save>Save Changes
                                                </x-button>

                                                <x-button class="d-none d-md-block">
                                                    <x-icon.save></x-icon.save>Save Changes
                                                </x-button>
                                            </div>
                                        @endif
                                    </form>
                                </div>

                                <!-- Change Password -->
                                <div class="tab-pane" id="tabs-activity-16">
                                    <form action="{{ route('rso.change.password') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <!-- Current Password -->
                                            <livewire:rso.change-password/>

                                            <!-- New Password -->
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <x-input name="password" label="New Password" type="password" star="*" placeholder></x-input>
                                                </div>
                                            </div>

                                            <!-- Confirm Password -->
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <x-input name="password_confirmation" label="Confirm Password" type="password" star="*" placeholder></x-input>
                                                </div>
                                            </div>

                                            @if( !$rso->status )
                                                <div class="form-footer">
                                                    <x-button class="w-100 d-md-none">
                                                        <x-icon.save></x-icon.save>Save Changes
                                                    </x-button>

                                                    <x-button class="d-none d-md-block">
                                                        <x-icon.save></x-icon.save>Save Changes
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
</x-main>
