<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Imports\User\UsersImport;
use App\Models\DdHouse;
use App\Models\ItopReplace;
use App\Models\User;
use import\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;

class CreateNewUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        return view('create-users.index',[
            'users' => User::with('ddHouse','rso','supervisor','bp','merchandiser')
                ->search( $request->search )
                ->latest()
                ->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('create-users.create',[
            'houses'    => DdHouse::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRegisterRequest $request
     * @return RedirectResponse
     */
    public function store(UserRegisterRequest $request): RedirectResponse
    {
        ( new UserService() )->store( $request );

        return redirect()->route('create-new-user.index')->with('success','User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id): View|Factory|Application
    {
        $user = User::find($id);
        $houses = DdHouse::all();

        return view('create-users.edit', compact('user','houses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(UserUpdateRequest $request, $id): RedirectResponse
    {
        ( new UserService() )->update( $request, $id );

        return redirect()->route('create-new-user.index')->with('success','User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy( $id ): RedirectResponse
    {
        $user = User::findOrFail( $id );

        if ( $user->delete() )
        {
            File::delete( $user->image );
            $user->removeRole($user->role);

            Session::flash('success', 'User deleted successfully.');
        }else{
            Session::flash('success', 'User not deleted.');
        }

        return redirect()->route('create-new-user.index');
    }

    // Import
    public function import( Request $request ): RedirectResponse
    {
        Excel::import( new UsersImport(), $request->file('import_users'));

        return redirect()->route('create-new-user.index')->with('success', 'New user created successfully.');
    }
}
