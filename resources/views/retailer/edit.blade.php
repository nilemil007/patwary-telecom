@php
    $disabled = auth()->user()->role == 'rso' ? 'disabled' : '';
    $retailer_name = !empty($retailer->tmp_retailer_name)?'bg-warning-lt':'';
    $retailer_type = !empty($retailer->tmp_retailer_type)?'bg-warning-lt':'';
    $owner_name = !empty($retailer->tmp_owner_name)?'bg-warning-lt':'';
    $contact_no = !empty($retailer->tmp_contact_no)?'bg-warning-lt':'';
    $address = !empty($retailer->tmp_address)?'bg-warning-lt':'';
    $trade_license_no = !empty($retailer->tmp_trade_license_no)?'bg-warning-lt':'';
    $latitude = !empty($retailer->tmp_latitude)?'bg-warning-lt':'';
    $longitude = !empty($retailer->tmp_longitude)?'bg-warning-lt':'';
    $device_name = !empty($retailer->tmp_device_name)?'bg-warning-lt':'';
    $device = !empty($retailer->tmp_device)?'bg-warning-lt':'';
    $scanner = !empty($retailer->tmp_scanner)?'bg-warning-lt':'';
@endphp

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
            <form action="{{ route('retailer.update', $retailer->id) }}" method="POST">
                <div class="card mb-3 {{ $users->count() < 1 ? 'd-none' : '' }}">
                    <div class="card-body">
                        <div class="row">
                            <!-- Assign User -->
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
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <!-- Assigned User -->
                            <div class="col-md-6 {{ $users->count() < 1 ? 'd-none' : '' }}">
                                <div class="form-floating mb-3">
                                    <x-input label="Assigned User" value="{{ $retailer->user->name ?? '' }}" placeholder disabled></x-input>
                                </div>
                            </div>

                            <!-- DD House -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <x-select name="dd_house_id" star="*" label="DD House" placeholder required disabled="{{ $disabled }}">
                                        @foreach( $houses as $house )
                                            <option {{ $house->id == $retailer->dd_house_id ? 'selected' : '' }} value="{{ $house->code }}">
                                                {{ $house->code.'-'.$house->name }}
                                            </option>
                                        @endforeach
                                    </x-select>
                                </div>
                            </div>

                            <!-- Supervisor -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <x-select name="supervisor_id" star="*" label="Supervisor" placeholder required disabled="{{ $disabled }}">
                                        @foreach( $supervisors as $supervisor )
                                            <option title="{{ $supervisor->ddHouse->code }}" {{ $supervisor->id == $retailer->supervisor_id ? 'selected' : '' }} value="{{ $supervisor->pool_number }}">
                                                {{ $supervisor->pool_number }} - {{ $supervisor->user->name }}
                                            </option>
                                        @endforeach
                                    </x-select>
                                </div>
                            </div>

                            <!-- Rso -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <x-select name="rso_id" label="Rso" star="*" placeholder required disabled="{{ $disabled }}">
                                        @foreach( $rsos as $rso )
                                            <option title="{{ $rso->ddHouse->code }}" {{ $rso->id == $retailer->rso_id ? 'selected' : '' }} value="{{ $rso->itop_number }}">
                                                {{ $rso->itop_number }} - {{ $rso->user->name }}
                                            </option>
                                        @endforeach
                                    </x-select>
                                </div>
                            </div>

                            <!-- Retailer Code -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <x-input label="Retailer Code" star="*" name="retailer_code" value="{{ old('retailer_code', $retailer->retailer_code) }}" placeholder required disabled="{{ $disabled }}"></x-input>
                                </div>
                            </div>

                            <!-- Retailer Name -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <x-input label="Retailer Name" class="{{ $retailer_name }}" star="*" name="retailer_name" value="{{ old('retailer_name', $retailer->retailer_name) }}" placeholder required>
                                        @if( $retailer->tmp_retailer_name )
                                            <small class="text-warning">New: {{ $retailer->tmp_retailer_name }}</small>
                                        @endif
                                    </x-input>
                                </div>
                            </div>

                            <!-- Retailer Type -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <x-input label="Retailer Type" class="{{ $retailer_type }}" star="*" name="retailer_type" value="{{ old('retailer_type', $retailer->retailer_type) }}" placeholder required>
                                        @if( $retailer->tmp_retailer_type )
                                            <small class="text-warning">New: {{ $retailer->tmp_retailer_type }}</small>
                                        @endif
                                    </x-input>
                                </div>
                            </div>

                            <!-- Service Point -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <x-input label="Service Point" star="*" name="service_point" value="{{ old('service_point', $retailer->service_point) }}" placeholder required disabled="{{ $disabled }}"></x-input>
                                </div>
                            </div>

                            <!-- Owner Name -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <x-input label="Owner Name" class="{{ $owner_name }}" star="*" name="owner_name" value="{{ old('owner_name', $retailer->owner_name) }}" placeholder required>
                                        @if( $retailer->tmp_owner_name )
                                            <small class="text-warning">New: {{ $retailer->tmp_owner_name }}</small>
                                        @endif
                                    </x-input>
                                </div>
                            </div>

                            <!-- Contact No -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <x-input label="Contact No" class="{{ $contact_no }}" star="*" name="contact_no" type="number" value="{{ old('contact_no', $retailer->contact_no) }}" placeholder required>
                                        @if( $retailer->tmp_contact_no )
                                            <small class="text-warning">New: {{ $retailer->tmp_contact_no }}</small>
                                        @endif
                                    </x-input>
                                </div>
                            </div>

                            <!-- District -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <x-input label="District" star="*" name="district" value="{{ old('district', $retailer->district) }}" placeholder required disabled="{{ $disabled }}"></x-input>
                                </div>
                            </div>

                            <!-- Thana -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <x-input label="Thana" star="*" name="thana" value="{{ old('thana', $retailer->thana) }}" placeholder required disabled="{{ $disabled }}"></x-input>
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <x-input label="Address" class="{{ $address }}" star="*" name="address" value="{{ old('address', $retailer->address) }}" placeholder required>
                                        @if( $retailer->tmp_address )
                                            <small class="text-warning">New: {{ $retailer->tmp_address }}</small>
                                        @endif
                                    </x-input>
                                </div>
                            </div>

                            <!-- NID -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <x-input label="NID" name="nid" star="*" type="number" value="{{ old('nid', $retailer->nid) }}" placeholder required>
                                        @if( $retailer->tmp_nid )
                                            <small class="text-warning">New: {{ $retailer->tmp_nid }}</small>
                                        @endif
                                    </x-input>
                                </div>
                            </div>

                            <!-- Trade License -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <x-input label="Trade License" class="{{ $trade_license_no }}" name="trade_license_no" type="number" value="{{ old('trade_license_no', $retailer->trade_license_no) }}" placeholder>
                                        @if( $retailer->tmp_trade_license_no )
                                            <small class="text-warning">New: {{ $retailer->tmp_trade_license_no }}</small>
                                        @endif
                                    </x-input>
                                </div>
                            </div>

                            <!-- Latitude -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <x-input label="Latitude" class="{{ $latitude }}" name="latitude" value="{{ old('latitude', $retailer->latitude) }}" placeholder>
                                        @if( $retailer->tmp_latitude )
                                            <small class="text-warning">New: {{ $retailer->tmp_latitude }}</small>
                                        @endif
                                    </x-input>
                                </div>
                            </div>

                            <!-- Longitude -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <x-input label="Longitude" class="{{ $longitude }}" name="longitude" value="{{ old('longitude', $retailer->longitude) }}" placeholder>
                                        @if( $retailer->tmp_longitude )
                                            <small class="text-warning">New: {{ $retailer->tmp_longitude }}</small>
                                        @endif
                                    </x-input>
                                </div>
                            </div>

                            <!-- Device Name -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <x-input label="Device Name" class="{{ $device_name }}" name="device_name" value="{{ old('device_name', $retailer->device_name) }}" placeholder>
                                        @if( $retailer->tmp_device_name )
                                            <small class="text-warning">New: {{ $retailer->tmp_device_name }}</small>
                                        @endif
                                    </x-input>
                                </div>
                            </div>

                            <!-- Device Serial No -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <x-input label="Device Serial No" class="{{ $device }}" name="device" value="{{ old('device', $retailer->device) }}" placeholder>
                                        @if( $retailer->tmp_device )
                                            <small class="text-warning">New: {{ $retailer->tmp_device }}</small>
                                        @endif
                                    </x-input>
                                </div>
                            </div>

                            <!-- Scanner Serial No -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <x-input label="Scanner Serial No" class="{{ $scanner }}" name="scanner" value="{{ old('scanner', $retailer->scanner) }}" placeholder>
                                        @if( $retailer->tmp_scanner )
                                            <small class="text-warning">New: {{ $retailer->tmp_scanner }}</small>
                                        @endif
                                    </x-input>
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="col-md-6 {{ $retailer->sim_seller=='N'?'d-none':'' }}">
                                <div class="form-floating mb-3">
                                    <x-input label="Password (For SSO)" name="password" value="{{ old('password', $retailer->password) }}" placeholder></x-input>
                                </div>
                            </div>

                            <!-- Others Operator -->
                            <div class="col-md-12 my-3">
                                <div class="form-label">Others Operator</div>
                                <label class="form-check form-switch">
                                    <input name="others_operator[]" class="form-check-input" type="checkbox" value="Gp" {{ in_array('Gp', $retailer->others_operator ?? []) ? 'checked' : '' }}>
                                    <span class="form-check-label">Gp</span>
                                </label>
                                <label class="form-check form-switch">
                                    <input name="others_operator[]" value="Robi" class="form-check-input" type="checkbox" {{ in_array('Robi', $retailer->others_operator ?? []) ? 'checked' : '' }}>
                                    <span class="form-check-label">Robi</span>
                                </label>
                                <label class="form-check form-switch">
                                    <input name="others_operator[]" value="Aritel" class="form-check-input" type="checkbox" {{ in_array('Aritel', $retailer->others_operator ?? []) ? 'checked' : '' }}>
                                    <span class="form-check-label">Aritel</span>
                                </label>
                            </div>

                            <hr>

                            <!-- Enabled -->
                            <div class="col-md-12 my-3">
                                <label class="form-check form-switch">
                                    <input name="enabled" class="form-check-input" type="checkbox" {{ $retailer->enabled == 'Y' ? 'checked' : '' }} disabled="{{ $disabled }}">
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

                        @if( !$retailer->status )
                            <div class="form-footer">
                                <x-button class="w-100 d-md-none"><x-icon.reload></x-icon.reload>Update</x-button>
                                <x-button class="d-none d-md-block"><x-icon.reload></x-icon.reload>Update</x-button>
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-main>
