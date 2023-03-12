<?php

namespace App\Http\Controllers;

use App\Imports\Reports\ActivationImport;
use App\Imports\Reports\C2CImport;
use App\Imports\Reports\LiveC2cImport;
use App\Imports\Reports\LiveActivationImport;
use App\Models\Reports\Activation;
use App\Models\Reports\C2C;
use App\Models\Reports\LiveActivation;
use App\Models\Reports\LiveC2c;
use App\Services\Import\C2cService;
use App\Services\Import\LiveC2cService;
use App\Services\Import\LiveActivationService;
use Carbon\Carbon;
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
        return (new LiveC2cService)->activationImport($request);
    }

    // Live Activation Index
    public function liveActivationIndex(Request $request): Application|Factory|View
    {
        return (new LiveActivationService)->liveActivationImport($request);
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

    // C2C Index
    public function c2cIndex(Request $request): Application|Factory|View
    {
        return (new C2cService)->c2cImport($request);
    }

    // Live C2C Index
    public function liveC2cIndex(Request $request): Application|Factory|View
    {
        return (new LiveC2cService())->liveC2cImport($request);
    }

    // C2C Import
    public function c2cImport(Request $request): RedirectResponse
    {
        Excel::import( new C2CImport, $request->file('import_c2c'));

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
        C2C::truncate();

        return redirect()->route('raw.c2c')->with('success', 'All C2C deleted successfully.');
    }

    // Live C2C Delete All
    public function liveC2cDestroy(): RedirectResponse
    {
        LiveC2c::truncate();

        return redirect()->route('raw.live.c2c')->with('success', 'Live C2C deleted successfully.');
    }
}
