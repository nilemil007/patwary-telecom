@extends('layouts.app')
@push('title') <title>Create New User | {{ config('app.name') }}</title> @endpush

@section('main-content')
    <div class="container-fluid">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Create
                    </div>
                    <h2 class="page-title">
                        New User
                    </h2>
                </div>

                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">

                        <!-- Create new entry [Full Button]-->
                        <a href="{{ route('create-new-user.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24"
                                 height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                            </svg>
                            All users
                        </a>

                        <!-- Create new entry [Icon Button]-->
                        <a href="{{ route('create-new-user.index') }}" class="btn btn-primary d-sm-none btn-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24"
                                 height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                            </svg>
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
                            <form action="{{ route('create-new-user.store') }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <!-- Name -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="name" id="name" type="text" class="form-control"
                                                   value="{{ old('name') }}"
                                                   placeholder="Enter Name">
                                            <label for="name" class="form-label">Name
                                                <span class="text-danger">*</span>
                                            </label>
                                            @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Username -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="username" id="username" type="text" class="form-control"
                                                   value="{{ old('username') }}"
                                                   placeholder="Enter Username">
                                            <label for="username" class="form-label">Username
                                                <span class="text-danger">*</span>
                                            </label>
                                            @error('username')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="email" id="email" type="text" class="form-control"
                                                   value="{{ old('email') }}"
                                                   placeholder="Enter Email" aria-label="Email">
                                            <label for="email" class="form-label">Email
                                                <span class="text-danger">*</span>
                                            </label>
                                            @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- DD House -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select name="dd_house_id" class="form-select" id="ddHouse">
                                                <option selected value="">Choose DD House</option>
                                                @if( isset( $houses ) )
                                                    @foreach( $houses as $house )
                                                        <option value="{{ $house->id }}">{{ $house->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <label for="ddHouse">DD House</label>
                                            @error('dd_house_id')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- User Roles -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select name="role" class="form-select" id="role">
                                                <option selected value="">Choose User Roles</option>
                                                @foreach( $roles as $role )
                                                    <option value="{{ $role->name }}">
                                                        {{ \Illuminate\Support\Str::upper( implode(' ',explode('-',$role->name)) ) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="role">User Roles</label>
                                            @error('role')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Password -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="password" id="password" type="password" class="form-control"
                                                   value="{{ old('password') }}"
                                                   placeholder="Enter Password" aria-label="Password">
                                            <label for="password" class="form-label">Password
                                                <span class="text-danger">*</span>
                                            </label>
                                            @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Upload Image -->
                                    <div class="col-md-6">
                                        <label class="form-label">Upload Image</label>
                                        <div class="input-group mb-3">
                                            <input name="image" type="file" class="form-control" id="inputGroupFile02">
                                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="icon icon-tabler icon-tabler-user-plus" width="24" height="24"
                                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                             stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="9" cy="7" r="4"></circle>
                                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                            <path d="M16 11h6m-3 -3v6"></path>
                                        </svg>
                                        Create
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
