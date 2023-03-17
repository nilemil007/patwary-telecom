<x-main>

    <!-- Main Title -->
    <x-slot:title>C2C - Secondary</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>Overview</x-slot:page-pre-title>

    <!-- Page Title -->
    <x-slot:page-title>
        C2C - Secondary
    </x-slot:page-title>

    <!-- Page title actions -->
    <x-slot:button>
        <!-- [Full Button]-->
        <form action="{{ route('raw.c2c.import') }}" method="POST" enctype="multipart/form-data">
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


    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
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
                                    <th>amount</th>
                                    <th>date</th>
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
                                        <td>{{ $c2c->amount }}</td>
                                        <td>{{ $c2c->date->toFormattedDateString() }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>No c2c data found</td>
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
                                @include('reports.back.c2c.modals.delete-all')
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
