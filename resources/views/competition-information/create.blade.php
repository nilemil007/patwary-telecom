<x-main>

    <!-- Main Title -->
    <x-slot:title>Create New Entry</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>Remaining Retailer (<span class="text-danger">{{ $retailers->count() }}</span>)</x-slot:page-pre-title>

    <!-- Page Title -->
    <x-slot:page-title>Add New Entry</x-slot:page-title>

    <!-- Page title actions -->
    <x-slot:button>
        <!-- [Full Button]-->
        <x-link href="{{ route('others-operator-information.index') }}" class="btn btn-primary">
            <x-icon.back></x-icon.back>View All
        </x-link>
    </x-slot:button>

    <x-slot:icon-button>
        <!-- [Icon Button]-->
        <x-link href="{{ route('others-operator-information.index') }}" class="btn btn-primary btn-icon">
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
                            <form action="{{ route('others-operator-information.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <!-- Retailer -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-select name="retailer_number" label="Itop Number" placeholder autofocus>
                                                @foreach( $retailers as $retailer )
                                                    <option value="{{ $retailer->itop_number }}">
                                                        {{ $retailer->itop_number }}
                                                    </option>
                                                @endforeach
                                            </x-select>
                                        </div>
                                    </div>

                                    <x-input name="dd_code" value="{{ $ddCode }}" hidden></x-input>
                                    <x-input name="retailer_code" value="{{ $ddCode }}" hidden></x-input>

                                    <div class="hr"></div>
                                    <h2>Recharge Data (Monthly - C2S)</h2>

                                    <!-- Bl C2S -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Bl C2S" name="bl_tarshiary" type="number" value="{{ old('bl_tarshiary') }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- GP C2S -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="GP C2S" name="gp_tarshiary" type="number" value="{{ old('gp_tarshiary') }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Robi C2S -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Robi C2S" name="robi_tarshiary" type="number" value="{{ old('robi_tarshiary') }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Airtel C2S -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Airtel C2S" name="airtel_tarshiary" type="number" value="{{ old('airtel_tarshiary') }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <div class="hr"></div>
                                    <h2>Gross Add Data (Monthly - GA)</h2>

                                    <!-- Bl GA -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Bl GA" name="bl_ga" type="number" value="{{ old('bl_ga') }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- GP GA -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="GP GA" name="gp_ga" type="number" value="{{ old('gp_ga') }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Robi GA -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Robi GA" name="robi_ga" type="number" value="{{ old('robi_ga') }}" placeholder></x-input>
                                        </div>
                                    </div>

                                    <!-- Airtel GA -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Airtel GA" name="airtel_ga" type="number" value="{{ old('airtel_ga') }}" placeholder></x-input>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-footer">
                                    <x-button class="w-100 d-md-none"><x-icon.save></x-icon.save>Save</x-button>
                                    <x-button class="d-none d-md-block"><x-icon.save></x-icon.save>Save</x-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main>
