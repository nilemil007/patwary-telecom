<x-main>

    <!-- Main Title -->
    <x-slot:title>FCD GA</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>Overview</x-slot:page-pre-title>

    <!-- Page Title -->
    <x-slot:page-title>
        FCD GA ({{ $activations->total() }})
    </x-slot:page-title>

    <!-- Page title actions -->
    <x-slot:button>
            <!-- [Full Button]-->
            <form action="{{ route('raw.fcd.ga.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group">
                    <input name="import_activation" type="file"
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
                                    <th>activation</th>
                                    <th>date</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse( $activations as $sl => $activation )
                                    <tr>
                                        <td>
                                            <input class="form-check-input m-0 align-middle" type="checkbox"
                                                   aria-label="Select invoice">
                                        </td>
                                        <td><span class="text-muted">{{ ++$sl }}</span></td>
                                        <td data-label="Title">
                                            <div>{{ $activation->ddHouse->name }}</div>
                                            <div class="text-muted">{{ $activation->ddHouse->code }}</div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $activation->supervisor->user->name }}</div>
                                            <div class="text-muted">{{ $activation->supervisor->pool_number }}</div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $activation->rso->user->name }}</div>
                                            <div class="text-muted">{{ $activation->rso->itop_number }}</div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $activation->retailer->retailer_name }}</div>
                                            <div class="text-muted">{{ $activation->retailer->retailer_code }}</div>
                                        </td>
                                        <td>{{ $activation->activation }}</td>
                                        <td>{{ $activation->date->toFormattedDateString() }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>No FCD GA data found</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer d-flex align-items-center">
                            {{ $activations->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>

                    @if( auth()->user()->role == 'super-admin' )
                        <div class="mt-3 d-flex justify-content-between align-items-center">
                            @if( $activations->count() > 1 )
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete_all_fcd_ga">Delete All</button>
                                @include('reports.back.activation.modals.fcd-ga-delete-all')
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-main>
