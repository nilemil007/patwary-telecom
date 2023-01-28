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
                        BP (<em>{{ $bp->user->name }}</em>)
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
                            <li class="nav-item">
                                <a href="#general_info" class="nav-link active" data-bs-toggle="tab">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="5 12 3 12 12 3 21 12 19 12"></polyline><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path></svg>
                                    General
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#tabs-profile-16" class="nav-link" data-bs-toggle="tab"><!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="7" r="4"></circle><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path></svg>
                                    Profile</a>
                            </li>
                            <li class="nav-item">
                                <a href="#tabs-activity-16" class="nav-link" data-bs-toggle="tab"><!-- Download SVG icon from http://tabler-icons.io/i/activity -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 12h4l3 8l4 -16l3 8h4"></path></svg>
                                    Activity</a>
                            </li>
                        </ul>
                        <div class="card-body">
                            <div class="tab-content">

                                <div class="tab-pane show active" id="general_info">
                                    <form action="{{ route('bp.profile.update', $bp->id) }}"
                                          method="POST" class="row g-3" autocomplete="off"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <!-- Image -->
                                        <div class="col-12">
                                            <a href="#" onclick="event.preventDefault(); document.getElementById('image').click();"
                                               class="avatar avatar-upload rounded overflow-hidden">
                                                <img src="{{ asset( $bp->user->image ) }}" alt="BP Image">
                                            </a>
                                            <input type="file" id="image" name="image" accept="image/jpeg" hidden>
                                            @error('image')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

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
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary w-100 d-md-none">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="icon icon-tabler icon-tabler-device-floppy" width="24"
                                                     height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                     fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                                                    <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                    <path d="M14 4l0 4l-6 0l0 -4"></path>
                                                </svg>
                                                Save Changes
                                            </button>

                                            <button type="submit" class="btn btn-primary d-none d-md-block">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="icon icon-tabler icon-tabler-device-floppy" width="24"
                                                     height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                     fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                                                    <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                    <path d="M14 4l0 4l-6 0l0 -4"></path>
                                                </svg>
                                                Save Changes
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane" id="tabs-profile-16">
                                    <div>Fringilla egestas nunc quis tellus diam rhoncus ultricies tristique enim at diam, sem nunc amet, pellentesque id egestas velit sed</div>
                                </div>
                                <div class="tab-pane" id="tabs-activity-16">
                                    <div>Donec ac vitae diam amet vel leo egestas consequat rhoncus in luctus amet, facilisi sit mauris accumsan nibh habitant senectus</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
