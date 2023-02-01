<?php

namespace App\Http\Controllers;

use App\Http\Requests\BpAdditionalUpdateRequest;
use App\Http\Requests\BpProfileUpdateRequest;
use App\Http\Requests\BpUpdateRequest;
use App\Models\Bp;
use App\Models\User;
use App\Rules\CheckExistingPassword;
use App\Services\BpAdditionalInfoService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class BpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function index( Request $request ): Application|Factory|View
    {
        $this->authorize('super-admin');

        return view('bp.index', [
            'bps' => Bp::latest()->search( $request->search )->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Bp $bp
     * @return Application|Factory|View
     */
    public function show(Bp $bp): View|Factory|Application
    {
        return view('bp.show', compact('bp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Bp $bp
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function edit(Bp $bp): View|Factory|Application
    {
        $this->authorize('super-admin');

        return view('bp.edit', compact('bp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BpUpdateRequest $request
     * @param Bp $bp
     * @return RedirectResponse
     */
    public function update(BpUpdateRequest $request, Bp $bp): RedirectResponse
    {
        if ( $bp->update( $request->validated() ) )
        {
            return redirect()->route('bp.index')->with('success','BP information updated successfully.');
        }

        return redirect()->route('bp.index')->with('error','BP information not updated.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BpProfileUpdateRequest $request
     * @param Bp $bp
     * @return RedirectResponse
     */
    public function profileUpdate(BpProfileUpdateRequest $request, Bp $bp): RedirectResponse
    {
        $bp = User::findOrFail( $bp->user_id );

        $updateProfile = $request->validated();

        if ( $request->hasFile('image') )
        {
            if ( File::exists( public_path($bp->image) ) )
            {
                File::delete( $bp->image );
            }

            $imgName = $request->image->hashname();
            $request->image->storeAs('public/users', $imgName);
            $updateProfile['image'] = $imgName;
        }

        if( $bp->update( $updateProfile ) )
        {
            return redirect()->back()->with('success','Information updated successfully.');
        }

        return redirect()->back()->with('error','Information not updated.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BpAdditionalUpdateRequest $request
     * @param Bp $bp
     * @return RedirectResponse
     */
    public function additionalUpdate( BpAdditionalUpdateRequest $request, Bp $bp): RedirectResponse
    {
        (new BpAdditionalInfoService())->update($request, $bp);

        return redirect()->back()->with('error','Information not updated.');
    }

    public function changePassword(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => [
                'required',
                'min:8',
                'max:150',
                new CheckExistingPassword(Auth::user()),
            ],
            'password' => [
                'required',
                'min:8',
                'max:150',
                'confirmed',
            ],
        ]);

        $password = Hash::check($validated['current_password'], Auth::user()->password);

        if( $password )
        {
            User::findOrFail( Auth::id() )->update( $validated );

            return redirect()->back()->with('success','Password changed successfully.');
        }

        return redirect()->back()->with('error','Password not changed.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Bp $bp
     * @return Response
     */
    public function destroy(Bp $bp)
    {
        //
    }

    // Additional Method
    public function export(): BinaryFileResponse
    {
//        return Excel::download( new ItopReplaceExport, 'itop-replaces.xlsx' );
    }
}
