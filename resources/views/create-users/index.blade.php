<x-main>

    <!-- Main Title -->
    <x-slot:title>All User's</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>Overview</x-slot:page-pre-title>

    <!-- Page Title -->
    <x-slot:page-title>All User's</x-slot:page-title>

    <!-- Page title action button -->
    <x-slot:button>
        <!-- Import button -->
        <form action="{{ route('user.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group">
                <input name="import_users" type="file"
                       accept=".xls,.xlsx"
                       class="form-control"
                       aria-label="Upload" required>

                <button class="btn btn-outline-google" type="submit">
                    <x-icon.file-import></x-icon.file-import>Import
                </button>
            </div>
        </form>

        <x-link href="{{ route('create-new-user.create') }}" class="btn btn-primary">
            <x-icon.plus></x-icon.plus>Create new user
        </x-link>
    </x-slot:button>

    <x-slot:icon-button>
        <x-link href="{{ route('create-new-user.create') }}" class="btn btn-primary btn-icon">
            <x-icon.plus></x-icon.plus>
        </x-link>
    </x-slot:icon-button>

    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body border-bottom py-3">
                            <div class="d-flex">
                                <div class="ms-auto text-muted">
                                    <div class="ms-2 d-inline-block">
                                        <form method="GET">
                                            <div class="input-group mb-3">
                                                <input type="text" name="search"
                                                       value="{{ request()->get('search') }}"
                                                       class="form-control form-control-sm"
                                                       placeholder="Type something...">
                                                <button class="btn btn-sm btn-primary"
                                                        type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <circle cx="10" cy="10" r="7"></circle>
                                                        <line x1="21" y1="21" x2="15" y2="15"></line>
                                                    </svg>
                                                    Search
                                                </button>
                                            </div>
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
                                    <th>Name</th>
                                    <th>Number</th>
                                    <th>Email</th>
                                    <th>DD House</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse( $users as $sl => $user )
                                <tr>
                                    <td>
                                        <input class="form-check-input m-0 align-middle" type="checkbox"
                                               aria-label="Select invoice">
                                    </td>
                                    <td><span class="text-muted">{{ ++$sl }}</span></td>
                                    <td>
                                        <div class="d-flex py-1 align-items-center">
                                            <span class="avatar me-2" style="background-image: url({{ $user->image }})"></span>
                                            <div class="flex-fill">
                                                <div class="font-weight-medium">{{ $user->name }}</div>
                                                <div class="text-muted">
                                                    <a href="#" class="text-reset">{{ $user->username }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @switch( $user->role )
                                            @case('rso')
                                                <div title="RS0 AC Number">{{ $user->rso->itop_number ?? '' }}</div>
                                                <div title="RS0 Code" class="text-muted">{{ $user->rso->code ?? '' }}</div>
                                            @break

                                            @case('supervisor')
                                            {{ empty($user->supervisor->pool_number)?'Not Assign':$user->supervisor->pool_number }}
                                            @break

                                            @case('bp')
                                            {{ empty($user->bp->pool_number)?'Not Assign':$user->bp->pool_number }}
                                            @break

                                            @case('tmo')
                                            {{ empty($user->merchandiser->pool_number)?'Not Assign':$user->merchandiser->pool_number }}
                                            @break

                                            @case('cm')
                                            {{ empty($user->merchandiser->pool_number)?'Not Assign':$user->merchandiser->pool_number }}
                                            @break
                                        @endswitch
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        {{ !empty($user->ddHouse->name)?$user->ddHouse->name:'' }}
                                    </td>
                                    <td>
                                        @if (!empty($user->role))
                                            @if( $user->role == 'super-admin' )
                                                <button class="btn btn-sm btn-pill btn-outline-success">
                                                    {{ \Illuminate\Support\Str::upper( implode(' ',explode('-',$user->role)) ) }}
                                                </button>
                                            @else
                                                <button class="btn btn-sm btn-pill btn-outline-success">
                                                    {{ \Illuminate\Support\Str::upper( $user->role ) }}
                                                </button>
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @switch( $user->status )
                                            @case( 1 )
                                            <span class="badge bg-success me-1"></span> Active
                                            @break

                                            @case( 0 )
                                            <span class="badge bg-danger me-1"></span> Inactive
                                            @break
                                        @endswitch
                                    </td>
                                    <td>
                                        <!-- Edit -->
                                        <a href="{{ route('create-new-user.edit', $user->id) }}"
                                           class="link-primary text-decoration-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" /><path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" /><line x1="16" y1="5" x2="19" y2="8" /></svg>
                                        </a>

                                        <!-- Delete -->
                                        <a href="#" class="link-danger text-decoration-none"
                                           data-bs-toggle="modal" data-bs-target="#del-user-{{ $user->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                        </a>
                                    </td>
                                    @include('create-users.modals.delete')
                                </tr>
                                @empty
                                    <tr>
                                        <td>No data found</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer d-flex align-items-center">
                            {{ $users->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main>
