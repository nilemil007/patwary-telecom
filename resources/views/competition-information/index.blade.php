<x-main>

    <!-- Main Title -->
    <x-slot:title>Other's Operator Info</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>Overview</x-slot:page-pre-title>

    <!-- Page Title -->
    <x-slot:page-title>Other's Operator Information</x-slot:page-title>

    <!-- Page title actions -->
    <x-slot:button>
        <!-- [Full Button]-->
        <x-link href="{{ route('others-operator-information.create') }}" class="btn btn-primary">
            <x-icon.plus></x-icon.plus>Create new entry
        </x-link>
    </x-slot:button>

    <x-slot:icon-button>
        <!-- [Icon Button]-->
        <x-link href="{{ route('others-operator-information.create') }}" class="btn btn-primary btn-icon">
            <x-icon.plus></x-icon.plus>
        </x-link>
    </x-slot:icon-button>

    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        {{--                            <div class="card-header">--}}
                        <form class="row row-cols-lg-auto justify-content-center align-items-end p-3">
                            <div class="col-12 mb-3">
                                <div class="form-group">
                                    <label class="form-label">Start Date</label>
                                    <input name="start_date"
                                           value="{{ request()->get('start_date') }}"
                                           type="date" class="form-control form-control-sm"
                                           placeholder="Select a date">
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <div class="form-group">
                                    <label class="form-label">End Date</label>
                                    <input name="end_date"
                                           value="{{ request()->get('end_date') }}"
                                           type="date" class="form-control form-control-sm" placeholder="Select a date">
                                </div>
                            </div>

                            <div class="col-md-4 col-12 mb-3">
                                <button type="submit" class="btn btn-sm btn-primary w-100 d-md-none">
                                    Search
                                </button>
                                <button type="submit" class="btn btn-sm btn-primary d-none d-md-block">
                                    Search
                                </button>
                            </div>
                        </form>
                        <hr class="m-0">
                        {{--                            </div>--}}

                        <div class="card-body border-bottom py-3">
                            <div class="d-flex">
                                <div class="text-muted">
                                    Show
                                    <div class="mx-2 d-inline-block">
                                        <input type="text" class="form-control form-control-sm" value="8" size="3" aria-label="Invoices count">
                                    </div>
                                    entries
                                </div>
                                <div class="ms-auto text-muted">
                                    Search:
                                    <div class="ms-2 d-inline-block">
                                        <form action="" method="GET">
                                            <input type="text" name="search" value="{{ request()->get('search') }}" class="form-control form-control-sm" aria-label="Search invoice">
                                        </form>
                                    </div>
                                </div>
                            </div>
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
                                    <th>cluster | region</th>
                                    <th>dd | retailer code</th>
                                    <th>rso | retailer number</th>
                                    <th>bl c2s</th>
                                    <th>gp c2s</th>
                                    <th>robi c2s</th>
                                    <th>airtel c2s</th>
                                    <th>bl ga</th>
                                    <th>gp ga</th>
                                    <th>robi ga</th>
                                    <th>airtel ga</th>
                                    <th>created at</th>
                                    <th>last update</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>

                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer d-flex align-items-center">
{{--                            {{ $competitions->links('vendor.pagination.bootstrap-5') }}--}}
                        </div>
                    </div>

{{--                        @if( count($competitions) > 0 )--}}
{{--                            <div class="mt-3">--}}
{{--                                <a class="btn btn-sm btn-success" href="{{ route('competition.information.export') }}">Export Excel</a>--}}
{{--                            </div>--}}
{{--                        @endif--}}

                </div>
            </div>
        </div>
    </div>
</x-main>
