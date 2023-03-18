<x-main>

    <!-- Main Title -->
    <x-slot:title>DSO</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>Overview</x-slot:page-pre-title>

    <!-- Page Title -->
    <x-slot:page-title>DSO</x-slot:page-title>

    <!-- Page title actions -->
    <x-slot:button>
        <!-- [Full Button]-->
        <form action="{{ route('raw.dso.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group">
                <input name="import_dso" type="file"
                       accept=".xls,.xlsx"
                       class="form-control" required>

                <x-button class="btn-outline-google">
                    <x-icon.file-import></x-icon.file-import>Import
                </x-button>
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
                                    <th>day</th>
                                    <th>amount</th>
                                    <th>eligibility</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse( $dsos as $sl => $dso )
                                    <tr>
                                        <td>
                                            <input class="form-check-input m-0 align-middle" type="checkbox"
                                                   aria-label="Select invoice">
                                        </td>
                                        <td><span class="text-muted">{{ ++$sl }}</span></td>
                                        <td data-label="Title">
                                            <div>{{ $dso->ddHouse->name }}</div>
                                            <div class="text-muted">{{ $dso->ddHouse->code }}</div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $dso->supervisor->user->name }}</div>
                                            <div class="text-muted">{{ $dso->supervisor->pool_number }}</div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $dso->rso->user->name }}</div>
                                            <div class="text-muted">{{ $dso->rso->itop_number }}</div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $dso->retailer->retailer_name }}</div>
                                            <div class="text-muted">{{ $dso->retailer->retailer_code }}</div>
                                        </td>
                                        <td>{{ $dso->day }}</td>
                                        <td>{{ $dso->amount }}</td>
                                        <td>{{ $dso->eligibility }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>No dso data found</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer d-flex align-items-center">
                            {{ $dsos->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>

                    @if( auth()->user()->role == 'super-admin' )
                        <div class="mt-3 d-flex justify-content-between align-items-center">
                            @if( $dsos->count() > 1 )
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete_all_dso">Delete All</button>
                                @include('reports.back.dso.modals.delete-all')
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-main>
