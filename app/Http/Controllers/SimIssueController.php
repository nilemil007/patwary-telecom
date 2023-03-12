<?php

namespace App\Http\Controllers;

use App\Imports\Reports\SimIssueImport;
use App\Models\Reports\SimIssue;
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

class SimIssueController extends Controller
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

            return view('reports.back.sim-issue.index',[
                'simIssues' => SimIssue::with('ddHouse','rso','supervisor','retailer')
                    ->whereBetween('issue_date', [$from, $to])
                    ->paginate(1000),
            ]);
        }elseif( $request->input('search') ){
            return view('reports.back.sim-issue.index',[
                'simIssues' => SimIssue::with('ddHouse','rso','supervisor','retailer')
                    ->search( $request->search )
                    ->paginate(1000),
            ]);
        }else{
            switch ( Auth::user()->role ){
                case 'super-admin';
                    $simIssues = SimIssue::with('ddHouse','rso','supervisor','retailer')
//                        ->search( $request->search )
                        ->latest()
                        ->paginate(5);
                    break;

                case 'supervisor';
                    $supervisorId = Supervisor::firstWhere('user_id', Auth::id())->id;
                    $simIssues = SimIssue::with('ddHouse','rso','supervisor','retailer')
                        ->where('supervisor_id', $supervisorId)
//                        ->search( $request->search )
                        ->latest()
                        ->paginate(5);
                    break;

                case 'rso';
                    $rsoId = Rso::firstWhere('user_id', Auth::id())->id;
                    $simIssues = SimIssue::with('ddHouse','rso','supervisor','retailer')
                        ->where('supervisor_id', $rsoId)
//                        ->search( $request->search )
                        ->latest()
                        ->paginate(5);
                    break;
            }

            return view('reports.back.sim-issue.index', compact('simIssues'));
        }
    }


    /**
     * Display the specified resource.
     *
     * @param SimIssue $simIssue
     * @return \Illuminate\Http\Response
     */
    public function show(SimIssue $simIssue)
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
        SimIssue::truncate();
        return redirect()->route('sim-issue.index')->with('success', 'All Sim Issue data deleted successfully.');
    }

    // Import
    public function import( Request $request ): RedirectResponse
    {
        Excel::import( new SimIssueImport, $request->file('issue_sim'));

        return redirect()->route('sim-issue.index')->with('success', 'Sim Issue data imported successfully.');
    }
}
