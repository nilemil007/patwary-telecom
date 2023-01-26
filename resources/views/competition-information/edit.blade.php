@extends('layouts.app')
@push('title') <title>Edit Information | {{ config('app.name') }}</title> @endpush

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
                        Competition Information
                    </h2>
                </div>

                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">

                        <!-- Create new entry [Full Button]-->
                        <a href="{{ route('competition.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" /></svg>
                            All Data
                        </a>

                        <!-- Create new entry [Icon Button]-->
                        <a href="{{ route('competition.index') }}" class="btn btn-primary d-sm-none btn-icon">
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
                            <form action="{{ route('competition.update', $competition->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <!-- Retailer Number -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select name="retailer_number"
                                                    class="form-select" id="retailer_number">
                                                <option value="">-- Select Retailer --</option>
                                                @foreach($retailers as $retailer)
                                                    <option {{ $competition->retailer_code == $retailer->retailer_code ? 'selected' : '' }} value="{{ $retailer->itop_number }}">
                                                        {{ $retailer->itop_number }} -
                                                        {{ $retailer->shop_name }}
                                                    </option>
                                                @endforeach

                                            </select>
                                            <label for="retailer_number">Retailer Number</label>
                                            @error('retailer_number')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="hr"></div>
                                    <h2>Recharge Data (Monthly - C2S)</h2>

                                    <!-- Bl C2S -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="bl_c2s" id="bl_c2s"
                                                   type="number" class="form-control"
                                                   value="{{ old('bl_c2s', $competition->bl_c2s) }}"
                                                   placeholder="Enter Bl C2S" aria-label="Bl C2S">
                                            <label for="bl_c2s" class="form-label">Bl C2S</label>
                                            @error('bl_c2s')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- GP C2S -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="gp_c2s" id="gp_c2s"
                                                   type="number" class="form-control"
                                                   value="{{ old('gp_c2s', $competition->gp_c2s) }}"
                                                   placeholder="Enter GP C2S" aria-label="GP C2S">
                                            <label for="gp_c2s" class="form-label">GP C2S</label>
                                            @error('gp_c2s')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Robi C2S -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="robi_c2s" id="robi_c2s"
                                                   type="number" class="form-control"
                                                   value="{{ old('robi_c2s', $competition->robi_c2s) }}"
                                                   placeholder="Enter Robi C2S" aria-label="Robi C2S">
                                            <label for="robi_c2s" class="form-label">Robi C2S</label>
                                            @error('robi_c2s')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Airtel C2S -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="airtel_c2s" id="airtel_c2s"
                                                   type="number" class="form-control"
                                                   value="{{ old('airtel_c2s', $competition->airtel_c2s) }}"
                                                   placeholder="Enter Airtel C2S" aria-label="Airtel C2S">
                                            <label for="airtel_c2s" class="form-label">Airtel C2S</label>
                                            @error('airtel_c2s')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="hr"></div>
                                    <h2>Gross Add Data (Monthly - GA)</h2>

                                    <!-- Bl GA -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="bl_ga" id="bl_ga"
                                                   type="number" class="form-control"
                                                   value="{{ old('bl_ga', $competition->bl_ga) }}"
                                                   placeholder="Enter Bl GA" aria-label="Bl GA">
                                            <label for="bl_ga" class="form-label">Bl GA</label>
                                            @error('bl_ga')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- GP GA -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="gp_ga" id="gp_ga"
                                                   type="number" class="form-control"
                                                   value="{{ old('gp_ga', $competition->gp_ga) }}"
                                                   placeholder="Enter GP GA" aria-label="GP GA">
                                            <label for="gp_ga" class="form-label">GP GA</label>
                                            @error('gp_ga')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Robi GA -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="robi_ga" id="robi_ga"
                                                   type="number" class="form-control"
                                                   value="{{ old('robi_ga', $competition->robi_ga) }}"
                                                   placeholder="Enter Robi GA" aria-label="Robi GA">
                                            <label for="robi_ga" class="form-label">Robi GA</label>
                                            @error('robi_ga')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Airtel GA -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="airtel_ga" id="airtel_ga"
                                                   type="number" class="form-control"
                                                   value="{{ old('airtel_ga', $competition->airtel_ga) }}"
                                                   placeholder="Enter Airtel GA" aria-label="Airtel GA">
                                            <label for="airtel_ga" class="form-label">Airtel GA</label>
                                            @error('airtel_ga')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-primary">
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
