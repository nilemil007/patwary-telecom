<?php

namespace App\Http\Controllers;

use App\Exports\BtsExport;
use App\Http\Requests\BtsUpdateRequest;
use App\Imports\BtsImport;
use App\Models\Bts;
use App\Models\DdHouse;
use App\Services\BtsService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Throwable;

class BtsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        return view('bts.index', [
            'allBts' => Bts::with('ddHouse')
                ->orderBy('thana','asc')
                ->search( $request->search )
                ->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Excel::import(new BtsImport, '');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Bts $bt
     * @return \Illuminate\Http\Response
     */
    public function show(Bts $bt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Bts $bt
     * @return Application|Factory|View
     */
    public function edit(Bts $bt): View|Factory|Application
    {
        return view('bts.edit', ['bts' => $bt, 'houses' => DdHouse::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BtsUpdateRequest $request
     * @param Bts $bt
     * @return RedirectResponse
     */
    public function update(BtsUpdateRequest $request, Bts $bt): RedirectResponse
    {
        $bt->update( $request->validated() );

        return redirect()->route('bts.index')->with('success', 'BTS data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Bts $bt
     * @return RedirectResponse
     * @throws Throwable
     */
    public function destroy(Bts $bt): RedirectResponse
    {
        $bt->deleteOrFail();
        return redirect()->route('bts.index')->with('success', 'BTS deleted successfully.');
    }




    // Import BTS Data
    public function import( Request $request ): RedirectResponse
    {
        Excel::import( new BtsImport, $request->file('import_bts'));

        return redirect()->route('bts.index')->with('success', 'BTS list added successfully.');
    }

    // Export BTS Data
    public function export(): BinaryFileResponse
    {
        return Excel::download( new BtsExport, 'Bts List.xlsx' );
    }

    // Delete All BTS
    public function deleteAllBts(): RedirectResponse
    {
        DB::table('bts')->delete();
        return redirect()->route('bts.index')->with('success', 'All BTS deleted successfully.');
    }
}
