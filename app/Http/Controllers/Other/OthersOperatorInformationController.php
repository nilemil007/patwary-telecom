<?php

namespace App\Http\Controllers\Other;

use App\Exports\CompetitionInformationExport;
use App\Http\Controllers\Controller;
use App\Models\DdHouse;
use App\Models\OthersOperatorInformation;
use App\Models\Retailer;
use App\Models\Rso;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class OthersOperatorInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index( Request $request ): Application|Factory|View
    {
        if ( Auth::user()->role == 'super-admin' || Auth::user()->role == 'zm' )
        {
            $ooi = OthersOperatorInformation::search( $request->input('search') )
                ->latest()
                ->paginate(5);
        }else{
            $ooi = OthersOperatorInformation::where('rso_number', Auth::user()->username)
                ->search( $request->input('search') )
                ->latest()
                ->paginate(5);
        }

        return view('competition-information.index', compact('ooi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $rsoId = Rso::firstWhere('user_id', Auth::id());
        $ooi = OthersOperatorInformation::whereNotNull('retailer_number')->pluck('retailer_number');

        $retailers = Retailer::where('dd_house_id', Auth::user()->dd_house_id)->where('rso_id', $rsoId->id)->whereNotIn('itop_number', $ooi)->get();

        return view('competition-information.create', [
            'retailers' => $retailers,
            'ddCode' => DdHouse::firstWhere('id', $rsoId->dd_house_id)->code,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $fields = $request->only(['retailer_number','bl_tarshiary','gp_tarshiary','robi_tarshiary','airtel_tarshiary','bl_ga','gp_ga','robi_ga','airtel_ga']);

        $validated = Validator::make( $fields, [
            'retailer_number' => ['required','digits:10','unique:others_operator_information,retailer_number'],
            'bl_tarshiary' => ['nullable','min:4','max:7'],
            'gp_tarshiary' => ['nullable','min:4','max:7'],
            'robi_tarshiary' => ['nullable','min:4','max:7'],
            'airtel_tarshiary' => ['nullable','min:4','max:7'],
            'bl_ga' => ['max:3'],
            'gp_ga' => ['max:3'],
            'robi_ga' => ['max:3'],
            'airtel_ga' => ['max:3'],
        ],[
            'retailer_number.required' => 'এই ফিল্ড খালি রাখা যাবেনা।',
        ],[] )->validate();

        $retailer = Retailer::firstWhere('itop_number', $fields['retailer_number']);
        $rsoNumber = Rso::firstWhere('id', $retailer->rso_id)->itop_number;

        $validated['dd_code'] = DdHouse::firstWhere('id', $retailer->dd_house_id)->code;
        $validated['rso_number'] = $rsoNumber;
        $validated['retailer_code'] = $retailer->retailer_code;


        if ( OthersOperatorInformation::create( $validated ) )
        {
            return redirect()->route('others-operator-information.index')->with('success','Information saved successfully.');
        }

        return redirect()->route('others-operator-information.index')->with('error','Information not saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param OthersOperatorInformation $othersOperatorInformation
     * @return \Illuminate\Http\Response
     */
    public function show(OthersOperatorInformation $othersOperatorInformation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param OthersOperatorInformation $othersOperatorInformation
     * @return Application|Factory|View
     */
    public function edit(OthersOperatorInformation $othersOperatorInformation): View|Factory|Application
    {
        return view('competition-information.edit', compact('othersOperatorInformation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param OthersOperatorInformation $othersOperatorInformation
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, OthersOperatorInformation $othersOperatorInformation): RedirectResponse
    {
        $fields = $request->only(['bl_tarshiary','gp_tarshiary','robi_tarshiary','airtel_tarshiary','bl_ga','gp_ga','robi_ga','airtel_ga']);

        $validated = Validator::make( $fields, [
            'bl_tarshiary' => ['nullable','min:4','max:7'],
            'gp_tarshiary' => ['nullable','min:4','max:7'],
            'robi_tarshiary' => ['nullable','min:4','max:7'],
            'airtel_tarshiary' => ['nullable','min:4','max:7'],
            'bl_ga' => ['max:3'],
            'gp_ga' => ['max:3'],
            'robi_ga' => ['max:3'],
            'airtel_ga' => ['max:3'],
        ],[],[] )->validate();

        if ( $othersOperatorInformation->update( $validated ) )
        {
            return redirect()->route('others-operator-information.index')->with('success','Information updated successfully.');
        }

        return redirect()->route('others-operator-information.index')->with('error','Information not update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param OthersOperatorInformation $othersOperatorInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(OthersOperatorInformation $othersOperatorInformation)
    {
        //
    }


    // Export
    public function export(): BinaryFileResponse
    {
        return Excel::download( new CompetitionInformationExport, 'Others Operator Information.xlsx' );
    }

    // Delete All
    public function deleteAll(): RedirectResponse
    {
        DB::table('others_operator_information')->delete();
        return redirect()->route('others-operator-information.index')->with('success', 'All information deleted successfully.');
    }

}
