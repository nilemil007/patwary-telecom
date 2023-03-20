<x-main>

    <!-- Main Title -->
    <x-slot:title>Sim Inventory</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>Overview</x-slot:page-pre-title>

    <!-- Page Title -->
    <x-slot:page-title>Sim Inventory</x-slot:page-title>

    <!-- Page title actions -->
    <x-slot:button>
        <!-- [Full Button]-->
        <form action="{{ route('raw.sim.inventory.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group">
                <input name="import_sim_inventory" type="file"
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
                                    <th>product name|code</th>
                                    <th>lifting price</th>
                                    <th>sim serial</th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse( $inventory as $sl => $sim )
                                    <tr>
                                        <td>
                                            <input class="form-check-input m-0 align-middle" type="checkbox"
                                                   aria-label="Select invoice">
                                        </td>
                                        <td><span class="text-muted">{{ ++$sl }}</span></td>
                                        <td data-label="Title">
                                            <div>{{ $sim->ddHouse->name }}</div>
                                            <div class="text-muted">{{ $sim->ddHouse->code }}</div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $sim->product_name }}</div>
                                            <div class="text-muted">{{ $sim->product_code }}</div>
                                        </td>
                                        <td>{{ $sim->sim_serial }}</td>
                                        <td>{{ $sim->lifting_price }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>No sim inventory data found</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer d-flex align-items-center">
                            {{ $inventory->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>

                    @if( auth()->user()->role == 'super-admin' )
                        <div class="mt-3 d-flex justify-content-between align-items-center">
                            @if( $inventory->count() > 1 )
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete_all_sim_inventory">Delete All</button>
                                @include('reports.back.inventory.sim.modals.delete-all')
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-main>
