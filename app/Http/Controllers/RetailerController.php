<?php

namespace App\Http\Controllers;

use App\Http\Requests\Retailer\UpdateRequest;
use App\Imports\RetailersImport;
use App\Models\DdHouse;
use App\Models\Retailer;
use App\Models\Rso;
use App\Models\Supervisor;
use App\Models\User;
use App\Services\Retailer\RetailerUpdateService;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class RetailerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        if ( (Auth::user()->role != 'super-admin') )
        {
            $rso = Rso::firstWhere('user_id', Auth::id());
            $retailers = Retailer::where('rso_id', $rso->id)
                ->search( $request->search )
                ->paginate(5);

            return view('retailer.index', compact('retailers'));
        }

        $retailers = Retailer::latest('status')
            ->search( $request->search )
            ->paginate(5);

        return view('retailer.index', compact('retailers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('retailer.create', [
            'users' => User::all(),
            'allBts' => [],
            'routes' => [],
            'houses' => [],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Retailer $retailer
     * @return Application|Factory|View
     */
    public function show( Retailer $retailer ): Application|Factory|View
    {
        return view('retailer.show', compact('retailer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Retailer $retailer
     * @return Application|Factory|View
     */
    public function edit( Retailer $retailer ): Application|Factory|View
    {
        $ids = Retailer::whereNotNull('user_id')->pluck('user_id');
        $supervisors = Supervisor::all();
        $rsos = Rso::all();
        $houses = DdHouse::all();

        if ( Auth::user()->role == 'super-admin' )
        {
            $users = User::where('role','retailer')->whereNotIn('id', $ids)->get();
        }else{
            $users = User::where('role', 'retailer')->where('dd_house_id', Auth::user()->dd_house_id)->whereNotIn('id', $ids)->get();
        }

        return view('retailer.edit', compact('retailer', 'users','supervisors','rsos','houses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Retailer $retailer
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Retailer $retailer)
    {
        return ( new RetailerUpdateService() )->update( $request, $retailer );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Download Sample File
    public function sampleFileDownload(): BinaryFileResponse
    {
//        return Response::download('', '');
    }


    // Additional Method
    public function export()
    {
//        return Excel::download( new ItopReplaceExport, 'itop-replaces.xlsx' );
    }

    public function import( Request $request ): RedirectResponse
    {
        Excel::import( new RetailersImport, $request->file('import_retailers'));

        return redirect()->route('retailer.index')->with('success', 'New retailer imported successfully.');
    }
}
