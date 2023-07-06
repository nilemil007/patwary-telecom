<?php

namespace App\Http\Controllers;

use App\Http\Requests\DdHouseStoreRequest;
use App\Http\Requests\DdHouseUpdateRequest;
use App\Imports\Reports\House\HouseImport;
use App\Models\DdHouse;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class DdHouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('dd-house.index',[
            'dds' => DdHouse::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('dd-house.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DdHouseStoreRequest $request
     * @return RedirectResponse
     */
    public function store(DdHouseStoreRequest $request): RedirectResponse
    {
        if ( DdHouse::create( $request->all() ) )
        {
            Session::flash('success', 'New DD House created successfully.');
        }else{
            Session::flash('error', 'DD House creation failed.');
        }

        return redirect()->route('dd-house.index');
    }

    /**
     * Display the specified resource.
     *
     * @param DdHouse $ddHouse
     * @return Response
     */
    public function show(DdHouse $ddHouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param DdHouse $ddHouse
     * @return Application|Factory|View
     */
    public function edit(DdHouse $ddHouse): View|Factory|Application
    {
        return view('dd-house.edit', compact('ddHouse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DdHouseUpdateRequest $request
     * @param DdHouse $ddHouse
     * @return RedirectResponse
     */
    public function update(DdHouseUpdateRequest $request, DdHouse $ddHouse): RedirectResponse
    {
       $update = $ddHouse->update( $request->except('_token','_method') );

        if ( $update )
        {
            Session::flash('success', 'DD House updated successfully.');
        }else{
            Session::flash('success', 'DD House not updated.');
        }

        return redirect()->route('dd-house.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DdHouse $ddHouse
     * @return RedirectResponse
     */
    public function destroy(DdHouse $ddHouse): RedirectResponse
    {
        if ( $ddHouse->delete() )
        {
            Session::flash('success', 'DD House deleted successfully.');
        }else{
            Session::flash('success', 'DD House not deleted.');
        }

        return redirect()->route('dd-house.index');
    }

    // Import
    public function import( Request $request ): RedirectResponse
    {
        Excel::import( new HouseImport(), $request->file('import_houses'));

        return redirect()->route('dd-house.index')->with('success', 'New house created successfully.');
    }
}
