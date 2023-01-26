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
                        Replace Information
                    </h2>
                </div>

                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">

                        <!-- Create new entry [Full Button]-->
                        <a href="{{ route('itop-replace.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" /></svg>
                            Back
                        </a>

                        <!-- Create new entry [Icon Button]-->
                        <a href="{{ route('itop-replace.index') }}" class="btn btn-primary d-sm-none btn-icon">
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
                            <form action="{{ route('itop-replace.update', $itopReplace->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <!-- User -->
                                    @can('Replace delete')
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <select name="user_id" class="form-select" id="user_id">
                                                    <option value="">-- Select User --</option>
                                                    @foreach( $users as $user )
                                                        <option {{ $itopReplace->user_id == $user->id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="user_id">User <span class="text-danger">*</span></label>
                                                @error('user_id')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    @endcan

                                    <!-- Replace Number -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="itop_number" id="itop_number" type="text" class="form-control"
                                                   value="{{ $itopReplace->itop_number }}"
                                                   placeholder="Enter Replace Number">
                                            <label for="itop_number" class="form-label">Replace Number
                                                <span class="text-danger">*</span></label>
                                            @error('itop_number')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Serial Number -->
                                    @can('Replace delete')
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input name="serial_number" id="serial_number" type="text" class="form-control"
                                                       value="{{ $itopReplace->serial_number }}"
                                                       placeholder="Enter Serial Number" aria-label="Serial Number">
                                                <label for="serial_number" class="form-label">Serial Number
                                                    <span class="text-danger">*</span></label>
                                                @error('serial_number')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    @endcan

                                    <!-- Balance -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="balance" id="balance" type="text" class="form-control"
                                                   value="{{ $itopReplace->balance }}"
                                                   placeholder="Enter Balance" aria-label="Balance">
                                            <label for="balance" class="form-label">Balance
                                            </label>
                                            @error('balance')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Reason -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select name="reason" class="form-select" id="reason">
                                                <option {{ $itopReplace->reason == 'sim-lost' ? 'selected' : '' }} value="sim-lost">Sim Lost</option>
                                                <option {{ $itopReplace->reason == 'stolen' ? 'selected' : '' }} value="stolen">Stolen</option>
                                                <option {{ $itopReplace->reason == 'damaged' ? 'selected' : '' }} value="damaged">Damaged</option>
                                            </select>
                                            <label for="reason">Replace Reason
                                                <span class="text-danger">*</span></label>
                                            @error('reason')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Description -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="description" id="description" type="text" class="form-control"
                                                   value="{{ $itopReplace->description }}"
                                                   placeholder="Enter Description" aria-label="Description">
                                            <label for="description" class="form-label">Description</label>
                                            @error('description')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Pay Amount -->
                                    @can('Replace delete')
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input name="pay_amount" id="pay_amount" type="text" class="form-control"
                                                       value="{{ $itopReplace->pay_amount }}"
                                                       placeholder="Enter Pay Amount" aria-label="Pay Amount">
                                                <label for="pay_amount" class="form-label">Pay Amount
                                                </label>
                                                @error('pay_amount')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    @endcan

                                    <!-- Status -->
                                    @can('Replace delete')
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <select name="status" class="form-select" id="status">
                                                    <option {{ $itopReplace->status == 'pending' ? 'selected' : '' }} value="pending">Pending</option>
                                                    <option {{ $itopReplace->status == 'processing' ? 'selected' : '' }} value="processing">Processing</option>
                                                    <option {{ $itopReplace->status == 'complete' ? 'selected' : '' }} value="complete">Complete</option>
                                                    <option {{ $itopReplace->status == 'due' ? 'selected' : '' }} value="due">Due</option>
                                                    <option {{ $itopReplace->status == 'paid' ? 'selected' : '' }} value="paid">Paid</option>
                                                </select>
                                                <label for="status">Status</label>
                                                @error('status')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    @endcan
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
