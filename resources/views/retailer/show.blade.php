<x-main>

    <!-- Main Title -->
    <x-slot:title>View Informations</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>View</x-slot:page-pre-title>

    <!-- Page Title -->
    <x-slot:page-title>Informations</x-slot:page-title>

    <!-- Page title actions -->
    <x-slot:button>
        <!-- [Full Button]-->
        <x-link href="{{ route('retailer.index') }}" class="btn btn-primary">
            <x-icon.back></x-icon.back>Dashboard
        </x-link>
    </x-slot:button>

    <x-slot:icon-button>
        <!-- [Icon Button]-->
        <x-link href="{{ route('retailer.index') }}" class="btn btn-primary btn-icon">
            <x-icon.back></x-icon.back>
        </x-link>
    </x-slot:icon-button>

    <!-- Page Body -->
    <div class="page-body">
        <div class="container-fluid">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="avatar avatar-md" style="background-image: url({{ asset( isset($retailer->user->image) ?? $retailer->user->image ) }})"></span>
                                    </div>
                                    <div class="col">
                                        <h2 class="page-title">{{ $retailer->retailer_name }}</h2>
                                        <div class="page-subtitle">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <x-icon.alert-circle></x-icon.alert-circle>
                                                    {{ $retailer->retailer_code }}
                                                </div>
                                                <div class="col-auto">
                                                    <x-icon.warehouse></x-icon.warehouse>
                                                    {{ $retailer->ddHouse->name }}
                                                </div>
                                                <div class="col-auto">
                                                    <!-- SVG icon code -->
                                                    <span class="text-reset">LSO {{ $retailer->sim_seller == 'Y' ? '| SSO' : '' }}</span>
                                                </div>
                                                <div class="col-auto text-success">
                                                    <!-- SVG icon code with class="text-green" -->
                                                    Verified
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto d-none d-md-flex">
                                        <x-link href="" class="btn btn-primary">
                                            <x-icon.edit></x-icon.edit>Edit
                                        </x-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-main>
