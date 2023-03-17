@extends('layouts.app')
@push('title') <title>Edit Role | {{ config('app.name') }}</title> @endpush

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
                        Role
                    </h2>
                </div>

                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">

                        <!-- All roles page [Full Button]-->
                        <a href="{{ route('role.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" /></svg>
                            All roles
                        </a>

                        <!-- All roles page [Icon Button]-->
                        <a href="{{ route('role.index') }}" class="btn btn-primary d-sm-none btn-icon">
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
                            <form action="{{ route('role.update', $role->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <!-- Name -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="name" id="name" type="text" class="form-control"
                                                   value="{{ $role->name }}"
                                                   placeholder="Enter Role Name">
                                            <label for="name" class="form-label">Role Name</label>
                                            @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <hr class="hr">

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <div class="form-label">Permissions</div>
                                            <div>
                                                @foreach( $permissions as $permission )
                                                    <label class="form-check form-check-inline">
                                                        <input name="permission[]"
                                                               value="{{ $permission->id }}"
                                                               class="form-check-input"
                                                               type="checkbox"
                                                               @if (count($role->permissions->where('id',$permission->id)))
                                                                   checked
                                                               @endif
                                                        >
                                                        <span class="form-check-label">{{ $permission->name }}</span>
                                                    </label>
                                                @endforeach
                                            </div>
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
