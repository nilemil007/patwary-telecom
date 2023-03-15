<?php

namespace App\Http\Controllers;

use App\Imports\RetailerImport;
use App\Models\Retailer;
use App\Models\Rso;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class RetailerController extends Controller
{
    // Index
    public function index(Request $request): Factory|View|Application
    {
        if ( (Auth::user()->role != 'super-admin') )
        {
            $rso = Rso::firstWhere('user_id', Auth::id());
            $retailers = Retailer::where('rso_id', $rso->id)
                ->search( $request->search )
                ->latest('status')
                ->paginate(5);

            return view('retailer.index', compact('retailers'));
        }

        $retailers = Retailer::latest('status')
            ->search( $request->search )
            ->paginate(5);

        return view('retailer.index', compact('retailers'));
    }

    // Import
    public function import( Request $request ): RedirectResponse
    {
        Excel::import( new RetailerImport(), $request->file('import_retailers'));

        return redirect()->route('retailer.index')->with('success', 'New retailer imported successfully.');
    }




}
