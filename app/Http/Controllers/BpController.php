<?php

namespace App\Http\Controllers;

use App\Http\Requests\BpUpdateRequest;
use App\Models\Bp;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class BpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index( Request $request ): Application|Factory|View
    {
        return view('bp.index', [
            'bps' => Bp::latest()->search( $request->search )->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Bp $bp
     * @return Response
     */
    public function show(Bp $bp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Bp $bp
     * @return Application|Factory|View
     */
    public function edit(Bp $bp): View|Factory|Application
    {
        return view('bp.edit', compact('bp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BpUpdateRequest $request
     * @param Bp $bp
     * @return RedirectResponse
     */
    public function update(BpUpdateRequest $request, Bp $bp): RedirectResponse
    {
        if ( $bp->update( $request->validated() ) )
        {
            return redirect()->route('bp.index')->with('success','BP information updated successfully.');
        }

        return redirect()->route('bp.index')->with('error','BP information not updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Bp $bp
     * @return Response
     */
    public function destroy(Bp $bp)
    {
        //
    }

    // Additional Method
    public function export(): BinaryFileResponse
    {
//        return Excel::download( new ItopReplaceExport, 'itop-replaces.xlsx' );
    }
}
