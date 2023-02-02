@extends('layouts.app')
@push('title') Verify BP @endpush

@section('main-content')
    <div class="container-fluid">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Verify
                    </div>
                    <h2 class="page-title">
                        BP Information - {{ $bp->user->name }}
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                @endif
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('bp.approve', $bp->id) }}" method="POST">
                                @csrf

                                <div class="row">
                                    @if( $bp->tmp_personal_number )
                                        <!-- Personal Number Current -->
                                        <div class="col-md-6">
                                            <x-input value="{{ $bp->personal_number }}"
                                                     label="Current Personal Number"
                                                     placeholder disabled>
                                            </x-input>
                                        </div>

                                        <!-- Personal Number New -->
                                        <div class="col-md-6">
                                            <x-input name="personal_number"
                                                     type="number"
                                                     class="bg-warning-lt"
                                                     value="{{ $bp->tmp_personal_number }}"
                                                     label="New Personal Number"
                                                     placeholder>
                                            </x-input>
                                        </div>
                                        <hr>
                                    @endif

                                    @if( $bp->tmp_blood_group )
                                        <!-- Current Blood Group -->
                                        <div class="col-md-6">
                                            <x-input value="{{ $bp->blood_group }}"
                                                     label="Current Blood Group"
                                                     placeholder disabled>
                                            </x-input>
                                        </div>

                                        <!-- New Blood Group -->
                                        <div class="col-md-6">
                                            <x-input value="{{ $bp->tmp_blood_group }}"
                                                     name="blood_group"
                                                     label="New Blood Group"
                                                     placeholder>
                                            </x-input>
                                        </div>
                                        <hr>
                                    @endif

                                    @if( $bp->tmp_education )
                                        <!-- Current Education -->
                                        <div class="col-md-6">
                                            <x-input value="{{ $bp->education }}"
                                                     label="Current Education"
                                                     placeholder disabled>
                                            </x-input>
                                        </div>

                                        <!-- New Education -->
                                        <div class="col-md-6">
                                            <x-input name="education"
                                                     class="bg-warning-lt"
                                                     value="{{ $bp->tmp_education }}"
                                                     label="New Education"
                                                     placeholder>
                                            </x-input>
                                        </div>
                                        <hr>
                                    @endif

                                    @if( $bp->tmp_father_name )
                                        <!-- Current Father Name -->
                                        <div class="col-md-6">
                                            <x-input value="{{ $bp->father_name }}"
                                                     label="Current Father Name"
                                                     placeholder disabled>
                                            </x-input>
                                        </div>

                                        <!-- New Father Name -->
                                        <div class="col-md-6">
                                            <x-input name="father_name"
                                                     class="bg-warning-lt"
                                                     value="{{ $bp->tmp_father_name }}"
                                                     label="New Father Name"
                                                     placeholder>
                                            </x-input>
                                        </div>
                                        <hr>
                                    @endif

                                    @if( $bp->tmp_mother_name )
                                        <!-- Current Mother Name -->
                                            <div class="col-md-6">
                                                <x-input value="{{ $bp->mother_name }}"
                                                         label="Current Mother Name"
                                                         placeholder disabled>
                                                </x-input>
                                            </div>

                                            <!-- New Mother Name -->
                                            <div class="col-md-6">
                                                <x-input name="mother_name"
                                                         class="bg-warning-lt"
                                                         value="{{ $bp->tmp_mother_name }}"
                                                         label="New Mother Name"
                                                         placeholder>
                                                </x-input>
                                            </div>
                                            <hr>
                                    @endif

                                    @if( $bp->tmp_division )
                                        <!-- Current Division -->
                                            <div class="col-md-6">
                                                <x-input value="{{ $bp->division }}"
                                                         label="Current Division"
                                                         placeholder disabled>
                                                </x-input>
                                            </div>

                                            <!-- New Division -->
                                            <div class="col-md-6">
                                                <x-input name="division"
                                                         class="bg-warning-lt"
                                                         value="{{ $bp->tmp_division }}"
                                                         label="New Division"
                                                         placeholder>
                                                </x-input>
                                            </div>
                                            <hr>
                                    @endif

                                    @if( $bp->tmp_district )
                                        <!-- Current District -->
                                        <div class="col-md-6">
                                            <x-input value="{{ $bp->district }}"
                                                     label="Current District"
                                                     placeholder disabled>
                                            </x-input>
                                        </div>

                                        <!-- New District -->
                                        <div class="col-md-6">
                                            <x-input name="district"
                                                     class="bg-warning-lt"
                                                     value="{{ $bp->tmp_district }}"
                                                     label="New District"
                                                     placeholder>
                                            </x-input>
                                        </div>
                                        <hr>
                                    @endif

                                    @if( $bp->tmp_thana )
                                        <!-- Current Thana -->
                                        <div class="col-md-6">
                                            <x-input value="{{ $bp->thana }}"
                                                     label="Current Thana"
                                                     placeholder disabled>
                                            </x-input>
                                        </div>

                                        <!-- New Thana -->
                                        <div class="col-md-6">
                                            <x-input name="thana"
                                                     class="bg-warning-lt"
                                                     value="{{ $bp->tmp_thana }}"
                                                     label="New Thana"
                                                     placeholder>
                                            </x-input>
                                        </div>
                                        <hr>
                                    @endif

                                    @if( $bp->tmp_address )
                                        <!-- Current Address -->
                                        <div class="col-md-6">
                                            <x-input value="{{ $bp->address }}"
                                                     label="Current Address"
                                                     placeholder disabled>
                                            </x-input>
                                        </div>

                                        <!-- New Address -->
                                        <div class="col-md-6">
                                            <x-input name="address"
                                                     class="bg-warning-lt"
                                                     value="{{ $bp->tmp_address }}"
                                                     label="New Address"
                                                     placeholder>
                                            </x-input>
                                        </div>
                                        <hr>
                                    @endif

                                    @if( $bp->tmp_nid )
                                        <!-- Current NID -->
                                        <div class="col-md-6">
                                            <x-input value="{{ $bp->nid }}"
                                                     label="Current NID"
                                                     placeholder disabled>
                                            </x-input>
                                        </div>

                                        <!-- New NID -->
                                        <div class="col-md-6">
                                            <x-input name="nid"
                                                     class="bg-warning-lt"
                                                     value="{{ $bp->tmp_nid }}"
                                                     label="New NID"
                                                     placeholder>
                                            </x-input>
                                        </div>
                                        <hr>
                                    @endif

                                    @if( $bp->tmp_bank_name )
                                        <!-- Current Bank Name -->
                                        <div class="col-md-6">
                                            <x-input value="{{ $bp->bank_name }}"
                                                     label="Current Bank Name"
                                                     placeholder disabled>
                                            </x-input>
                                        </div>

                                        <!-- New Bank Name -->
                                        <div class="col-md-6">
                                            <x-input name="bank_name"
                                                     class="bg-warning-lt"
                                                     value="{{ $bp->tmp_bank_name }}"
                                                     label="New Bank Name"
                                                     placeholder>
                                            </x-input>
                                        </div>
                                        <hr>
                                    @endif

                                    @if( $bp->tmp_brunch_name )
                                        <!-- Current Brunch Name -->
                                        <div class="col-md-6">
                                            <x-input value="{{ $bp->brunch_name }}"
                                                     label="Current Brunch Name"
                                                     placeholder disabled>
                                            </x-input>
                                        </div>

                                        <!-- New Brunch Name -->
                                        <div class="col-md-6">
                                            <x-input name="brunch_name"
                                                     class="bg-warning-lt"
                                                     value="{{ $bp->tmp_brunch_name }}"
                                                     label="New Brunch Name"
                                                     placeholder>
                                            </x-input>
                                        </div>
                                        <hr>
                                    @endif

                                    @if( $bp->tmp_account_number )
                                        <!-- Current Account Number -->
                                        <div class="col-md-6">
                                            <x-input value="{{ $bp->account_number }}"
                                                     label="Current Account Number"
                                                     placeholder disabled>
                                            </x-input>
                                        </div>

                                        <!-- New Account Number -->
                                        <div class="col-md-6">
                                            <x-input name="account_number"
                                                     class="bg-warning-lt"
                                                     value="{{ $bp->tmp_account_number }}"
                                                     label="New Account Number"
                                                     placeholder>
                                            </x-input>
                                        </div>
                                        <hr>
                                    @endif

                                    @if( $bp->tmp_dob )
                                        <!-- Current Date Of Birth -->
                                        <div class="col-md-6">
                                            <x-input value="{{ $bp->dob }}"
                                                     label="Current Date Of Birth"
                                                     placeholder disabled>
                                            </x-input>
                                        </div>

                                        <!-- New Date Of Birth -->
                                        <div class="col-md-6">
                                            <x-input name="dob"
                                                     class="bg-warning-lt"
                                                     value="{{ $bp->tmp_dob->toDateString() }}"
                                                     label="New Date Of Birth"
                                                     type="date"
                                                     placeholder>
                                            </x-input>
                                        </div>
                                        <hr>
                                    @endif
                                </div>

                                <div class="col-12 d-flex justify-content-between">
                                    <x-button class="d-none d-md-block">
                                        <x-icon.checks/>Approve
                                    </x-button>

                                    <a href="#" class="btn btn-danger d-none d-md-block">
                                        <x-icon.ban/>Reject
                                    </a>
                                </div>

                                <div class="col-12 d-md-none">
                                    <x-button class="w-100 d-md-none mb-3">
                                        <x-icon.checks/>Approve
                                    </x-button>

                                    <a href="#" class="btn btn-danger w-100 d-md-none">
                                        <x-icon.ban/>Reject
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
