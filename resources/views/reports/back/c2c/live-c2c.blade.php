<x-main>

    <!-- Main Title -->
    <x-slot:title>Live C2C - Secondary</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>Overview</x-slot:page-pre-title>

    <!-- Page Title -->
    <x-slot:page-title>
        Live C2C
    </x-slot:page-title>

    <!-- Page title actions -->
    @if( auth()->user()->role == 'super-admin' )
        <x-slot:button>
            <!-- [Full Button]-->
            <form action="{{ route('raw.live.c2c.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group">
                    <input name="import_c2c" type="file"
                           accept=".xls,.xlsx"
                           class="form-control" required>

                    <button class="btn btn-outline-google" type="submit">
                        <x-icon.file-import></x-icon.file-import>Import C2C
                    </button>
                </div>
            </form>
        </x-slot:button>
    @endif

    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body border-bottom py-3">
                            <form class="row" autocomplete="off">
                                <div class="col-md-6">
                                    <!-- Date Search Large Screen -->
                                    <div class="d-none d-md-block">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text">Start Date</span>
                                            <input type="text" id="from" name="from" value="{{ request()->get('from') }}" class="form-control">
                                            <span class="input-group-text">End Date</span>
                                            <input type="text" id="to" name="to" value="{{ request()->get('to') }}" class="form-control">
                                            <x-button class="input-group-text btn-sm">
                                                <x-icon.search></x-icon.search>Search
                                            </x-button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-5 offset-md-1 offset-lg-2">
                                    <!-- Text Search Large Screen -->
                                    <div class="d-none d-md-block">
                                        <div class="input-group">
                                            <x-input name="search" value="{{ request()->get('search') }}" class="form-control-sm" placeholder="Type something..."></x-input>
                                            <x-button class="btn-sm">
                                                <x-icon.search></x-icon.search>Search
                                            </x-button>

                                            <x-link href="{{ route('raw.live.c2c.index') }}" class="btn btn-sm btn-info">
                                                <x-icon.refresh></x-icon.refresh>Reset
                                            </x-link>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <!-- Small Screen -->
                            <form class="row" autocomplete="off">
                                <!-- Date Search Small Screen -->
                                <div class="d-md-none">
                                    <div class="input-group input-group-sm mb-2">
                                        <span class="input-group-text">Start Date</span>
                                        <input type="text" id="from_ss" name="from" value="{{ request()->get('from') }}" class="form-control">
                                    </div>
                                    <div class="input-group input-group-sm mb-2">
                                        <span class="input-group-text">End Date</span>
                                        <input type="text" id="to_ss" name="to" value="{{ request()->get('to') }}" class="form-control">
                                    </div>
                                    <x-button class="input-group-text btn-sm w-100">
                                        <x-icon.search></x-icon.search>Search
                                    </x-button>
                                </div>

                                <div class="hr d-md-none"></div>

                                <!-- Text Search Small Screen -->
                                <div class="d-md-none">
                                    <div class="input-group">
                                        <x-input name="search" value="{{ request()->get('search') }}" class="form-control-sm mb-2" placeholder="Type something..."></x-input>
                                    </div>
                                    <x-button class="btn-sm w-100 mb-2">
                                        <x-icon.search></x-icon.search>Search
                                    </x-button>

                                    <x-link href="{{ route('raw.live.c2c.index') }}" class="btn btn-sm btn-info w-100">
                                        <x-icon.refresh></x-icon.refresh>Reset
                                    </x-link>
                                </div>

                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-sm card-table table-vcenter text-nowrap datatable">
                                <thead>
                                <tr>
                                    <th class="w-1">
                                        <input class="form-check-input m-0 align-middle"
                                               type="checkbox" aria-label="Select all invoices">
                                    </th>
                                    <th class="w-1">No.</th>
                                    <th>dd</th>
                                    <th>supervisor</th>
                                    <th>rso</th>
                                    <th>retailer</th>
                                    <th>date</th>
                                    <th>amount</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse( $c2cs as $sl => $c2c )
                                    <tr>
                                        <td>
                                            <input class="form-check-input m-0 align-middle" type="checkbox"
                                                   aria-label="Select invoice">
                                        </td>
                                        <td><span class="text-muted">{{ ++$sl }}</span></td>
                                        <td data-label="Title">
                                            <div>{{ $c2c->ddHouse->name }}</div>
                                            <div class="text-muted">{{ $c2c->ddHouse->code }}</div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $c2c->supervisor->user->name }}</div>
                                            <div class="text-muted">{{ $c2c->supervisor->pool_number }}</div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $c2c->rso->user->name }}</div>
                                            <div class="text-muted">{{ $c2c->rso->itop_number }}</div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $c2c->retailer->retailer_name }}</div>
                                            <div class="text-muted">{{ $c2c->retailer->retailer_code }}</div>
                                        </td>
                                        <td>{{ $c2c->date->toFormattedDateString() }}</td>
                                        <td>{{ $c2c->amount }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>No C2C data found</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer d-flex align-items-center">
                            {{ $c2cs->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>

                    @if( auth()->user()->role == 'super-admin' )
                        <div class="mt-3 d-flex justify-content-between align-items-center">
                            @if( $c2cs->count() > 1 )
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete_all_c2c">Delete All</button>
                                @include('reports.back.c2c.modals.delete-all-live-c2c')
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            $( function() {
                var to = $( "#to" ).datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    changeYear: true,
                    numberOfMonths: 1
                })
                    .on( "change", function() {
                        from.datepicker( "option", "maxDate", getDate( this ) );
                    });
                var dateFormat = "mm/dd/yy",
                    from = $("#from")
                        .datepicker({
                            defaultDate: "+1w",
                            changeMonth: true,
                            changeYear: true,
                            numberOfMonths: 1
                        })
                        .on("change", function () {
                            to.datepicker("option", "minDate", getDate(this));
                        });

                function getDate( element ) {
                    var date;
                    try {
                        date = $.datepicker.parseDate( dateFormat, element.value );
                    } catch( error ) {
                        date = null;
                    }

                    return date;
                }
            } );
        </script>

        <!-- Small Screen -->
        <script>
            $( function() {
                var to = $( "#to_ss" ).datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    changeYear: true,
                    numberOfMonths: 1
                })
                    .on( "change", function() {
                        from.datepicker( "option", "maxDate", getDate( this ) );
                    });
                var dateFormat = "mm/dd/yy",
                    from = $("#from_ss")
                        .datepicker({
                            defaultDate: "+1w",
                            changeMonth: true,
                            changeYear: true,
                            numberOfMonths: 1
                        })
                        .on("change", function () {
                            to.datepicker("option", "minDate", getDate(this));
                        });

                function getDate( element ) {
                    var date;
                    try {
                        date = $.datepicker.parseDate( dateFormat, element.value );
                    } catch( error ) {
                        date = null;
                    }

                    return date;
                }
            } );
        </script>
    @endpush
</x-main>
