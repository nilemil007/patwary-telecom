<?php

namespace App\Http\Controllers;

use App\Imports\Reports\ActivationImport;
use App\Imports\Reports\C2cImport;
use App\Imports\Reports\FcdGaImport;
use App\Imports\Reports\LiveC2cImport;
use App\Imports\Reports\LiveActivationImport;
use App\Models\Activation;
use App\Models\C2c;
use App\Models\FcdGa;
use App\Models\LiveActivation;
use App\Models\LiveC2c;
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
        return (new ActivationService)->index($request);
    }

    // Live Activation Index
    public function liveActivationIndex(Request $request): Application|Factory|View
    {
        return (new LiveActivationService)->index($request);
    }

    // FCD GA Index
    public function fcdGaIndex(Request $request): Application|Factory|View
    {
        if ( Auth::user()->role == 'super-admin' )
            {
                $activations = FcdGa::with('ddHouse','rso','supervisor','retailer')
                    ->latest()
                    ->paginate(5);
            }

            return view('reports.back.activation.fcd-ga', compact('activations'));
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
        if ( Auth::user()->role == 'super-admin' )
        {
            $c2cs = C2c::with('ddHouse','rso','supervisor','retailer')
                ->latest()
                ->paginate(5);

            return view('reports.back.c2c.c2c', compact('c2cs'));
        }
    }

    // Live C2C Index
    public function liveC2cIndex(Request $request): Application|Factory|View
    {
        if ( Auth::user()->role == 'super-admin' )
        {
            $c2cs = LiveC2c::with('ddHouse','rso','supervisor','retailer')
                ->latest()
                ->paginate(5);

            return view('reports.back.c2c.live-c2c', compact('c2cs'));
        }
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


}
