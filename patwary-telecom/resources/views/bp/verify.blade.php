<x-main>

    <!-- Main Title -->
    <x-slot:title>Verify Information</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>Verify</x-slot:page-pre-title>

    <!-- Page Title -->
    <x-slot:page-title>
        Bp Information (<em>{{ $bp->user->name }}</em>)
    </x-slot:page-title>

    <!-- Page title actions -->
    <x-slot:button>
        <!-- [Full Button]-->
        <x-link href="{{ route('bp.index') }}" class="btn btn-primary d-none d-sm-inline-block">
            <x-icon.back/>All BP
        </x-link>
    </x-slot:button>

    <x-slot:icon-button>
        <!-- [Icon Button]-->
        <x-link href="{{ route('bp.index') }}" class="btn btn-primary d-sm-none btn-icon" >
            <x-icon.back/>
        </x-link>
    </x-slot:icon-button>

    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('bp.approve', $bp->id) }}" id="approve" method="POST">
                                @csrf
                                <div class="row">
                                @if( $bp->tmp_personal_number )
                                    <!-- Personal Number Current -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ $bp->personal_number }}" label="Current Personal Number" placeholder disabled> </x-input>
                                            </div>
                                        </div>

                                        <!-- Personal Number New -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="personal_number"  type="number" class="bg-warning-lt" value="{{ $bp->tmp_personal_number }}" label="New Personal Number" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $bp->tmp_blood_group )
                                    <!-- Current Blood Group -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ strtoupper($bp->blood_group) }}" label="Current Blood Group" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New Blood Group -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ strtoupper($bp->tmp_blood_group) }}" name="blood_group" class="bg-warning-lt" label="New Blood Group" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $bp->tmp_education )
                                    <!-- Current Education -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ strtoupper($bp->education) }}" label="Current Education" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New Education -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="education" class="bg-warning-lt" value="{{ strtoupper($bp->tmp_education) }}" label="New Education" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $bp->tmp_father_name )
                                    <!-- Current Father Name -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ $bp->father_name }}" label="Current Father Name" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New Father Name -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="father_name" class="bg-warning-lt" value="{{ $bp->tmp_father_name }}" label="New Father Name" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $bp->tmp_mother_name )
                                    <!-- Current Mother Name -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ $bp->mother_name }}" label="Current Mother Name" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New Mother Name -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="mother_name" class="bg-warning-lt" value="{{ $bp->tmp_mother_name }}" label="New Mother Name" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $bp->tmp_division )
                                    <!-- Current Division -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ $bp->division }}" label="Current Division" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New Division -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="division" class="bg-warning-lt" value="{{ $bp->tmp_division }}" label="New Division" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $bp->tmp_district )
                                    <!-- Current District -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ $bp->district }}" label="Current District" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New District -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="district" class="bg-warning-lt" value="{{ $bp->tmp_district }}" label="New District" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $bp->tmp_thana )
                                    <!-- Current Thana -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ $bp->thana }}" label="Current Thana" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New Thana -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="thana" class="bg-warning-lt" value="{{ $bp->tmp_thana }}" label="New Thana" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $bp->tmp_address )
                                    <!-- Current Address -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ $bp->address }}" label="Current Address" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New Address -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="address" class="bg-warning-lt" value="{{ $bp->tmp_address }}" label="New Address" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $bp->tmp_nid )
                                    <!-- Current NID -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ $bp->nid }}" label="Current NID" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New NID -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="nid" class="bg-warning-lt" value="{{ $bp->tmp_nid }}" label="New NID" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $bp->tmp_bank_name )
                                    <!-- Current Bank Name -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ $bp->bank_name }}" label="Current Bank Name" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New Bank Name -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="bank_name" class="bg-warning-lt" value="{{ $bp->tmp_bank_name }}" label="New Bank Name" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $bp->tmp_brunch_name )
                                    <!-- Current Brunch Name -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ $bp->brunch_name }}" label="Current Brunch Name" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New Brunch Name -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="brunch_name" class="bg-warning-lt" value="{{ $bp->tmp_brunch_name }}" label="New Brunch Name" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $bp->tmp_account_number )
                                    <!-- Current Account Number -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ $bp->account_number }}" label="Current Account Number" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New Account Number -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="account_number" class="bg-warning-lt" value="{{ $bp->tmp_account_number }}" label="New Account Number" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                @endif

                                @if( $bp->tmp_dob )
                                    <!-- Current Date Of Birth -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input value="{{ ($bp->dob ?? '') ? $bp->dob->toDateString() : '' }}" type="date" label="Current Date Of Birth" placeholder disabled></x-input>
                                            </div>
                                        </div>

                                        <!-- New Date Of Birth -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <x-input name="dob" class="bg-warning-lt" value="{{ $bp->tmp_dob->toDateString() }}" label="New Date Of Birth" type="date" placeholder readonly></x-input>
                                            </div>
                                        </div>
                                        <hr>
                                    @endif
                                </div>
                            </form>

                            <div class="col-12 d-flex justify-content-between">
                                <x-button type="button" onclick="document.getElementById('approve').submit()" class="d-none d-md-block">
                                    <x-icon.checks/>Approve
                                </x-button>

                                <form action="{{ route('bp.reject', $bp->id) }}" method="POST">
                                    @csrf
                                    <x-button class="btn-danger d-none d-md-block">
                                        <x-icon.ban/>Reject
                                    </x-button>
                                </form>
                            </div>

                            <div class="col-12 d-md-none">
                                <x-button type="button" onclick="document.getElementById('approve').submit()" class="w-100 d-md-none mb-3">
                                    <x-icon.checks/>Approve
                                </x-button>

                                <form action="{{ route('bp.reject', $bp->id) }}" method="POST">
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
