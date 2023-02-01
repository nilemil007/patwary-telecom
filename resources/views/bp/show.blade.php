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
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                        @endforeach
                    @endif
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
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control"
                                                       value="{{ $bp->user->name }}"
                                                       placeholder="Name" disabled>
                                                <label class="form-label">Name</label>
                                            </div>
                                        </div>

                                        <!-- Username -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input name="username" id="username" type="text" class="form-control"
                                                       value="{{ old('username', $bp->user->username) }}"
                                                       placeholder="Username">
                                                <label for="username" class="form-label">Username
                                                    @error('username')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Email -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input name="email" id="email" type="email" class="form-control"
                                                       value="{{ old('email', $bp->user->email) }}"
                                                       placeholder="Email">
                                                <label for="email" class="form-label">Email
                                                    @error('email')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Role -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input id="role" type="text" class="form-control"
                                                       value="{{ old('role', strtoupper($bp->user->role)) }}"
                                                       placeholder="Role" disabled>
                                                <label for="role" class="form-label">Role
                                                    @error('role')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        @if( !$bp->status )
                                            <div class="form-footer">
                                                <button type="submit" class="btn btn-primary w-100 d-md-none">
                                                    <x-icon.save/>Save Changes
                                                </button>

                                                <button type="submit" class="btn btn-primary d-none d-md-block">
                                                    <x-icon.save/>Save Changes
                                                </button>
                                            </div>
                                        @endif
                                    </form>
                                </div>

                                <!-- Additional -->
                                <div class="tab-pane" id="additional">
                                    <form action="{{ route('bp.additional.update', $bp->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')

                                        <livewire:bp.profile.additional :bp="$bp"/>

                                        @if( !$bp->status )
                                            <div class="form-footer">
                                                <button type="submit" class="btn btn-primary w-100 d-md-none">
                                                    <x-icon.save/>Save Changes
                                                </button>

                                                <button type="submit" class="btn btn-primary d-none d-md-block">
                                                    <x-icon.save/>Save Changes
                                                </button>
                                            </div>
                                        @endif
                                    </form>
                                </div>

                                <!-- Change Password -->
                                <div class="tab-pane" id="tabs-activity-16">
                                    <form action="{{ route('bp.change.password') }}" method="POST">
                                        @csrf
                                        <livewire:bp.change-password/>

                                        @if( !$bp->status )
                                            <div class="form-footer">
                                                <button type="submit" class="btn btn-primary w-100 d-md-none">
                                                    <x-icon.save/>Save Changes
                                                </button>

                                                <button type="submit" class="btn btn-primary d-none d-md-block">
                                                    <x-icon.save/>Save Changes
                                                </button>
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
