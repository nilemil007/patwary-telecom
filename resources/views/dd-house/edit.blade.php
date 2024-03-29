<x-main>

    <!-- Main Title -->
    <x-slot:title>Update House</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>Update</x-slot:page-pre-title>

    <!-- Page Title -->
    <x-slot:page-title>DD House</x-slot:page-title>

    <!-- Page title action button -->
    <x-slot:button>
        <x-link href="{{ route('dd-house.index') }}" class="btn btn-sm btn-primary">
            <x-icon.back></x-icon.back>All Houses
        </x-link>
    </x-slot:button>

    <x-slot:icon-button>
        <x-link href="{{ route('dd-house.index') }}" class="btn btn-primary btn-icon">
            <x-icon.back></x-icon.back>
        </x-link>
    </x-slot:icon-button>

    <!-- Page Body -->
    <div class="page-body">
        <div class="container-fluid">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <form action="{{ route('dd-house.update', $ddHouse->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Cluster Name -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input name="cluster_name" id="cluster_name" type="text" class="form-control"
                                           value="{{ $ddHouse->cluster_name }}"
                                           placeholder="Enter Cluster Name">
                                    <label for="cluster_name" class="form-label">Cluster Name</label>
                                    @error('cluster_name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Region -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input name="region" id="region" type="text" class="form-control"
                                           value="{{ $ddHouse->region }}"
                                           placeholder="Enter Region" aria-label="Region">
                                    <label for="region" class="form-label">Region</label>
                                    @error('region')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- DD Code -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input name="code" id="code" type="text" class="form-control"
                                           value="{{ $ddHouse->code }}"
                                           placeholder="Enter DD Code" aria-label="DD Code">
                                    <label for="code" class="form-label">DD Code
                                        <span class="text-danger">*</span>
                                    </label>
                                    @error('code')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- DD Name -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input name="name" id="name" type="text" class="form-control"
                                           value="{{ $ddHouse->name }}"
                                           placeholder="Enter DD Name" aria-label="DD Name">
                                    <label for="name" class="form-label">DD Name <span class="text-danger">*</span></label>
                                    @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Market Status -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input name="market_status" id="market_status" type="text" class="form-control"
                                           value="{{ $ddHouse->market_status }}"
                                           placeholder="Enter Market Status" aria-label="Market Status">
                                    <label for="market_status" class="form-label">Market Status</label>
                                    @error('market_status')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input name="email" id="email" type="text" class="form-control"
                                           value="{{ $ddHouse->email }}"
                                           placeholder="Enter Email" aria-label="Email">
                                    <label for="email" class="form-label">Email</label>
                                    @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- District -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input name="district" id="district" type="text" class="form-control"
                                           value="{{ $ddHouse->district }}"
                                           placeholder="Enter District" aria-label="District">
                                    <label for="district" class="form-label">District</label>
                                    @error('district')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input name="address" id="address" type="text" class="form-control"
                                           value="{{ $ddHouse->address }}"
                                           placeholder="Enter Address" aria-label="Address">
                                    <label for="address" class="form-label">Address</label>
                                    @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Proprietor Name -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input name="proprietor_name" id="proprietor_name"
                                           type="text" class="form-control"
                                           value="{{ $ddHouse->proprietor_name }}"
                                           placeholder="Enter Proprietor Name" aria-label="Proprietor Name">
                                    <label for="proprietor_name" class="form-label">Proprietor Name</label>
                                    @error('proprietor_name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Proprietor Number -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input name="proprietor_number" id="proprietor_number" type="text" class="form-control"
                                           value="{{ $ddHouse->proprietor_number }}"
                                           placeholder="Enter Proprietor Number" aria-label="Proprietor Number">
                                    <label for="proprietor_number" class="form-label">Proprietor Number</label>
                                    @error('proprietor_number')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Latitude -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input name="latitude" id="latitude" type="text" class="form-control"
                                           value="{{ $ddHouse->latitude }}"
                                           placeholder="Enter Latitude" aria-label="Latitude">
                                    <label for="latitude" class="form-label">Latitude</label>
                                    @error('latitude')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Longitude -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input name="longitude" id="longitude" type="text" class="form-control"
                                           value="{{ $ddHouse->longitude }}"
                                           placeholder="Enter Longitude" aria-label="Longitude">
                                    <label for="longitude" class="form-label">Longitude</label>
                                    @error('longitude')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- BTS Code -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input name="bts_code" id="bts_code" type="text" class="form-control"
                                           value="{{ $ddHouse->bts_code }}"
                                           placeholder="Enter BTS Code" aria-label="BTS Code">
                                    <label for="bts_code" class="form-label">BTS Code</label>
                                    @error('bts_code')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Established Year -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input name="established_year" id="established_year" type="text" class="form-control"
                                           value="{{ $ddHouse->established_year }}"
                                           placeholder="Enter Established Year" aria-label="Established Year">
                                    <label for="established_year" class="form-label">Established Year</label>
                                    @error('established_year')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="col-md-6">
                                <select class="form-select" name="status">
                                    <option {{ $ddHouse->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                    <option {{ $ddHouse->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
                                </select>
                            </div>

                        </div>

                        <div class="form-footer">
                            <x-button class="w-100 btn-sm d-md-none"><x-icon.reload></x-icon.reload>Update</x-button>
                            <x-button class="d-none btn-sm d-md-block"><x-icon.reload></x-icon.reload>Update</x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-main>
