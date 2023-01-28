@extends('layouts.app')
@push('title') Edit Rso @endpush

@section('main-content')
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
                        Rso Information
                    </h2>
                </div>

                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">

                        <!-- [Full Button]-->
                        <a href="{{ route('rso.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" /></svg>
                            All Rsos
                        </a>

                        <!-- [Icon Button]-->
                        <a href="{{ route('rso.index') }}" class="btn btn-primary d-sm-none btn-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" /></svg>
                        </a>
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
                            <form action="{{ route('rso.update', $rso->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <!-- Rso Code -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="code" id="code" type="text" class="form-control"
                                                   value="{{ old('code', $rso->code) }}"
                                                   placeholder="Enter Rso Code">
                                            <label for="code" class="form-label">Rso Code
                                                <span class="text-danger">*</span></label>
                                            @error('code')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Itop Number -->
{{--                                    @can('Replace delete')--}}
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="itop_number" id="itop_number" type="text" class="form-control"
                                                   value="{{ old('itop_number', $rso->itop_number) }}"
                                                   placeholder="Enter Itop Number" aria-label="Itop Number">
                                            <label for="itop_number" class="form-label">Itop Number
                                                <span class="text-danger">*</span></label>
                                            @error('itop_number')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
{{--                                    @endcan--}}

                                    <!-- Pool Number -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="pool_number" id="pool_number" type="text" class="form-control"
                                                   value="{{ old('pool_number', $rso->pool_number) }}"
                                                   placeholder="Enter Pool Number" aria-label="Pool Number">
                                            <label for="pool_number" class="form-label">Pool Number
                                                <span class="text-danger">*</span></label>
                                            @error('pool_number')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Personal Number -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="personal_number" id="personal_number" type="text" class="form-control"
                                                   value="{{ old('personal_number', $rso->personal_number) }}"
                                                   placeholder="Enter Personal Number" aria-label="Personal Number">
                                            <label for="personal_number" class="form-label">Personal Number
                                                <span class="text-danger">*</span></label>
                                            @error('personal_number')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- RID -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="rid" id="rid" type="text" class="form-control"
                                                   value="{{ old('rid', $rso->rid) }}"
                                                   placeholder="Enter RID" aria-label="RID">
                                            <label for="rid" class="form-label">RID
                                                <span class="text-danger">*</span></label>
                                            @error('rid')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Father Name -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="father_name" id="father_name" type="text" class="form-control"
                                                   value="{{ old('father_name', $rso->father_name) }}"
                                                   placeholder="Enter Father Name" aria-label="Father Name">
                                            <label for="father_name" class="form-label">Father Name
                                                <span class="text-danger">*</span></label>
                                            @error('father_name')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Mother Name -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="mother_name" id="mother_name" type="text" class="form-control"
                                                   value="{{ old('mother_name', $rso->mother_name) }}"
                                                   placeholder="Enter Mother Name" aria-label="Mother Name">
                                            <label for="mother_name" class="form-label">Mother Name
                                                <span class="text-danger">*</span></label>
                                            @error('mother_name')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Division -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="division" id="division" type="text" class="form-control"
                                                   value="{{ old('division', $rso->division) }}"
                                                   placeholder="Enter Division" aria-label="Division">
                                            <label for="division" class="form-label">Division
                                                <span class="text-danger">*</span></label>
                                            @error('division')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- District -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="district" id="district" type="text" class="form-control"
                                                   value="{{ old('district', $rso->district) }}"
                                                   placeholder="Enter District" aria-label="District">
                                            <label for="district" class="form-label">District
                                                <span class="text-danger">*</span></label>
                                            @error('district')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Thana -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="thana" id="thana" type="text" class="form-control"
                                                   value="{{ old('thana', $rso->thana) }}"
                                                   placeholder="Enter Thana" aria-label="Thana">
                                            <label for="thana" class="form-label">Thana
                                                <span class="text-danger">*</span></label>
                                            @error('thana')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Address -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="address" id="address" type="text" class="form-control"
                                                   value="{{ old('address', $rso->address) }}"
                                                   placeholder="Enter Address" aria-label="Address">
                                            <label for="address" class="form-label">Address
                                                <span class="text-danger">*</span></label>
                                            @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Blood Group -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select name="blood_group" class="form-select" id="blood_group">
                                                <option value="a+">A+</option>
                                                <option value="a-">A-</option>
                                                <option value="b+">B+</option>
                                                <option value="b-">B-</option>
                                                <option value="ab+">AB+</option>
                                                <option value="ab-">AB-</option>
                                                <option value="o+">O+</option>
                                                <option value="o-">O-</option>
                                            </select>
                                            <label for="blood_group">Blood Group</label>
                                            @error('blood_group')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- SR No -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="sr_no" id="sr_no" type="text" class="form-control"
                                                   value="{{ old('sr_no', $rso->sr_no) }}"
                                                   placeholder="Enter SR No" aria-label="SR No">
                                            <label for="sr_no" class="form-label">SR No
                                                <span class="text-danger">*</span></label>
                                            @error('sr_no')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Account Number -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="account_number" id="account_number" type="text" class="form-control"
                                                   value="{{ old('account_number', $rso->account_number) }}"
                                                   placeholder="Enter Account Number" aria-label="Account Number">
                                            <label for="account_number" class="form-label">Account Number
                                                <span class="text-danger">*</span></label>
                                            @error('account_number')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Bank Name -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="bank_name" id="bank_name" type="text" class="form-control"
                                                   value="{{ old('bank_name', $rso->bank_name) }}"
                                                   placeholder="Enter Bank Name" aria-label="Bank Name">
                                            <label for="bank_name" class="form-label">Bank Name
                                                <span class="text-danger">*</span></label>
                                            @error('bank_name')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Routing Number -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="routing_number" id="routing_number" type="text" class="form-control"
                                                   value="{{ old('routing_number', $rso->routing_number) }}"
                                                   placeholder="Enter Routing Number" aria-label="Routing Number">
                                            <label for="routing_number" class="form-label">Routing Number
                                                <span class="text-danger">*</span></label>
                                            @error('routing_number')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Market Type -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="market_type" id="market_type" type="text" class="form-control"
                                                   value="{{ old('market_type', $rso->market_type) }}"
                                                   placeholder="Enter Market Type" aria-label="Market Type">
                                            <label for="market_type" class="form-label">Market Type
                                                <span class="text-danger">*</span></label>
                                            @error('market_type')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Salary -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="salary" id="salary" type="text" class="form-control"
                                                   value="{{ old('salary', $rso->salary) }}"
                                                   placeholder="Enter Salary" aria-label="Salary">
                                            <label for="salary" class="form-label">Salary
                                                <span class="text-danger">*</span></label>
                                            @error('salary')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Education -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="education" id="education" type="text" class="form-control"
                                                   value="{{ old('education', $rso->education) }}"
                                                   placeholder="Enter Education" aria-label="Education">
                                            <label for="education" class="form-label">Education
                                                <span class="text-danger">*</span></label>
                                            @error('education')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Marital Status -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select name="marital_status" class="form-select" id="marital_status">
                                                <option value="married">Married</option>
                                                <option value="unmarried">Unmarried</option>
                                            </select>
                                            <label for="marital_status">Marital Status</label>
                                            @error('marital_status')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Gender -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select name="gender" class="form-select" id="gender">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="others">Others</option>
                                            </select>
                                            <label for="gender">Gender</label>
                                            @error('gender')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Date Of Birth -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="dob" id="dob" type="date" class="form-control"
                                                   value="{{ old('dob', $rso->dob) }}"
                                                   placeholder="Enter Date Of Birth" aria-label="Date Of Birth">
                                            <label for="dob" class="form-label">Date Of Birth
                                                <span class="text-danger">*</span></label>
                                            @error('dob')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- NID -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="nid" id="nid" type="text" class="form-control"
                                                   value="{{ old('nid', $rso->nid) }}"
                                                   placeholder="Enter NID" aria-label="NID">
                                            <label for="nid" class="form-label">NID
                                                <span class="text-danger">*</span></label>
                                            @error('nid')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Date Of Joining -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="joining_date" id="joining_date" type="date" class="form-control"
                                                   value="{{ old('joining_date', $rso->joining_date) }}"
                                                   placeholder="Enter Date Of Joining" aria-label="Date Of Joining">
                                            <label for="joining_date" class="form-label">Date Of Joining
                                                <span class="text-danger">*</span></label>
                                            @error('joining_date')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Date Of Resign -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="resigning_date" id="resigning_date"
                                                   type="date" class="form-control"
                                                   value="{{ old('resigning_date', $rso->resigning_date) }}"
                                                   placeholder="Enter Date Of Resign" aria-label="Date Of Resign">
                                            <label for="resigning_date" class="form-label">Date Of Resign
                                                <span class="text-danger">*</span></label>
                                            @error('resigning_date')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Status -->
{{--                                    @can('Replace delete')--}}
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <select name="status" class="form-select" id="status">
                                                    <option {{ $rso->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                                    <option {{ $rso->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
                                                </select>
                                                <label for="status">Status</label>
                                                @error('status')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
{{--                                    @endcan--}}
                                </div>

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-reload" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M19.933 13.041a8 8 0 1 1 -9.925 -8.788c3.899 -1.002 7.935 1.007 9.425 4.747"></path><path d="M20 4v5h-5"></path></svg>
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
