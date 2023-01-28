@extends('layouts.app')
@push('title') Create New Retailer @endpush

@section('main-content')
    <div class="container-fluid">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Create
                    </div>
                    <h2 class="page-title">
                        New Retailer
                    </h2>
                </div>

                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">

                        <!-- [Full Button]-->
                        <a href="{{ route('retailer.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" /></svg>
                            All Retailers
                        </a>

                        <!-- [Icon Button]-->
                        <a href="{{ route('retailer.index') }}" class="btn btn-primary d-sm-none btn-icon">
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
                            <form action="{{ route('retailer.store') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="row">

                                    <!-- User -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select name="user_id" class="form-select" id="user_id">
                                                    <option value="">-- Select User --</option>
                                                @foreach( $users as $user )
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="user_id">User</label>
                                            @error('user_id')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- BTS Code -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select name="bts_id" class="form-select" id="bts_id">
                                                <option value="">-- Select BTS Code --</option>
                                                @foreach( $allBts as $bts )
                                                    <option value="{{ $bts->id }}">{{ $bts->code }}</option>
                                                @endforeach
                                            </select>
                                            <label for="bts_id">BTS Code</label>
                                            @error('bts_id')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Route -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select name="route_id" class="form-select" id="route_id">
                                                <option value="">-- Select Route --</option>
                                                @foreach( $routes as $route )
                                                    <option value="{{ $route->id }}">{{ $route->code }}</option>
                                                @endforeach
                                            </select>
                                            <label for="route_id">Route</label>
                                            @error('route_id')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- DD House -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select name="dd_house_id" class="form-select" id="dd_house_id">
                                                <option value="">-- Select DD House --</option>
                                                @foreach( $houses as $house )
                                                    <option value="{{ $house->id }}">{{ $house->code }}</option>
                                                @endforeach
                                            </select>
                                            <label for="dd_house_id">DD House</label>
                                            @error('dd_house_id')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Retailer Code -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="retailer_code" id="retailer_code" type="text" class="form-control"
                                                   value="{{ old('retailer_code') }}"
                                                   placeholder="Enter Retailer Code" aria-label="Retailer Code">
                                            <label for="retailer_code" class="form-label">Retailer Code
                                                <span class="text-danger">*</span>
                                            </label>
                                            @error('retailer_code')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Shop Name -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="shop_name" id="shop_name" type="text" class="form-control"
                                                   value="{{ old('shop_name') }}"
                                                   placeholder="Enter Shop Name" aria-label="Shop Name">
                                            <label for="shop_name" class="form-label">Shop Name</label>
                                            @error('shop_name')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Retailer Type -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="retailer_type" id="retailer_type" type="text" class="form-control"
                                                   value="{{ old('retailer_type') }}"
                                                   placeholder="Enter Retailer Type" aria-label="Retailer Type">
                                            <label for="retailer_type" class="form-label">Retailer Type</label>
                                            @error('retailer_type')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Enabled -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select name="enabled" class="form-select" id="enabled">
                                                <option value="Y">Yes</option>
                                                <option value="N">No</option>
                                            </select>
                                            <label for="enabled">Enabled</label>
                                            @error('enabled')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- SSO -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select name="sim_seller" class="form-select" id="sim_seller">
                                                <option value="Y">Yes</option>
                                                <option value="N">No</option>
                                            </select>
                                            <label for="sim_seller">SSO</label>
                                            @error('sim_seller')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Service Point -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select name="service_point" class="form-select" id="service_point">
                                                <option value="bsp">BSP</option>
                                                <option value="bssp">BSSP</option>
                                                <option value="bssp">BSSP</option>
                                                <option value="kro">KRO</option>
                                                <option value="rbsp">RBSP</option>
                                                <option value="na">Na</option>
                                            </select>
                                            <label for="service_point">Service Point</label>
                                            @error('service_point')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Owner Name -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="owner_name" id="owner_name" type="text" class="form-control"
                                                   value="{{ old('owner_name') }}"
                                                   placeholder="Enter Owner Name" aria-label="Owner Name">
                                            <label for="owner_name" class="form-label">Owner Name</label>
                                            @error('owner_name')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Contact Number -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="contact_no" id="contact_no" type="text" class="form-control"
                                                   value="{{ old('contact_no') }}"
                                                   placeholder="Enter Contact Number" aria-label="Contact Number">
                                            <label for="contact_no" class="form-label">Contact Number</label>
                                            @error('contact_no')
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
                                            <label for="district" class="form-label">District</label>
                                            @error('district')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Thana -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="thana" id="thana" type="text" class="form-control"
                                                   value="{{ old('thana') }}"
                                                   placeholder="Enter Thana" aria-label="Thana">
                                            <label for="thana" class="form-label">Thana</label>
                                            @error('thana')
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
                                            <label for="address" class="form-label">Address</label>
                                            @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- NID -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="nid" id="nid" type="text" class="form-control"
                                                   value="{{ old('nid') }}"
                                                   placeholder="Enter NID" aria-label="NID">
                                            <label for="nid" class="form-label">NID</label>
                                            @error('nid')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Trade License No -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="trade_license_no" id="trade_license_no" type="text" class="form-control"
                                                   value="{{ old('trade_license_no') }}"
                                                   placeholder="Enter Trade License No" aria-label="Trade License No">
                                            <label for="trade_license_no" class="form-label">Trade License No</label>
                                            @error('trade_license_no')
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

                                    <!-- Status -->
                                    <div class="col-md-6">
                                        <label class="form-label">Status</label>
                                        <select class="form-select" name="status">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-primary w-100 d-md-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus"
                                             width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                             fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                        Create retailer
                                    </button>
                                    <button type="submit" class="btn btn-primary d-none d-md-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus"
                                             width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                             fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                        Create retailer
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
