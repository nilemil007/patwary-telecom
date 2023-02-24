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
                                    <div class="col-md-6 {{ $users->count() < 1 ? 'd-none' : '' }}">
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

                                    <!-- Rso Number -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Rso Number" name="rso_id" type="number" value="{{ old('rso_id', $retailer->rso->itop_number) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Service Point -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Service Point" name="service_point" value="{{ old('service_point', $retailer->service_point) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Owner Name -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Owner Name" name="owner_name" value="{{ old('owner_name', $retailer->owner_name) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Contact No -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Contact No" name="contact_no" type="number" value="{{ old('contact_no', $retailer->contact_no) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- District -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="District" name="district" value="{{ old('district', $retailer->district) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Thana -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Thana" name="thana" value="{{ old('thana', $retailer->thana) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Address -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Address" name="address" value="{{ old('address', $retailer->address) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- NID -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="NID" name="nid" type="number" value="{{ old('nid', $retailer->nid) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Trade License -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Trade License" name="trade_license_no" type="number" value="{{ old('trade_license_no', $retailer->trade_license_no) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Latitude -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Latitude" name="latitude" value="{{ old('latitude', $retailer->latitude) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Longitude -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Longitude" name="longitude" value="{{ old('longitude', $retailer->longitude) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Device Name -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Device Name" name="device_name" value="{{ old('device_name', $retailer->device_name) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Device Serial No -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Device Serial No" name="device" value="{{ old('device', $retailer->device) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Scanner Serial No -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Scanner Serial No" name="scanner" value="{{ old('scanner', $retailer->scanner) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Password -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Password (For SSO)" name="password" value="{{ old('password', $retailer->password) }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Others Operator -->
                                    <div class="col-md-12 my-3">
                                        <div class="form-label">Others Operator</div>
                                        <label class="form-check form-switch">
                                            <input name="others_operator[]" class="form-check-input" type="checkbox">
                                            <span class="form-check-label">Gp</span>
                                        </label>
                                        <label class="form-check form-switch">
                                            <input name="others_operator[]" class="form-check-input" type="checkbox">
                                            <span class="form-check-label">Robi</span>
                                        </label>
                                        <label class="form-check form-switch">
                                            <input name="others_operator[]" class="form-check-input" type="checkbox">
                                            <span class="form-check-label">Aritel</span>
                                        </label>
                                    </div>

                                    <hr>

                                    <!-- Enabled -->
                                    <div class="col-md-12 my-3">
                                        <label class="form-check form-switch">
                                            <input name="enabled" class="form-check-input" type="checkbox" {{ $retailer->enabled == 'Y' ? 'checked' : '' }}>
                                            <span class="form-check-label">Enabled</span>
                                        </label>
                                    </div>

                                    <!-- Sim Seller -->
                                    <div class="col-md-12 mb-3">
                                        <label class="form-check form-switch">
                                            <input name="sim_seller" class="form-check-input" type="checkbox" {{ $retailer->sim_seller == 'Y' ? 'checked' : '' }}>
                                            <span class="form-check-label">Sim Seller</span>
                                        </label>
                                    </div>

                                    <!-- Own Shop -->
                                    <div class="col-md-12 mb-3">
                                        <label class="form-check form-switch">
                                            <input name="own_shop" class="form-check-input" type="checkbox" {{ $retailer->own_shop == 'Y' ? 'checked' : '' }}>
                                            <span class="form-check-label">Own Shop</span>
                                        </label>
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
