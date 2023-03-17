<x-main>

    <!-- Main Title -->
    <x-slot:title>Edit Replace</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>Edit</x-slot:page-pre-title>

    <!-- Page Title -->
    <x-slot:page-title>Replace Information</x-slot:page-title>

    <!-- Page title action button -->
    <x-slot:button>
        <x-link href="{{ route('itop-replace.index') }}" class="btn btn-primary">
            <x-icon.back></x-icon.back>All Replace
        </x-link>
    </x-slot:button>

    <x-slot:icon-button>
        <x-link href="{{ route('itop-replace.index') }}" class="btn btn-primary btn-icon">
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
                            <form action="{{ route('itop-replace.update', $itopReplace->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <!-- User -->
                                    @can('delete replace')
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <select name="user_id" class="form-select" id="user_id">
                                                    <option value="">-- Select User --</option>
                                                    @foreach( $users as $user )
                                                        <option {{ $itopReplace->user_id == $user->id ? 'selected' : '' }}
                                                                value="{{ $user->id }}">{{ $user->name }}</option>
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
                                            <input name="itop_number" id="itop_number" type="number" class="form-control"
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
                                    @can('delete replace')
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input name="serial_number" id="serial_number" type="number" class="form-control"
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
                                            <input name="balance" id="balance" type="number" class="form-control"
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
                                    @can('delete replace')
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input name="pay_amount" id="pay_amount" type="number" class="form-control"
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
                                    @can('delete replace')
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
