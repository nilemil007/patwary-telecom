@extends('layouts.app')
@push('title') <title>Edit Route | {{ config('app.name') }}</title> @endpush

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
                        Route
                    </h2>
                </div>

                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">

                        <!-- [Full Button]-->
                        <a href="{{ route('route.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" /></svg>
                            Route List
                        </a>

                        <!-- [Icon Button]-->
                        <a href="{{ route('route.index') }}" class="btn btn-primary d-sm-none btn-icon">
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
                            <form action="{{ route('route.update', $route->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <!-- Route Code -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="code" id="code" type="text" class="form-control"
                                                   value="{{ old('code', $route->code) }}"
                                                   placeholder="Enter Route Code">
                                            <label for="code" class="form-label">Route Code
                                                <span class="text-danger">*</span></label>
                                            @error('code')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Route Name -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="name" id="name" type="text" class="form-control"
                                                   value="{{ old('name', $route->name) }}"
                                                   placeholder="Enter Route Name">
                                            <label for="name" class="form-label">Route Name
                                                <span class="text-danger">*</span></label>
                                            @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Description -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="description" id="description" type="text" class="form-control"
                                                   value="{{ old('description', $route->description) }}"
                                                   placeholder="Enter Description">
                                            <label for="description" class="form-label">Description
                                                <span class="text-danger">*</span></label>
                                            @error('description')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Week Day -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="weekdays" id="weekdays" type="text" class="form-control"
                                                   value="{{ old('weekdays', $route->weekdays) }}"
                                                   placeholder="Enter Week Day">
                                            <label for="weekdays" class="form-label">Week Day
                                                <span class="text-danger">*</span></label>
                                            @error('weekdays')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Length -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="length" id="length" type="text" class="form-control"
                                                   value="{{ old('length', $route->length) }}"
                                                   placeholder="Enter Length">
                                            <label for="length" class="form-label">Length
                                                <span class="text-danger">*</span></label>
                                            @error('length')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Status -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select name="status" class="form-select" id="status">
                                                <option {{ $route->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                                <option {{ $route->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
                                            </select>
                                            <label for="status">Status</label>
                                            @error('status')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
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
