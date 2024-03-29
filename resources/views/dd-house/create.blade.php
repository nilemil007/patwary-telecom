<x-main>

    <!-- Main Title -->
    <x-slot:title>Create New House</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>Create</x-slot:page-pre-title>

    <!-- Page Title -->
    <x-slot:page-title>New DD House</x-slot:page-title>

    <!-- Page title action button -->
    <x-slot:button>
        <x-link href="{{ route('dd-house.index') }}" class="btn btn-sm btn-primary">All Houses</x-link>
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
                    <form action="{{ route('dd-house.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Cluster Name -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input name="cluster_name" id="cluster_name" type="text" class="form-control"
                                           value="{{ old('cluster_name') }}"
                                           placeholder="Enter Cluster Name">
                                    <label for="cluster_name" class="form-label">Cluster Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    @error('cluster_name')
                                    <small class="text-danger font-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Region -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input name="region" id="region" type="text" class="form-control"
                                           value="{{ old('region') }}"
                                           placeholder="Enter Region" aria-label="Region">
                                    <label for="region" class="form-label">Region
                                        <span class="text-danger">*</span>
                                    </label>
                                    @error('region')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- DD Code -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input name="code" id="code" type="text" class="form-control"
                                           value="{{ old('code') }}"
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
                                           value="{{ old('name') }}"
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
                                           value="{{ old('market_status') }}"
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
                                           value="{{ old('email') }}"
                                           placeholder="Enter Email" aria-label="Email">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- District -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input name="district" id="district" type="text" class="form-control"
                                           value="{{ old('district') }}"
                                           placeholder="Enter District" aria-label="District">
                                    <label for="district" class="form-label">District <span class="text-danger">*</span></label>
                                    @error('district')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input name="address" id="address" type="text" class="form-control"
                                           value="{{ old('address') }}"
                                           placeholder="Enter Address" aria-label="Address">
                                    <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
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
                                           value="{{ old('proprietor_name') }}"
                                           placeholder="Enter Proprietor Name" aria-label="Proprietor Name">
                                    <label for="proprietor_name" class="form-label">Proprietor Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    @error('proprietor_name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Proprietor Number -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input name="proprietor_number" id="proprietor_number" type="text" class="form-control"
                                           value="{{ old('proprietor_number') }}"
                                           placeholder="Enter Proprietor Number" aria-label="Proprietor Number">
                                    <label for="proprietor_number" class="form-label">Proprietor Number <span class="text-danger">*</span></label>
                                    @error('proprietor_number')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Latitude -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input name="latitude" id="latitude" type="text" class="form-control"
                                           value="{{ old('latitude') }}"
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
                                           value="{{ old('longitude') }}"
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
                                           value="{{ old('bts_code') }}"
                                           placeholder="Enter BTS Code" aria-label="BTS Code">
                                    <label for="bts_code" class="form-label">BTS Code <span class="text-danger">*</span></label>
                                    @error('bts_code')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Established Year -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input name="established_year" id="established_year" type="text" class="form-control"
                                           value="{{ old('established_year') }}"
                                           placeholder="Enter Established Year" aria-label="Established Year">
                                    <label for="established_year" class="form-label">Established Year</label>
                                    @error('established_year')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-footer">
                            <button type="submit" class="btn btn-sm btn-primary w-100 d-md-none">
                                Create house
                            </button>
                            <button type="submit" class="btn btn-sm btn-primary d-none d-md-block">
                                Create house
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-main>
