@extends('layouts.app')
@push('title') <title>Edit Supervisor | {{ config('app.name') }}</title> @endpush

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
                        Supervisor Information
                    </h2>
                </div>

                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">

                        <!-- [Full Button]-->
                        <a href="{{ route('supervisor.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" /></svg>
                            All Supervisors
                        </a>

                        <!-- Create new entry [Icon Button]-->
                        <a href="{{ route('supervisor.index') }}" class="btn btn-primary d-sm-none btn-icon">
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
                            <form action="{{ route('supervisor.update', $supervisor->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <!-- Pool Number -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="pool_number" id="pool_number" type="number" class="form-control"
                                                   value="{{ old('pool_number', $supervisor->pool_number) }}"
                                                   placeholder="Enter Pool Number">
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
                                            <input name="personal_number" id="personal_number" type="number" class="form-control"
                                                   value="{{ old('personal_number', $supervisor->personal_number) }}"
                                                   placeholder="Enter Personal Number">
                                            <label for="personal_number" class="form-label">Personal Number
                                                <span class="text-danger">*</span></label>
                                            @error('personal_number')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Father Name -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="father_name" id="father_name" type="text" class="form-control"
                                                   value="{{ old('father_name', $supervisor->father_name) }}"
                                                   placeholder="Enter Father Name">
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
                                                   value="{{ old('mother_name', $supervisor->mother_name) }}"
                                                   placeholder="Enter Mother Name">
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
                                                   value="{{ old('division', $supervisor->division) }}"
                                                   placeholder="Enter Division">
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
                                                   value="{{ old('district', $supervisor->district) }}"
                                                   placeholder="Enter District">
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
                                                   value="{{ old('thana', $supervisor->thana) }}"
                                                   placeholder="Enter Thana">
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
                                                   value="{{ old('address', $supervisor->address) }}"
                                                   placeholder="Enter Address">
                                            <label for="address" class="form-label">Address
                                                <span class="text-danger">*</span></label>
                                            @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- NID -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="nid" id="nid" type="number" class="form-control"
                                                   value="{{ old('nid', $supervisor->nid) }}"
                                                   placeholder="Enter NID">
                                            <label for="nid" class="form-label">NID
                                                <span class="text-danger">*</span></label>
                                            @error('nid')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Date Of Birth -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="dob" id="dob" type="date" class="form-control"
                                                   value="{{ old('dob', !empty($supervisor->dob)? $supervisor->dob->toDateString():'') }}"
                                                   placeholder="Enter Date Of Birth">
                                            <label for="dob" class="form-label">Date Of Birth
                                                <span class="text-danger">*</span></label>
                                            @error('dob')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Joining Date -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="joining_date" id="joining_date" type="date" class="form-control"
                                                   value="{{ old('joining_date', !empty($supervisor->joining_date)?$supervisor->joining_date->toDateString():'') }}"
                                                   placeholder="Enter Joining Date">
                                            <label for="joining_date" class="form-label">Joining Date
                                                <span class="text-danger">*</span></label>
                                            @error('joining_date')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Resign Date -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="resigning_date" id="resigning_date" type="date" class="form-control"
                                                   value="{{ old('resigning_date', !empty($supervisor->resigning_date)? $supervisor->resigning_date->toDateString():'') }}"
                                                   placeholder="Enter Resign Date">
                                            <label for="resigning_date" class="form-label">Resign Date
                                                <span class="text-danger">*</span></label>
                                            @error('resigning_date')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-primary w-100 d-md-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-reload" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M19.933 13.041a8 8 0 1 1 -9.925 -8.788c3.899 -1.002 7.935 1.007 9.425 4.747"></path><path d="M20 4v5h-5"></path></svg>
                                        Update
                                    </button>

                                    <button type="submit" class="btn btn-primary d-none d-md-block">
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
