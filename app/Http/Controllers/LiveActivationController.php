<?php

namespace App\Http\Controllers;

use App\Imports\Reports\LiveActivationImport;
use App\Models\Reports\LiveActivation;
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

class LiveActivationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index( Request $request ): Application|Factory|View
    {
//        dd($request->all());
        if ( !empty($request->input('from')) && !empty($request->input('to')) )
        {
            $from = Carbon::parse( $request->input('from') )->toDateString();
            $to = Carbon::parse( $request->input('to') )->endOfDay();

            return view('reports.back.live-activation.index',[
                'activations' => \App\Models\Reports\Activation::with('ddHouse','rso','supervisor','retailer')
//                    ->search( $request->search )
                    ->whereBetween('activation_date', [$from, $to])
//                    ->latest()
                    ->paginate(5),
            ]);
        }else{
            switch ( Auth::user()->role ){
                case 'super-admin';
                    $activations = LiveActivation::with('ddHouse','rso','supervisor','retailer')
                        ->search( $request->search )
                        ->latest()
                        ->paginate(5);
                    break;

                case 'supervisor';
                    $supervisorId = Supervisor::firstWhere('user_id', Auth::id())->id;
                    $activations = LiveActivation::with('ddHouse','rso','supervisor','retailer')
                        ->where('supervisor_id', $supervisorId)
                        ->search( $request->search )
                        ->latest()
                        ->paginate(5);
                    break;

                case 'rso';
                    $rsoId = Rso::firstWhere('user_id', Auth::id())->id;
                    $activations = LiveActivation::with('ddHouse','rso','supervisor','retailer')
                        ->where('supervisor_id', $rsoId)
                        ->search( $request->search )
                        ->latest()
                        ->paginate(5);
                    break;
            }

            return view('reports.back.live-activation.index', compact('activations'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reports\LiveActivation  $liveActivation
     * @return \Illuminate\Http\Response
     */
    public function show(LiveActivation $liveActivation)
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
        LiveActivation::truncate();
        return redirect()->route('live-activation.index')->with('success', 'All activations deleted successfully.');
    }

    // Import
    public function import( Request $request ): RedirectResponse
    {
        Excel::import( new LiveActivationImport, $request->file('import_activation'));

        return redirect()->route('live-activation.index')->with('success', 'Activation imported successfully.');
    }
}
