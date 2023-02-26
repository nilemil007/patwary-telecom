<x-main>

    <!-- Main Title -->
    <x-slot:title>Verify Information</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>Verify</x-slot:page-pre-title>

    <!-- Page Title -->
    <x-slot:page-title>
        Retailer Information (<em>{{ $retailer->itop_number.'-'.$retailer->retailer_name }}</em>)
    </x-slot:page-title>

    <!-- Page title actions -->
    <x-slot:button>
        <!-- [Full Button]-->
        <x-link href="{{ route('retailer.index') }}" class="btn btn-primary d-none d-sm-inline-block">
            <x-icon.back></x-icon.back>All Retailers
        </x-link>
    </x-slot:button>

    <x-slot:icon-button>
        <!-- [Icon Button]-->
        <x-link href="{{ route('retailer.index') }}" class="btn btn-primary d-sm-none btn-icon" >
            <x-icon.back></x-icon.back>
        </x-link>
    </x-slot:icon-button>

    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('retailer.approve', $retailer->id) }}" id="approve" method="POST">
                                @csrf
                                <div class="row">
                                @if( $retailer->tmp_retailer_name )
                                    <!-- Current Retailer Name -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ $retailer->retailer_name }}" label="Current Retailer Name" placeholder disabled> </x-input>
                                            </div>
                                        </div>

                                        <!-- Retailer Name New -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="retailer_name" class="bg-warning-lt" value="{{ $retailer->tmp_retailer_name }}" label="New Retailer Name" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $retailer->tmp_retailer_type )
                                    <!-- Current Retailer Type -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ $retailer->retailer_type }}" label="Current Retailer Type" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New Retailer Type -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="retailer_type" class="bg-warning-lt" value="{{ $retailer->tmp_retailer_type }}" label="New Retailer Type" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $retailer->tmp_owner_name )
                                    <!-- Current Owner Name -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ $retailer->owner_name }}" label="Current Owner Name" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New Owner Name -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="owner_name" class="bg-warning-lt" value="{{ $retailer->tmp_owner_name }}" label="New Owner Name" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $retailer->tmp_contact_no )
                                    <!-- Current Contact No -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ $retailer->contact_no }}" label="Current Contact No" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New Contact No -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="contact_no" class="bg-warning-lt" value="{{ $retailer->tmp_contact_no }}" label="New Contact No" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $retailer->tmp_address )
                                    <!-- Current Address -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ $retailer->address }}" label="Current Address" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New Address -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ $retailer->tmp_address }}" name="address" class="bg-warning-lt" label="New Address" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $retailer->tmp_nid )
                                    <!-- Current NID -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ $retailer->nid }}" label="Current NID" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New NID -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="nid" class="bg-warning-lt" value="{{ $retailer->tmp_nid }}" label="New NID" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $retailer->tmp_trade_license_no )
                                    <!-- Current Trade License No -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ $retailer->trade_license_no }}" label="Current Trade License No" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New Trade License No -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="trade_license_no" class="bg-warning-lt" value="{{ $retailer->tmp_trade_license_no }}" label="New Trade License No" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $retailer->tmp_latitude )
                                    <!-- Current Latitude -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ $retailer->latitude }}" label="Current Latitude" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New Latitude -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="latitude" class="bg-warning-lt" value="{{ $retailer->tmp_latitude }}" label="New Latitude" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $retailer->tmp_longitude )
                                    <!-- Current Longitude -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ $retailer->longitude }}" label="Current Longitude" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New Longitude -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="longitude" class="bg-warning-lt" value="{{ $retailer->tmp_longitude }}" label="New Longitude" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $retailer->tmp_device_name )
                                    <!-- Current Device Name -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ $retailer->device_name }}" label="Current Device Name" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New Device Name -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="device_name" class="bg-warning-lt" value="{{ $retailer->tmp_device_name }}" label="New Device Name" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $retailer->tmp_device_sn )
                                    <!-- Current Device Serial No -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ $retailer->device_sn }}" label="Current Device Serial No" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New Device Serial No -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="device_sn" class="bg-warning-lt" value="{{ $retailer->tmp_device_sn }}" label="New Device Serial No" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $retailer->tmp_scanner_sn )
                                    <!-- Current Scanner Serial No -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ $retailer->scanner_sn }}" label="Current Scanner Serial No" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New Scanner Serial No -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="scanner_sn" class="bg-warning-lt" value="{{ $retailer->tmp_scanner_sn }}" label="New Scanner Serial No" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif
                            </form>

                            <div class="col-12 d-flex justify-content-between">
                                <x-button type="button" onclick="document.getElementById('approve').submit()" class="d-none d-md-block">
                                    <x-icon.checks></x-icon.checks>Approve
                                </x-button>

                                <form action="{{ route('retailer.reject', $retailer->id) }}" method="POST">
                                    @csrf
                                    <x-button class="btn-danger d-none d-md-block">
                                        <x-icon.ban></x-icon.ban>Reject
                                    </x-button>
                                </form>
                            </div>

                            <div class="col-12 d-md-none">
                                <x-button type="button" onclick="document.getElementById('approve').submit()" class="w-100 d-md-none mb-3">
                                    <x-icon.checks></x-icon.checks>Approve
                                </x-button>

                                <form action="{{ route('retailer.reject', $retailer->id) }}" method="POST">
                                    @csrf
                                    <x-button class="btn-danger w-100 d-md-none">
                                        <x-icon.ban></x-icon.ban>Reject
                                    </x-button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main>
