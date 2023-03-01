<x-main>

    <!-- Main Title -->
    <x-slot:title>Create New User</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>Create</x-slot:page-pre-title>

    <!-- Page Title -->
    <x-slot:page-title>New User</x-slot:page-title>

    <!-- Page title action button -->
    <x-slot:button>
        <x-link href="{{ route('create-new-user.index') }}" class="btn btn-primary">
            <x-icon.back></x-icon.back>All users
        </x-link>
    </x-slot:button>

    <x-slot:icon-button>
        <x-link href="{{ route('create-new-user.index') }}" class="btn btn-primary btn-icon">
            <x-icon.back></x-icon.back>
        </x-link>
    </x-slot:icon-button>

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
                                            <x-select label="User Roles" name="role">
                                                <option selected value="">Choose User Roles</option>
                                                <option value="zm">ZM</option>
                                                <option value="manager">Manager</option>
                                                <option value="supervisor">Supervisor</option>
                                                <option value="rso">Rso</option>
                                                <option value="bp">Bp</option>
                                                <option value="merchandiser">Merchandiser</option>
                                                <option value="retailer">Retailer</option>
                                                <option value="accountant">Accountant</option>
                                            </x-select>
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
                                    <x-button class="w-100 d-md-none"><x-icon.save></x-icon.save>Create user</x-button>
                                    <x-button class="d-none d-md-block"><x-icon.save></x-icon.save>Create user</x-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main>
