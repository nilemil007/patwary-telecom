<?php

namespace App\Http\Controllers;

use App\Imports\Reports\ActivationImport;
use App\Models\Reports\Activation;
use App\Services\Import\ActivationService;
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
        return (new ActivationService)->coreActivationImport($request);
    }

    // Activation Import
    public function activationImport(Request $request): RedirectResponse
    {
        Excel::import(new ActivationImport, $request->file('import_activation'));

        return redirect()->route('raw.activation.index')->with('success', 'Activation imported successfully.');
    }

    // Activation Delete All
    public function activationDestroy(): RedirectResponse
    {
        Activation::truncate();

        return redirect()->route('raw.activation.index')->with('success', 'Activation deleted successfully.');
    }
}
