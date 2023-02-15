<?php

namespace App\Http\Controllers;

use App\Http\Requests\Rso\AdditionalInfoUpdate;
use App\Http\Requests\Rso\ProfileUpdate;
use App\Listeners\BrandPromoter\AdditionalInformationUpdate;
use App\Models\Rso;
use App\Models\User;
use App\Notifications\Rso\ChangeProfilePictureNotification;
use App\Notifications\Rso\ChangeUsernameNotification;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Notification;

class RsoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        if ( Auth::user()->role == 'super-admin' )
        {
            $rsos = Rso::with('user','supervisor')
                ->search( $request->search )
                ->latest()
                ->paginate(5);
        }else{
            $rsos = Rso::with('user')
                ->where('user_id', Auth::id())
                ->search( $request->search )
                ->latest()
                ->paginate(5);
        }

        return view('rso.index', compact('rsos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param Rso $rso
     * @return \Illuminate\Http\Response
     */
    public function show(Rso $rso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Rso $rso
     * @return Application|Factory|View
     */
    public function edit(Rso $rso): View|Factory|Application
    {
        return view('rso.edit', compact('rso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Rso $rso
     * @return RedirectResponse
     */
    public function update(Request $request, Rso $rso): RedirectResponse
    {
        $rso->update($request->all());
        return redirect()->route('rso.index')->with('success','Rso information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Rso $rso
     * @return \Illuminate\Http\Response
     */
    public function destroy( Rso $rso )
    {
        //
    }

    public function profile( Rso $rso ): Factory|View|Application
    {
        return view('rso.profile', compact('rso'));
    }

    public function profileUpdate(ProfileUpdate $request, Rso $rso ): RedirectResponse
    {
        // Find super-admin for send profile picture change notification
        $superAdmin = User::firstWhere('role', 'super-admin');

        // Find user (rso) for change his profile picture
        $user = User::findOrFail( $rso->user_id );

        $profile = $request->validated();

        if ( $request->hasFile('image') )
        {
            // Delete old image if exists
            File::exists( public_path( $user->image ) ) ? File::delete( $user->image ) : '';

            $imgName = $request->image->hashname();
            $request->image->storeAs('public/users', $imgName);
            $profile['image'] = $imgName;

            // Send profile picture change notification to super admin
            Notification::sendNow( $superAdmin, new ChangeProfilePictureNotification( $profile['image'], $rso ) );
        }

        if( $user->update( $profile ) )
        {
            if ( Auth::user()->username != $profile['username'] )
            {
                // Send username change notification to super admin
                Notification::sendNow( $superAdmin, new ChangeUsernameNotification( $rso ) );
            }

            return redirect()->back()->with('success','Information updated successfully.');
        }

        return redirect()->back()->with('error','Information not updated.');
    }

    public function additionalInfo( AdditionalInfoUpdate $request, Rso $rso )
    {

    }



    // Additional Method
    public function export()
    {
//        return Excel::download( new ItopReplaceExport, 'itop-replaces.xlsx' );
    }
}
