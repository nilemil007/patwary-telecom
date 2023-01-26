<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        return view('permission.index', [
            'permissions' => Permission::Where('name', 'like', "%".$request->search."%")->latest()->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required'],
        ]);

        if ( Permission::create( $request->all() ) )
        {
            Session::flash('success', 'New permission created successfully.');
        }else{
            Session::flash('error', 'Permission creation failed.');
        }

        return redirect()->route('permission.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id): View|Factory|Application
    {
        $permission = Permission::findById( $id );
        return view('permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => ['required'],
        ]);

        $permission = Permission::findById( $id );

        if ( $permission->update( $request->all() ) )
        {
            Session::flash('success', 'Permission updated successfully.');
        }else{
            Session::flash('error', 'Permission update failed.');
        }

        return redirect()->route('permission.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        if ( Permission::findById( $id )->delete() )
        {
            Session::flash('success', 'Permission deleted successfully.');
        }else{
            Session::flash('error', 'Permission delete failed.');
        }

        return redirect()->route('permission.index');
    }
}
