<x-main>

    <!-- Main Title -->
    <x-slot:title>Create New Replace</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>Create</x-slot:page-pre-title>

    <!-- Page Title -->
    <x-slot:page-title>New Replace Entry</x-slot:page-title>

    <!-- Page title action button -->
    <x-slot:button>
        <x-link href="{{ route('itop-replace.index') }}" class="btn btn-primary">
            <x-icon.back></x-icon.back>All Replaces
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
                            <form action="{{ route('itop-replace.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <!-- User -->
                                    @can('delete replace')
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
                                    @endcan

                                <!-- Replace Number -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="itop_number" id="itop_number" type="number" class="form-control"
                                                   value="{{ old('itop_number') }}"
                                                   placeholder="Enter Replace Number">
                                            <label for="itop_number" class="form-label">Replace Number</label>
                                            @error('itop_number')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Serial Number -->
                                    @can('Replace delete')
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input name="serial_number" id="serial_number"
                                                       type="number" class="form-control"
                                                       value="{{ old('serial_number') }}"
                                                       placeholder="Enter Serial Number" aria-label="Serial Number">
                                                <label for="serial_number" class="form-label">Serial Number</label>
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
                                                   value="{{ old('balance') }}"
                                                   placeholder="Enter Balance" aria-label="Balance">
                                            <label for="balance" class="form-label">Balance
                                                <span class="text-danger">*</span>
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
                                                <option value="sim-lost">Sim Lost</option>
                                                <option value="stolen">Stolen</option>
                                                <option value="damaged">Damaged</option>
                                            </select>
                                            <label for="reason">Replace Reason</label>
                                            @error('reason')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Description -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="description" id="description" type="text" class="form-control"
                                                   value="{{ old('description') }}"
                                                   placeholder="Enter Description" aria-label="Description">
                                            <label for="description" class="form-label">Description</label>
                                            @error('description')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-primary w-100 d-md-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 5l0 14m-7 -7l14 0"></path>
                                        </svg>
                                        Create replace
                                    </button>
                                    <button type="submit" class="btn btn-primary d-none d-md-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus"
                                             width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                             stroke="currentColor" fill="none" stroke-linecap="round"
                                             stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 5l0 14m-7 -7l14 0"></path>
                                        </svg>
                                        Create replace
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main>
