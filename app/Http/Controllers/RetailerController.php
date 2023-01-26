<?php

namespace App\Http\Controllers;

use App\Imports\RetailersImport;
use App\Models\Retailer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class RetailerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        $role = Auth::user()->role;
        $authId = Auth::id();
        $retailer = Retailer::all();

        if ( Auth::user()->role == 'super-admin' )
        {
            $retailers = Retailer::latest()
                ->search( $request->search )
                ->paginate(5);
        }else{
            $retailers = Retailer::latest()
                ->search( $request->search )
                ->paginate(5);
        }

        return view('retailer.index', compact('retailers', ['role','authId','retailer']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('retailer.create', [
            'users' => User::all(),
            'allBts' => [],
            'routes' => [],
            'houses' => [],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    // Additional Method
    public function export()
    {
//        return Excel::download( new ItopReplaceExport, 'itop-replaces.xlsx' );
    }

    public function import( Request $request ): RedirectResponse
    {
        Excel::import( new RetailersImport, $request->file('import_retailers'));

        return redirect()->route('retailer.index')->with('success', 'New retailer created successfully.');
    }
}
