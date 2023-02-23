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
            <x-icon.back></x-icon.back>All users
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
                                    <div class="col-md-6 mb-3">
                                        <div class="form-floating">
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
                                    <div class="col-md-6 mb-3">
                                        <div class="form-floating">
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
                                    <div class="col-md-6 mb-3">
                                        <div class="form-floating">
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
                                    <div class="col-md-6 mb-3">
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
{{--                                    <div class="col-md-6 mb-3">--}}
{{--                                        <div class="form-floating">--}}
{{--                                            <select name="role" class="form-select" id="role">--}}
{{--                                                <option selected value="">Choose User Roles</option>--}}
{{--                                                @foreach( $roles as $role )--}}
{{--                                                    <option {{ $user->role == $role->name ? 'selected' : '' }} value="{{ $role->name }}">--}}
{{--                                                        {{ \Illuminate\Support\Str::upper( implode(' ',explode('-',$role->name)) ) }}--}}
{{--                                                    </option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                            <label for="role">User Roles</label>--}}
{{--                                            @error('role')--}}
{{--                                            <small class="text-danger">{{ $message }}</small>--}}
{{--                                            @enderror--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    <!-- Password -->
                                    <div class="col-md-6 mb-3">
                                        <div class="form-floating">
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
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Upload Image</label>
                                        <div class="input-group">
                                            <input name="image" type="file" class="form-control" id="inputGroupFile02">
                                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                        </div>
                                        @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Status -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Status</label>
                                        <select class="form-select" name="status">
                                            <option {{ $user->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                            <option {{ $user->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
                                        </select>
                                    </div>

                                    <!-- Image Preview -->
                                    <div class="col-md-12  mb-3">
                                        @if( \Illuminate\Support\Facades\File::exists( public_path( $user->image ) ) )
                                            <img class="rounded-3" src="{{ asset($user->image) }}" alt="User Image" width="150">
                                        @else
                                            <img class="rounded-3" src="{{ asset('default_user_avatar.svg') }}" alt="User Image" width="150">
                                            <span class="text-muted"><em>No Image Found</em></span>
                                        @endif

                                    </div>

                                </div>

                                <div class="form-footer">
                                    <x-button class="w-100 d-md-none"><x-icon.reload></x-icon.reload>Update</x-button>
                                    <x-button class="d-none d-md-block"><x-icon.reload></x-icon.reload>Update</x-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main>
