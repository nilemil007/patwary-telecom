<?php

namespace App\Http\Controllers;

use App\Exports\CompetitionInformationExport;
use App\Http\Requests\CompetitionInformationStoreRequest;
use App\Http\Requests\CompetitionInformationUpdateRequest;
use App\Models\CompetitionInformation;
use App\Models\Retailer;
use App\Models\Rso;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class CompetitionInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index( Request $request ): Application|Factory|View
    {
        if ( !empty($request->input('start_date')) && !empty($request->input('end_date')) )
        {
            $sdate =  $request->input('start_date');
            $edate =  $request->input('end_date');

            return view('competition-information.index',[
                'competitions' => CompetitionInformation::whereBetween('created_at', [$sdate, Carbon::parse($edate)->endOfDay()])
                    ->search( $request->search )
                    ->latest()
                    ->paginate(10),
            ]);
        }else{
            if ( Auth::user()->role == 'super-admin' )
            {
                $competitions = CompetitionInformation::search( $request->input('search') )
                    ->latest()
                    ->paginate(10);
            }else{
                $competitions = CompetitionInformation::where('rso_number', Rso::firstWhere( 'user_id', Auth::id())->itop_number)
                    ->search( $request->input('search') )
                    ->latest()
                    ->paginate(10);
            }
            return view('competition-information.index', compact('competitions'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        return view('competition-information.create', [
            'retailers' => Retailer::where('rso_id', Rso::firstWhere( 'user_id', Auth::id())->id)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CompetitionInformationStoreRequest $request
     * @return RedirectResponse
     */
    public function store(CompetitionInformationStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['dd_code'] = Auth::user()->ddHouse->code;
        $data['retailer_code'] = Retailer::firstWhere('itop_number', $request->retailer_number)->retailer_code;
        $data['rso_number'] = Auth::user()->rso->itop_number;

        CompetitionInformation::create( $data );
        return redirect()->route('competition.create')->with('success','New entry created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param CompetitionInformation $competitionInformation
     * @return Response
     */
    public function show(CompetitionInformation $competitionInformation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CompetitionInformation $competition
     * @return Application|Factory|View
     */
    public function edit(CompetitionInformation $competition): View|Factory|Application
    {
        $retailers = Retailer::where('rso_id', Rso::firstWhere( 'user_id', Auth::id())->id)->get();
        return view('competition-information.edit', compact('competition', 'retailers'
));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CompetitionInformationUpdateRequest $request
     * @param CompetitionInformation $competition
     * @return RedirectResponse
     */
    public function update(CompetitionInformationUpdateRequest $request, CompetitionInformation $competition): RedirectResponse
    {
        $update = $request->validated();

        $update['retailer_code'] = Retailer::firstWhere('itop_number', $update['retailer_number'])->retailer_code;

        $competition->update( $update );
        return redirect()->route('competition.index')->with('success','Information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CompetitionInformation $competition
     * @return RedirectResponse
     */
    public function destroy(CompetitionInformation $competition): RedirectResponse
    {
        if ($competition->delete())
        {
            return redirect()->route('competition.index')->with('success','Record deleted successfully.');
        }else{
            return redirect()->route('competition.index')->with('error','Record not deleted.');
        }
    }


    // Export Competition Information Data
    public function export(): BinaryFileResponse
    {
        return Excel::download( new CompetitionInformationExport, 'Competition information_selective Retail Tertiary & GA.xlsx' );
    }
}
