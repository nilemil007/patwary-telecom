<?php

namespace App\Http\Controllers;

use App\Imports\Reports\C2SImport;
use App\Models\Reports\C2S;
use App\Models\Rso;
use App\Models\Supervisor;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class C2SController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index( Request $request ): View|Factory|Application
    {
        if ( !empty($request->input('from')) && !empty($request->input('to')) )
        {
            $from = Carbon::parse( $request->input('from') )->toDateString();
            $to = Carbon::parse( $request->input('to') )->endOfDay();

            return view('reports.back.c2s.index',[
                'c2ss' => C2S::with('ddHouse','rso','supervisor','retailer')
                    ->whereBetween('date', [$from, $to])
                    ->paginate(10000),
            ]);
        }elseif( $request->input('search') ){
            return view('reports.back.c2c.index',[
                'c2ss' => C2S::with('ddHouse','rso','supervisor','retailer')
                    ->search( $request->search )
                    ->paginate(10000),
            ]);
        }else{
            switch ( Auth::user()->role ){
                case 'super-admin';
                    $c2ss = C2S::with('ddHouse','rso','supervisor','retailer')
                        ->latest()
                        ->paginate(5);
                    break;

                case 'supervisor';
                    $supervisorId = Supervisor::firstWhere('user_id', Auth::id())->id;
                    $c2ss = C2S::with('ddHouse','rso','supervisor','retailer')
                        ->where('supervisor_id', $supervisorId)
                        ->latest()
                        ->paginate(5);
                    break;

                case 'rso';
                    $rsoId = Rso::firstWhere('user_id', Auth::id())->id;
                    $c2ss = C2S::with('ddHouse','rso','supervisor','retailer')
                        ->where('supervisor_id', $rsoId)
//                        ->search( $request->search )
                        ->latest()
                        ->paginate(5);
                    break;
            }

            return view('reports.back.c2s.index', compact('c2ss'));
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
     * @param C2S $c2S
     * @return \Illuminate\Http\Response
     */
    public function show(C2S $c2S)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param C2S $c2S
     * @return \Illuminate\Http\Response
     */
    public function edit(C2S $c2S)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param C2S $c2S
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, C2S $c2S)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return RedirectResponse
     */
    public function destroy(): RedirectResponse
    {
        C2S::truncate();
        return redirect()->route('c2s.index')->with('success', 'All C2S deleted successfully.');
    }

    // Import
    public function import( Request $request ): RedirectResponse
    {
        Excel::import( new C2SImport, $request->file('import_c2s'));

        return redirect()->route('c2s.index')->with('success', 'C2S imported successfully.');
    }
}