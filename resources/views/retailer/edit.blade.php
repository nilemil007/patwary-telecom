<x-main>

    <!-- Main Title -->
    <x-slot:title>Edit Information</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>Edit</x-slot:page-pre-title>

    <!-- Page Title -->
    <x-slot:page-title>Information</x-slot:page-title>

    <!-- Page title actions -->
    <x-slot:button>
        <!-- [Full Button]-->
        <x-link href="{{ route('retailer.index') }}" class="btn btn-primary">
            <x-icon.back></x-icon.back>All Retailers
        </x-link>
    </x-slot:button>

    <x-slot:icon-button>
        <!-- [Icon Button]-->
        <x-link href="{{ route('retailer.index') }}" class="btn btn-primary btn-icon">
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
                            <form action="{{ route('retailer.update', $retailer->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <!-- User -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-select name="user_id" label="User" placeholder>
                                                @foreach( $users as $user )
                                                    <option {{ $user->id == $retailer->user_id ? 'selected' : '' }} value="{{ $user->id }}">
                                                        {{ $user->ddHouse->code }} - {{ $user->name }}
                                                    </option>
                                                @endforeach
                                            </x-select>
                                        </div>
                                    </div>

                                    <!-- Supervisor -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-select name="user_id" label="Supervisor" placeholder>
                                                @foreach( $supervisors as $supervisor )
                                                    <option {{ $supervisor->id == $retailer->supervisor_id ? 'selected' : '' }} value="{{ $supervisor->id }}">
                                                        {{ $supervisor->ddHouse->code }} - {{ $supervisor->user->name }}
                                                    </option>
                                                @endforeach
                                            </x-select>
                                        </div>
                                    </div>

                                    <!-- Retailer Code -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Retailer Code" name="retailer_code" value="{{ old('retailer_code', $retailer->retailer_code) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Retailer Name -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Retailer Name" name="retailer_name" value="{{ old('retailer_name', $retailer->retailer_name) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Retailer Type -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Retailer Type" name="retailer_type" value="{{ old('retailer_type', $retailer->retailer_type) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Enabled -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Enabled" name="enabled" value="{{ old('enabled', $retailer->enabled) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Rso Number -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Rso Number" name="rso_id" value="{{ old('rso_id', $retailer->rso->itop_number) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Rso Number -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Rso Number" name="rso_number" value="{{ old('rso_number', $retailer->rso->itop_number) }}" placeholder></x-input>
                                        </div>
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
