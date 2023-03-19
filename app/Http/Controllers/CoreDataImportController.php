<?php

namespace App\Http\Controllers;

use App\Imports\Reports\EsafImport;
use App\Imports\Reports\Reports\ActivationImport;
use App\Imports\Reports\Reports\BalanceImport;
use App\Imports\Reports\Reports\BsoImport;
use App\Imports\Reports\Reports\C2cImport;
use App\Imports\Reports\Reports\C2sImport;
use App\Imports\Reports\Reports\DsoImport;
use App\Imports\Reports\Reports\FcdGaImport;
use App\Imports\Reports\Reports\LiveC2cImport;
use App\Imports\Reports\Reports\LiveActivationImport;
use App\Imports\Reports\Reports\LiveSimIssueImport;
use App\Imports\Reports\Reports\SimIssueImport;
use App\Models\Activation;
use App\Models\Balance;
use App\Models\Bso;
use App\Models\C2c;
use App\Models\C2s;
use App\Models\Dso;
use App\Models\Esaf;
use App\Models\FcdGa;
use App\Models\LiveActivation;
use App\Models\LiveC2c;
use App\Models\LiveSimIssue;
use App\Models\SimIssue;
use App\Services\ActivationService;
use App\Services\LiveActivationService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class CoreDataImportController extends Controller
{
    // Activation Index
    public function activationIndex(Request $request): Application|Factory|View
    {
        return view('reports.back.activation.index', [
            'activations' => Activation::with('ddHouse','rso','supervisor','retailer')
                ->latest()
                ->paginate(5)
        ]);
    }

    // Live Activation Index
    public function liveActivationIndex(Request $request): Application|Factory|View
    {
        return view('reports.back.activation.live-activation', [
            'activations' => LiveActivation::with('ddHouse','rso','supervisor','retailer')
                ->latest()
                ->paginate(5)
        ]);
    }

    // FCD GA Index
    public function fcdGaIndex(Request $request): Application|Factory|View
    {
        return view('reports.back.activation.fcd-ga', [
            'activations' => FcdGa::with('ddHouse','rso','supervisor','retailer')
                ->latest()
                ->paginate(5)
        ]);
    }

    // Activation Import
    public function activationImport(Request $request): RedirectResponse
    {
        Excel::import(new ActivationImport, $request->file('import_activation'));

        return redirect()->route('raw.activation')->with('success', 'Activation imported successfully.');
    }

    // Live Activation Import
    public function liveActivationImport(Request $request): RedirectResponse
    {
        Excel::import(new LiveActivationImport, $request->file('import_activation'));

        return redirect()->route('raw.live.activation')->with('success', 'Live activation imported successfully.');
    }

    // FCD GA Import
    public function fcdGaImport(Request $request): RedirectResponse
    {
        Excel::import(new FcdGaImport, $request->file('import_activation'));

        return redirect()->route('raw.fcd.ga')->with('success', 'FCD GA imported successfully.');
    }

    // Activation Delete All
    public function activationDestroy(): RedirectResponse
    {
        Activation::truncate();

        return redirect()->route('raw.activation')->with('success', 'Activation deleted successfully.');
    }

    // Live Activation Delete All
    public function liveActivationDestroy(): RedirectResponse
    {
        LiveActivation::truncate();

        return redirect()->route('raw.live.activation')->with('success', 'Live activation deleted successfully.');
    }

    // FCD GA Delete All
    public function fcdGaDestroy(): RedirectResponse
    {
        FcdGa::truncate();

        return redirect()->route('raw.fcd.ga')->with('success', 'FCD GA deleted successfully.');
    }


    ########################################## C2C #####################################################

    // C2C Index
    public function c2cIndex(Request $request): Application|Factory|View
    {
        return view('reports.back.c2c.c2c', [
            'c2cs' => C2c::with('ddHouse','rso','supervisor','retailer')
                ->latest()
                ->paginate(5),
        ]);
    }

    // Live C2C Index
    public function liveC2cIndex(Request $request): Application|Factory|View
    {
        return view('reports.back.c2c.live-c2c', [
            'c2cs' => LiveC2c::with('ddHouse','rso','supervisor','retailer')
                ->latest()
                ->paginate(5),
        ]);
    }

    // C2C Import
    public function c2cImport(Request $request): RedirectResponse
    {
        Excel::import(new C2cImport, $request->file('import_c2c'));

        return redirect()->route('raw.c2c')->with('success', 'C2C imported successfully.');
    }

    // Live C2C Import
    public function liveC2cImport(Request $request): RedirectResponse
    {
        Excel::import(new LiveC2cImport, $request->file('import_c2c'));

        return redirect()->route('raw.live.c2c')->with('success', 'Live C2C imported successfully.');
    }

    // C2C Delete All
    public function c2cDestroy(): RedirectResponse
    {
        C2c::truncate();
        return redirect()->route('raw.c2c')->with('success', 'C2C deleted successfully.');
    }

    // Live C2C Delete All
    public function liveC2cDestroy(): RedirectResponse
    {
        LiveC2c::truncate();
        return redirect()->route('raw.live.c2c')->with('success', 'Live C2C deleted successfully.');
    }



    ########################################## C2S #####################################################

    // C2S Index
    public function c2sIndex(Request $request): Application|Factory|View
    {
        return view('reports.back.c2s.c2s', [
            'c2s' => C2s::with('ddHouse','rso','supervisor','retailer')
                ->latest()
                ->paginate(5),
        ]);
    }

    // C2S Import
    public function c2sImport(Request $request): RedirectResponse
    {
        Excel::import(new C2sImport, $request->file('import_c2s'));

        return redirect()->route('raw.c2s')->with('success', 'C2S imported successfully.');
    }

    // C2S Delete All
    public function c2sDestroy(): RedirectResponse
    {
        C2s::truncate();
        return redirect()->route('raw.c2s')->with('success', 'C2S deleted successfully.');
    }



    ######################################## Sim Issue ##################################################

    // Sim Issue Index
    public function simIssueIndex(Request $request): Application|Factory|View
    {
        return view('reports.back.sim-issue.sim-issue', [
            'simIssues' => SimIssue::with('ddHouse','rso','supervisor','retailer')
                ->latest()
                ->paginate(5),
        ]);
    }

    // Live Sim Issue Index
    public function liveSimIssueIndex(Request $request): Application|Factory|View
    {
        return view('reports.back.sim-issue.live-sim-issue', [
            'simIssues' => LiveSimIssue::with('ddHouse','rso','supervisor','retailer')
                ->latest()
                ->paginate(5),
        ]);
    }

    // Sim Issue Import
    public function simIssueImport(Request $request): RedirectResponse
    {
        Excel::import(new SimIssueImport, $request->file('import_sim_issue'));

        return redirect()->route('raw.sim.issue')->with('success', 'Sim Issue imported successfully.');
    }

    // Live Sim Issue Import
    public function liveSimIssueImport(Request $request): RedirectResponse
    {
        Excel::import(new LiveSimIssueImport, $request->file('import_sim_issue'));

        return redirect()->route('raw.live.sim.issue')->with('success', 'Live Sim Issue imported successfully.');
    }

    // Sim Issue Delete All
    public function simIssueDestroy(): RedirectResponse
    {
        SimIssue::truncate();
        return redirect()->route('raw.sim.issue')->with('success', 'Sim Issue deleted successfully.');
    }

    // Live Sim Issue Delete All
    public function liveSimIssueDestroy(): RedirectResponse
    {
        LiveSimIssue::truncate();
        return redirect()->route('raw.live.sim.issue')->with('success', 'Live Sim Issue deleted successfully.');
    }



    ######################################## Balance ##################################################

    // Balance Index
    public function balanceIndex(Request $request): Application|Factory|View
    {
        return view('reports.back.balance.balance', [
            'balances' => Balance::with('ddHouse','rso','supervisor','retailer')
                ->latest()
                ->paginate(5),
        ]);
    }

    // Balance Import
    public function balanceImport(Request $request): RedirectResponse
    {
        Excel::import(new BalanceImport, $request->file('import_balance'));

        return redirect()->route('raw.balance')->with('success', 'Balance imported successfully.');
    }

    // Balance Delete All
    public function balanceDestroy(): RedirectResponse
    {
        Balance::truncate();

        return redirect()->route('raw.balance')->with('success', 'Balance deleted successfully.');
    }



    ########################################### Bso ####################################################

    // Bso Index
    public function bsoIndex(Request $request): Application|Factory|View
    {
        return view('reports.back.bso.bso', [
            'bsos' => Bso::with('ddHouse','rso','supervisor','retailer')
                ->latest()
                ->paginate(5),
        ]);
    }

    // Bso Import
    public function bsoImport(Request $request): RedirectResponse
    {
        Excel::import(new BsoImport, $request->file('import_bso'));

        return redirect()->route('raw.bso')->with('success', 'BSO imported successfully.');
    }

    // Bso Delete All
    public function bsoDestroy(): RedirectResponse
    {
        Bso::truncate();

        return redirect()->route('raw.bso')->with('success', 'BSO deleted successfully.');
    }



    ########################################### Dso ####################################################

    // Dso Index
    public function dsoIndex(Request $request): Application|Factory|View
    {
        return view('reports.back.dso.dso', [
            'dsos' => Dso::with('ddHouse','rso','supervisor','retailer')
                ->latest()
                ->paginate(5),
        ]);
    }

    // Dso Import
    public function dsoImport(Request $request): RedirectResponse
    {
        Excel::import(new DsoImport, $request->file('import_dso'));

        return redirect()->route('raw.dso')->with('success', 'DSO imported successfully.');
    }

    // Dso Delete All
    public function dsoDestroy(): RedirectResponse
    {
        Dso::truncate();

        return redirect()->route('raw.dso')->with('success', 'DSO deleted successfully.');
    }



    ########################################### eSAF ###################################################

    // Esaf Index
    public function esafIndex(Request $request): Application|Factory|View
    {
        return view('reports.back.esaf.esaf', [
            'esafs' => Esaf::with('ddHouse','rso','supervisor','retailer')
                ->latest()
                ->paginate(5),
        ]);
    }

    // Esaf Import
    public function esafImport(Request $request): RedirectResponse
    {
        Excel::import(new EsafImport, $request->file('import_esaf'));

        return redirect()->route('raw.esaf')->with('success', 'Esaf imported successfully.');
    }

    // Esaf Delete All
    public function esafDestroy(): RedirectResponse
    {
        Esaf::truncate();

        return redirect()->route('raw.esaf')->with('success', 'Esaf deleted successfully.');
    }

}
