<x-main>

    <!-- Main Title -->
    <x-slot:title>Dashboard</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>Overview</x-slot>

    <!-- Page Title -->
    <x-slot:page-title>Dashboard</x-slot:page-title>
    <hr>

    <div class="page-body">
        <div class="container-fluid">
            <!-- Itop Replace -->
            <div class="row mb-4">
                <div class="col-md-12">
                    <h3 class="m-0">Itop Replace</h3>
                    <div class="table-responsive">
                    <table class="table table-sm table-bordered">
                        <thead>
                        <tr class="text-center">
                            <th scope="col">Total</th>
                            <th scope="col">Pending</th>
                            <th scope="col">Processing</th>
                            <th scope="col">Completed</th>
                            <th scope="col">Paid</th>
                            <th scope="col">Due</th>
                            <th scope="col">Unapproved</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="text-center">
                            <td>
                                <!-- Total Itop Replace -->
                                @if( $role == 'super-admin' )
                                    {{ $replace->count()}}
                                @else
                                    {{ $replace->where('user_id', $authId)->count()}}
                                @endif
                            </td>
                            <td>
                                <!-- Pending Itop Replace -->
                                @if( $role == 'super-admin' )
                                    {{ $replace->where('status','pending')->count()}}
                                @else
                                    {{ $replace->where('user_id', $authId)->where('status','pending')->count() }}
                                @endif
                            </td>
                            <td>
                                <!-- Processing Itop Replace -->
                                @if( $role == 'super-admin' )
                                    {{ $replace->where('status','processing')->count()}}
                                @else
                                    {{ $replace->where('user_id', $authId)->where('status','processing')->count()}}
                                @endif
                            </td>
                            <td>
                                <!-- Completed Itop Replace -->
                                @if( $role == 'super-admin' )
                                    {{ $replace->where('status','complete')->count()}}
                                @else
                                    {{ $replace->where('user_id', $authId)->where('status','complete')->count()}}
                                @endif
                            </td>
                            <td>
                                <!-- Paid Itop Replace -->
                                @if( $role == 'super-admin' )
                                    {{ $replace->where('status','paid')->count()}}
                                @else
                                    {{ $replace->where('user_id', $authId)->where('status','paid')->count()}}
                                @endif
                            </td>
                            <td>
                                <!-- Due Itop Replace -->
                                @if( $role == 'super-admin' )
                                    {{ $replace->where('status','due')->count()}}
                                @else
                                    {{ $replace->where('user_id', $authId)->where('status','due')->count()}}
                                @endif
                            </td>
                            <td>
                                <!-- Unapproved-->
                                @if( $role == 'super-admin' )
                                    {{ $replace->where('remarks','Unapproved')->count()}}
                                @else
                                    {{ $replace->where('user_id', $authId)->where('remarks','Unapproved')->count()}}
                                @endif
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-main>
