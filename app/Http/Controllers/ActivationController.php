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
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index( Request $request ): Application|Factory|View
    {
        if ( !empty($request->input('from')) && !empty($request->input('to')) )
        {
            $from = Carbon::parse( $request->input('from') )->toDateString();
            $to = Carbon::parse( $request->input('to') )->endOfDay();

            return view('reports.back.activation.index',[
                'activations' => Activation::with('ddHouse','rso','supervisor','retailer')
                    ->search( $request->search )
                    ->whereBetween('activation_date', [$from, $to])
                    ->latest()
                    ->paginate(5),
            ]);
        }else{
            if ( Auth::user()->role == 'super-admin' )
            {
                $activations = Activation::with('ddHouse','rso','supervisor','retailer')
                    ->search( $request->search )
                    ->latest()
                    ->paginate(5);
            }else{
                $activations = Activation::with('ddHouse','rso','supervisor','retailer')
                    ->where('user_id', Auth::id())
                    ->search( $request->search )
                    ->latest()
                    ->paginate(5);
            }

            return view('reports.back.activation.index', compact('activations'));
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
