<?php

namespace App\Http\Controllers;

use App\Imports\Reports\ActivationImport;
use App\Models\Reports\Activation;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ActivationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index( Request $request ): Application|Factory|View
    {
        if ( !empty($request->input('start_date')) && !empty($request->input('end_date')) )
        {
            $sdate =  $request->input('start_date');
            $edate =  $request->input('end_date');

            return view('activation.index',[
                'activations' => Activation::with('user','rso')
                    ->search( $request->search )
                    ->whereBetween('created_at', [$sdate, Carbon::parse( $edate )->endOfDay()])
                    ->latest()
                    ->paginate(5),
            ]);
        }else{
            if ( Auth::user()->role == 'super-admin' )
            {
                $activations = Activation::with('user')
                    ->search( $request->search )
                    ->latest()
                    ->paginate(5);
            }else{
                $activations = Activation::with('user')
                    ->where('user_id', Auth::id())
                    ->search( $request->search )
                    ->latest()
                    ->paginate(5);
            }

            return view('reports.back.index', compact('activations'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Reports\Activation  $activation
     * @return \Illuminate\Http\Response
     */
    public function show(Activation $activation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reports\Activation  $activation
     * @return \Illuminate\Http\Response
     */
    public function edit(Activation $activation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reports\Activation  $activation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activation $activation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reports\Activation  $activation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activation $activation)
    {
        //
    }

    // Import
    public function import( Request $request ): RedirectResponse
    {
        Excel::import( new ActivationImport, $request->file('import_activation'));

        return redirect()->route('activation.index')->with('success', 'Activation imported successfully.');
    }
}
