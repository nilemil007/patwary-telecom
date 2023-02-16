<x-main>

    <!-- Main Title -->
    <x-slot:title>Verify Information</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>Verify</x-slot:page-pre-title>

    <!-- Page Title -->
    <x-slot:page-title>
        Rso Information (<em>{{ $rso->user->name }}</em>)
    </x-slot:page-title>

    <!-- Page title actions -->
    <x-slot:button>
        <!-- [Full Button]-->
        <x-link href="{{ route('rso.index') }}" class="btn btn-primary d-none d-sm-inline-block">
            <x-icon.back></x-icon.back>All Rso
        </x-link>
    </x-slot:button>

    <x-slot:icon-button>
        <!-- [Icon Button]-->
        <x-link href="{{ route('rso.index') }}" class="btn btn-primary d-sm-none btn-icon" >
            <x-icon.back></x-icon.back>
        </x-link>
    </x-slot:icon-button>

    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('rso.approve', $rso->id) }}" id="approve" method="POST">
                                @csrf
                                <div class="row">
                                @if( $rso->tmp_personal_number )
                                    <!-- Personal Number Current -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ $rso->personal_number }}" label="Current Personal Number" placeholder disabled> </x-input>
                                            </div>
                                        </div>

                                        <!-- Personal Number New -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="personal_number"  type="number" class="bg-warning-lt" value="{{ $rso->tmp_personal_number }}" label="New Personal Number" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $rso->tmp_father_name )
                                    <!-- Current Father Name -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ $rso->father_name }}" label="Current Father Name" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New Father Name -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="father_name" class="bg-warning-lt" value="{{ $rso->tmp_father_name }}" label="New Father Name" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $rso->tmp_mother_name )
                                    <!-- Current Mother Name -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ $rso->mother_name }}" label="Current Mother Name" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New Mother Name -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="mother_name" class="bg-warning-lt" value="{{ $rso->tmp_mother_name }}" label="New Mother Name" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $rso->tmp_address )
                                    <!-- Current Address -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ $rso->address }}" label="Current Address" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New Address -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="address" class="bg-warning-lt" value="{{ $rso->tmp_address }}" label="New Address" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $rso->tmp_blood_group )
                                    <!-- Current Blood Group -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ strtoupper($rso->blood_group) }}" label="Current Blood Group" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New Blood Group -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ strtoupper($rso->tmp_blood_group) }}" name="blood_group" class="bg-warning-lt" label="New Blood Group" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $rso->tmp_account_number )
                                    <!-- Current Account Number -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ $rso->account_number }}" label="Current Account Number" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New Account Number -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="account_number" class="bg-warning-lt" value="{{ $rso->tmp_account_number }}" label="New Account Number" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $rso->tmp_bank_name )
                                    <!-- Current Bank Name -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ $rso->bank_name }}" label="Current Bank Name" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New Bank Name -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="bank_name" class="bg-warning-lt" value="{{ $rso->tmp_bank_name }}" label="New Bank Name" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $rso->tmp_brunch_name )
                                    <!-- Current Brunch Name -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ $rso->brunch_name }}" label="Current Brunch Name" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New Brunch Name -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="brunch_name" class="bg-warning-lt" value="{{ $rso->tmp_brunch_name }}" label="New Brunch Name" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $rso->tmp_routing_number )
                                    <!-- Current Routing Number -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ $rso->routing_number }}" label="Current Routing Number" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New Routing Number -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="routing_number" class="bg-warning-lt" value="{{ $rso->tmp_routing_number }}" label="New Routing Number" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $rso->tmp_education )
                                    <!-- Current Education -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ strtoupper($rso->education) }}" label="Current Education" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New Education -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="education" class="bg-warning-lt" value="{{ strtoupper($rso->tmp_education) }}" label="New Education" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $rso->tmp_marital_status )
                                    <!-- Current Marital Status -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ strtoupper($rso->marital_status) }}" label="Current Marital Status" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New Marital Status -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="marital_status" class="bg-warning-lt" value="{{ strtoupper($rso->tmp_marital_status) }}" label="New Marital Status" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $rso->tmp_nid )
                                    <!-- Current NID -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ $rso->nid }}" label="Current NID" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New NID -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="nid" class="bg-warning-lt" value="{{ $rso->tmp_nid }}" label="New NID" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $rso->tmp_dob )
                                    <!-- Current Date Of Birth -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ ($rso->dob ?? '') ? $rso->dob->toDateString() : '' }}" type="date" label="Current Date Of Birth" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New Date Of Birth -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="dob" class="bg-warning-lt" value="{{ $rso->tmp_dob->toDateString() }}" label="New Date Of Birth" type="date" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif
                                </div>
                            </form>

                            <div class="col-12 d-flex justify-content-between">
                                <x-button type="button" onclick="document.getElementById('approve').submit()" class="d-none d-md-block">
                                    <x-icon.checks></x-icon.checks>Approve
                                </x-button>

                                <form action="{{ route('rso.reject', $rso->id) }}" method="POST">
                                    @csrf
                                    <x-button class="btn-danger d-none d-md-block">
                                        <x-icon.ban></x-icon.ban>Reject
                                    </x-button>
                                </form>
                            </div>

                            <div class="col-12 d-md-none">
                                <x-button type="button" onclick="document.getElementById('approve').submit()" class="w-100 d-md-none mb-3">
                                    <x-icon.checks/>Approve
                                </x-button>

                                <form action="{{ route('bp.reject', $rso->id) }}" method="POST">
                                    @csrf
                                    <x-button class="btn-danger w-100 d-md-none">
                                        <x-icon.ban/>Reject
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
