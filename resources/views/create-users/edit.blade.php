<x-main>

    <!-- Main Title -->
    <x-slot:title>Update User</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>Update</x-slot:page-pre-title>

    <!-- Page Title -->
    <x-slot:page-title>
        User (<em>{{ $user->name }}</em>)
    </x-slot:page-title>

    <!-- Page title actions -->
    <x-slot:button>
        <!-- [Full Button]-->
        <x-link href="{{ route('create-new-user.index') }}" class="btn btn-primary d-none d-sm-inline-block">
            <x-icon.back/>All users
        </x-link>
    </x-slot:button>

    <x-slot:icon-button>
        <!-- [Icon Button]-->
        <x-link href="{{ route('create-new-user.index') }}" class="btn btn-primary d-sm-none btn-icon" >
            <x-icon.back></x-icon.back>
        </x-link>
    </x-slot:icon-button>

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
</x-main>
