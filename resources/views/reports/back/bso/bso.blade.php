<x-main>

    <!-- Main Title -->
    <x-slot:title>BSO</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>Overview</x-slot:page-pre-title>

    <!-- Page Title -->
    <x-slot:page-title>BSO</x-slot:page-title>

    <!-- Page title actions -->
    <x-slot:button>
        <!-- [Full Button]-->
        <form action="{{ route('raw.bso.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group">
                <input name="import_bso" type="file"
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
                                @forelse( $bsos as $sl => $bso )
                                    <tr>
                                        <td>
                                            <input class="form-check-input m-0 align-middle" type="checkbox"
                                                   aria-label="Select invoice">
                                        </td>
                                        <td><span class="text-muted">{{ ++$sl }}</span></td>
                                        <td data-label="Title">
                                            <div>{{ $bso->ddHouse->name }}</div>
                                            <div class="text-muted">{{ $bso->ddHouse->code }}</div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $bso->supervisor->user->name }}</div>
                                            <div class="text-muted">{{ $bso->supervisor->pool_number }}</div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $bso->rso->user->name }}</div>
                                            <div class="text-muted">{{ $bso->rso->itop_number }}</div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $bso->retailer->retailer_name }}</div>
                                            <div class="text-muted">{{ $bso->retailer->retailer_code }}</div>
                                        </td>
                                        <td>{{ $bso->day }}</td>
                                        <td>{{ $bso->amount }}</td>
                                        <td>{{ $bso->eligibility }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>No bso data found</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer d-flex align-items-center">
                            {{ $bsos->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>

                    @if( auth()->user()->role == 'super-admin' )
                        <div class="mt-3 d-flex justify-content-between align-items-center">
                            @if( $bsos->count() > 1 )
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete_all_bso">Delete All</button>
                                @include('reports.back.bso.modals.delete-all')
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-main>
