@extends('layouts.app')
@push('title') Update User @endpush

@section('main-content')
    <div class="container-fluid">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Update
                    </div>
                    <h2 class="page-title">
                        User
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
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
            @endif
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('create-new-user.update', $user->id) }}"
                                  method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <!-- Name -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="name" id="name" type="text" class="form-control"
                                                   value="{{ $user->name }}"
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
                                                   value="{{ $user->username }}"
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
                                                   value="{{ $user->email }}"
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
                                        <div class="form-floating">
                                            <select name="dd_house_id" class="form-select" id="ddHouse">
                                                <option selected value="">Choose DD House</option>
                                                @if( isset( $houses ) )
                                                    @foreach( $houses as $house )
                                                        <option {{ $user->dd_house_id == $house->id ? 'selected' : '' }}
                                                                value="{{ $house->id }}">
                                                            {{ $house->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <label for="ddHouse">DD House</label>
                                            @error('dd_house')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- User Roles -->
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <select name="role" class="form-select" id="role">
                                                <option selected value="">Choose User Roles</option>
                                                @foreach( $roles as $role )
                                                    <option {{ $user->role == $role->name ? 'selected' : '' }} value="{{ $role->name }}">
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
                                        @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Status -->
                                    <div class="col-md-6">
                                        <label class="form-label">Status</label>
                                        <select class="form-select" name="status">
                                            <option {{ $user->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                            <option {{ $user->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
                                        </select>
                                    </div>

                                    <!-- Image Preview -->
                                    <div class="col-md-12">
                                        @if( \Illuminate\Support\Facades\File::exists( public_path( $user->image ) ) )
                                            <img class="rounded-3" src="{{ asset($user->image) }}" alt="User Image" width="150">
                                        @else
                                            <img class="rounded-3" src="{{ asset('default_user_avatar.svg') }}" alt="User Image" width="150">
                                            <span class="text-muted"><em>No Image Found</em></span>
                                        @endif

                                    </div>

                                </div>

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="icon icon-tabler icon-tabler-rotate-clockwise" width="24" height="24"
                                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                             stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4.05 11a8 8 0 1 1 .5 4m-.5 5v-5h5"></path>
                                        </svg>
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
