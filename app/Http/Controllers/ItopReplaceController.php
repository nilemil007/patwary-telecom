<?php

namespace App\Http\Controllers;

use App\Exports\ItopReplaceExport;
use App\Http\Requests\ItopReplaceStoreRequest;
use App\Http\Requests\ItopReplaceUpdateRequest;
use App\Models\ItopReplace;
use App\Models\User;
use App\Services\ItopReplaceService;
use Carbon\Carbon;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ItopReplaceController extends Controller
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

            return view('itop-replace.index',[
                'replaces' => ItopReplace::with('user','rso')
                    ->search( $request->search )
                    ->whereBetween('created_at', [$sdate, Carbon::parse($edate)->endOfDay()])
                    ->latest('remarks')
                    ->paginate(5),
            ]);
        }else{
            if ( Auth::user()->role == 'super-admin' )
            {
                $replaces = ItopReplace::with('user')
                    ->search( $request->search )
                    ->latest('remarks')
                    ->paginate(5);
            }else{
                $replaces = ItopReplace::with('user')
                    ->where('user_id', Auth::id())
                    ->search( $request->search )
                    ->latest('remarks')
                    ->paginate(5);
            }

            return view('itop-replace.index', compact('replaces'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('itop-replace.create',[
            'users' => User::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ItopReplaceStoreRequest $request
     * @return RedirectResponse
     */
    public function store(ItopReplaceStoreRequest $request): RedirectResponse
    {
        ( new ItopReplaceService() )->store( $request );

        return redirect()->route('itop-replace.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ItopReplace $itopReplace
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function edit(ItopReplace $itopReplace): View|Factory|Application
    {
        $this->authorize('update', $itopReplace);
        $users = User::all();
        return view('itop-replace.edit', compact('itopReplace','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ItopReplaceUpdateRequest $request
     * @param ItopReplace $itopReplace
     * @return RedirectResponse
     */
    public function update(ItopReplaceUpdateRequest $request, ItopReplace $itopReplace): RedirectResponse
    {
        ( new ItopReplaceService() )->update( $request, $itopReplace );

        return redirect()->route('itop-replace.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ItopReplace $itopReplace
     * @return RedirectResponse
     */
    public function destroy(ItopReplace $itopReplace): RedirectResponse
    {
        if ( $itopReplace->delete() )
        {
            Session::flash('success', 'Record deleted successfully.');
        }else{
            Session::flash('error', 'Record deleted failed.');
        }

        return redirect()->route('itop-replace.index');
    }


    // Additional Method
    public function export(): BinaryFileResponse
    {
        return Excel::download( new ItopReplaceExport, 'itop-replaces.xlsx' );
    }

    // Reject Itop Number
    public function numberReject($id): RedirectResponse
    {
        $replace = ItopReplace::findOrFail($id)->update([
            'tmp_itop_number' => null,
            'remarks' => null,
        ]);

        if ( $replace )
        {
            Session::flash('success', 'Itop number change request rejected.');
        }

        return redirect()->route('itop-replace.index');
    }

    // Accept Itop Number
    public function numberAccept(Request $request, $id): RedirectResponse
    {
        $replace = ItopReplace::findOrFail($id)->update([
            'itop_number' => $request->input('newItopNumber'),
            'tmp_itop_number' => null,
            'remarks' => null,
        ]);

        if ( $replace )
        {
            Session::flash('success', 'Request accepted.');
        }

        return redirect()->route('itop-replace.index');
    }
}
