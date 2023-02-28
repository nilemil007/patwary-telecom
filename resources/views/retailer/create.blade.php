<x-main>

    <!-- Main Title -->
    <x-slot:title>Create New Retailer</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>Create</x-slot:page-pre-title>

    <!-- Page Title -->
    <x-slot:page-title>New Retailer</x-slot:page-title>

    <!-- Page title action button -->
    <x-slot:button>
        <x-link href="{{ route('retailer.index') }}" class="btn btn-primary">
            <x-icon.back></x-icon.back>All Retailers
        </x-link>
    </x-slot:button>

    <x-slot:icon-button>
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
                            <form action="{{ route('retailer.store') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="row">

                                    <!-- Assign User -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-select name="user_id" label="User" placeholder>
                                                @foreach( $users as $user )
                                                    <option value="{{ $user->id }}">
                                                        {{ $user->ddHouse->code }} - {{ $user->name }}
                                                    </option>
                                                @endforeach
                                            </x-select>
                                        </div>
                                    </div>

                                    <!-- DD House -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-select name="dd_house_id" star="*" label="DD House" placeholder required>
                                                @foreach( $houses as $house )
                                                    <option value="{{ $house->code }}">
                                                        {{ $house->code.'-'.$house->name }}
                                                    </option>
                                                @endforeach
                                            </x-select>
                                        </div>
                                    </div>

                                    <!-- Rso -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-select name="rso_id" label="Rso" star="*" placeholder required>
                                                @foreach( $rsos as $rso )
                                                    <option value="{{ $rso->itop_number }}">
                                                        {{ $rso->itop_number }} - {{ $rso->user->name }}
                                                    </option>
                                                @endforeach
                                            </x-select>
                                        </div>
                                    </div>

                                    <!-- Retailer Code -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Retailer Code" star="*" name="retailer_code" placeholder required></x-input>
                                        </div>
                                    </div>

                                    <!-- Itop Number -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <x-input label="Itop Number" star="*" name="itop_number" placeholder required></x-input>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-primary w-100 d-md-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus"
                                             width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                             fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                        Create retailer
                                    </button>
                                    <button type="submit" class="btn btn-primary d-none d-md-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus"
                                             width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                             fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                        Create retailer
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main>
