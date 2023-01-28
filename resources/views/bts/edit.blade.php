@extends('layouts.app')
@push('title') Edit BTS @endpush

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
                        BTS
                    </h2>
                </div>

                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">

                        <!-- [Full Button]-->
                        <a href="{{ route('bts.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" /></svg>
                            BTS List
                        </a>

                        <!-- [Icon Button]-->
                        <a href="{{ route('bts.index') }}" class="btn btn-primary d-sm-none btn-icon">
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
                            <form action="{{ route('bts.update', $bts->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <!-- DD House -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select name="dd_house_id" class="form-select" id="dd_house_id">
                                                <option value="">-- Select House --</option>
                                                @foreach( $houses as $house )
                                                    <option {{ $house->code == $bts->dd_house_id ? 'selected' : '' }} value="{{ $house->id }}">{{ $house->code }}</option>
                                                @endforeach
                                            </select>
                                            <label for="dd_house_id">DD House <span class="text-danger">*</span></label>
                                            @error('dd_house_id')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Site Id -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="site_id" id="site_id" type="text" class="form-control"
                                                   value="{{ old('site_id', $bts->site_id) }}"
                                                   placeholder="Enter Site Id">
                                            <label for="site_id" class="form-label">Site Id
                                                <span class="text-danger">*</span></label>
                                            @error('site_id')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- BTS Code -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="bts_code" id="bts_code" type="text" class="form-control"
                                                   value="{{ old('bts_code', $bts->bts_code) }}"
                                                   placeholder="Enter BTS Code">
                                            <label for="bts_code" class="form-label">BTS Code
                                                <span class="text-danger">*</span></label>
                                            @error('bts_code')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Site Type -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="site_type" id="site_type" type="text" class="form-control"
                                                   value="{{ old('site_type', $bts->site_type) }}"
                                                   placeholder="Enter Site Type">
                                            <label for="site_type" class="form-label">Site Type
                                                <span class="text-danger">*</span></label>
                                            @error('site_type')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Division -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="division" id="division" type="text" class="form-control"
                                                   value="{{ old('division', $bts->division) }}"
                                                   placeholder="Enter Division">
                                            <label for="division" class="form-label">Division
                                                <span class="text-danger">*</span></label>
                                            @error('division')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- District -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="district" id="district" type="text" class="form-control"
                                                   value="{{ old('district', $bts->district) }}"
                                                   placeholder="Enter District">
                                            <label for="district" class="form-label">District
                                                <span class="text-danger">*</span></label>
                                            @error('district')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Thana -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="thana" id="thana" type="text" class="form-control"
                                                   value="{{ old('thana', $bts->thana) }}"
                                                   placeholder="Enter Thana">
                                            <label for="thana" class="form-label">Thana
                                                <span class="text-danger">*</span></label>
                                            @error('thana')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Site Status -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="site_status" id="site_status" type="text" class="form-control"
                                                   value="{{ old('site_status', $bts->site_status) }}"
                                                   placeholder="Enter Site Status">
                                            <label for="site_status" class="form-label">Site Status
                                                <span class="text-danger">*</span></label>
                                            @error('site_status')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Network Mode -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="network_mode" id="network_mode" type="text" class="form-control"
                                                   value="{{ old('network_mode', $bts->network_mode) }}"
                                                   placeholder="Enter Network Mode">
                                            <label for="network_mode" class="form-label">Network Mode
                                                <span class="text-danger">*</span></label>
                                            @error('network_mode')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Address -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="address" id="address" type="text" class="form-control"
                                                   value="{{ old('address', $bts->address) }}"
                                                   placeholder="Enter Address">
                                            <label for="address" class="form-label">Address
                                                <span class="text-danger">*</span></label>
                                            @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Latitude -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="latitude" id="latitude" type="text" class="form-control"
                                                   value="{{ old('latitude', $bts->latitude) }}"
                                                   placeholder="Enter Latitude">
                                            <label for="latitude" class="form-label">Latitude
                                                <span class="text-danger">*</span></label>
                                            @error('latitude')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Longitude -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="longitude" id="longitude" type="text" class="form-control"
                                                   value="{{ old('longitude', $bts->longitude) }}"
                                                   placeholder="Enter Longitude">
                                            <label for="longitude" class="form-label">Longitude
                                                <span class="text-danger">*</span></label>
                                            @error('longitude')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- 2G On Air Date -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="two_g_on_air_date" id="two_g_on_air_date"
                                                   type="date" class="form-control"
                                                   value="{{ old('two_g_on_air_date', $bts->two_g_on_air_date) }}"
                                                   placeholder="Enter 2G On Air Date">
                                            <label for="two_g_on_air_date" class="form-label">2G On Air Date
                                                <span class="text-danger">*</span></label>
                                            @error('two_g_on_air_date')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- 3G On Air Date -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="three_g_on_air_date" id="three_g_on_air_date"
                                                   type="date" class="form-control"
                                                   value="{{ old('three_g_on_air_date', $bts->three_g_on_air_date) }}"
                                                   placeholder="Enter 3G On Air Date">
                                            <label for="three_g_on_air_date" class="form-label">3G On Air Date
                                                <span class="text-danger">*</span></label>
                                            @error('three_g_on_air_date')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- 4G On Air Date -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="four_g_on_air_date" id="four_g_on_air_date"
                                                   type="date" class="form-control"
                                                   value="{{ old('four_g_on_air_date', $bts->four_g_on_air_date) }}"
                                                   placeholder="Enter 4G On Air Date">
                                            <label for="four_g_on_air_date" class="form-label">4G On Air Date
                                                <span class="text-danger">*</span></label>
                                            @error('four_g_on_air_date')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Urban Rural -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="urban_rural" id="urban_rural" type="text" class="form-control"
                                                   value="{{ old('urban_rural', $bts->urban_rural) }}"
                                                   placeholder="Enter Urban Rural">
                                            <label for="urban_rural" class="form-label">Urban Rural
                                                <span class="text-danger">*</span></label>
                                            @error('urban_rural')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Priority -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="priority" id="priority" type="text" class="form-control"
                                                   value="{{ old('priority', $bts->priority) }}"
                                                   placeholder="Enter Priority">
                                            <label for="priority" class="form-label">Priority
                                                <span class="text-danger">*</span></label>
                                            @error('priority')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Status -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select name="status" class="form-select" id="status">
                                                <option {{ $bts->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                                <option {{ $bts->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
                                            </select>
                                            <label for="status">Status</label>
                                            @error('status')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
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
