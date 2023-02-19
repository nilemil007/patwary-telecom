<?php

namespace App\Http\Controllers;

use App\Exports\Rso\RsoListExport;
use App\Http\Requests\Rso\AdditionalInfoUpdate;
use App\Http\Requests\Rso\ProfileUpdate;
use App\Http\Requests\Rso\Update;
use App\Listeners\BrandPromoter\AdditionalInformationUpdate;
use App\Models\Route;
use App\Models\Rso;
use App\Models\Supervisor;
use App\Models\User;
use App\Notifications\Rso\ChangePasswordNotification;
use App\Notifications\Rso\ChangeProfilePictureNotification;
use App\Notifications\Rso\ChangeUsernameNotification;
use App\Notifications\Rso\RejectNotification;
use App\Rules\CheckExistingPassword;
use App\Services\Rso\AdditionalInfoUpdateService;
use App\Services\Rso\ApproveService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

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
                ->latest('status')
                ->paginate(5);
        }else{
            dd('rso index method');
//            $rsos = Rso::with('user','supervisor')
//                ->where('user_id', Auth::id())
//                ->search( $request->search )
//                ->latest('status')
//                ->paginate(5);
        }

        return view('rso.index', compact('rsos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Rso $rso
     * @return Application|Factory|View
     */
    public function edit(Rso $rso): View|Factory|Application
    {
        $supervisors = Supervisor::all();
        $routes = Route::all();
        return view('rso.edit', compact('rso','supervisors','routes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Update $request
     * @param Rso $rso
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(Update $request, Rso $rso): RedirectResponse
    {
        $this->authorize('super-admin');

        $information = $request->validated();
        $information['routes'] = json_encode( $information['routes'] );

        if ( $request->hasFile('document') )
        {
            if ( File::exists( public_path( $rso->document ) ) )
            {
                File::delete( $rso->document );
            }

            $name = $request->document->hashname();
            $request->document->storeAs('public/rso/documents',$name);
            $information['document'] = $name;
        }else{
            unset( $information['document'] );
        }

        $rso->update( $information );

        return redirect()->route('rso.index')->with('success','Rso information updated successfully.');
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

    public function additionalInfo( AdditionalInfoUpdate $request, Rso $rso ): RedirectResponse
    {
        ( new AdditionalInfoUpdateService() )->update( $request, $rso );

        return redirect()->back()->with('error','Information not updated.');
    }

    public function verify( Rso $rso ): Factory|View|Application
    {
        return view('rso.verify', compact('rso'));
    }

    public function approve(Request $request, Rso $rso): RedirectResponse
    {
        ( new ApproveService() )->approved( $request, $rso );

        return redirect()->route('rso.index')->with('error','Approved failed!');
    }

    public function reject( Rso $rso ): RedirectResponse
    {
        $update = $rso->update([
            'tmp_personal_number'   => null,
            'tmp_father_name'       => null,
            'tmp_mother_name'       => null,
            'tmp_address'           => null,
            'tmp_blood_group'       => null,
            'tmp_account_number'    => null,
            'tmp_bank_name'         => null,
            'tmp_brunch_name'       => null,
            'tmp_routing_number'    => null,
            'tmp_education'         => null,
            'tmp_marital_status'    => null,
            'tmp_nid'               => null,
            'tmp_dob'               => null,
            'status'                => null,
        ]);

        if ( $update )
        {
            $userRso = User::firstWhere('id', $rso->user_id);

            Notification::sendNow($userRso, new RejectNotification( Auth::user() ));

            return redirect()->route('rso.index')->with('success','Request rejected successfully.');
        }
        return redirect()->route('rso.index')->with('error','Request not rejected.');
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

            $superAdmin = User::firstWhere('role', 'super-admin');

            Notification::sendNow( $superAdmin, new ChangePasswordNotification( Auth::user() ) );

            return redirect()->back()->with('success','Password changed successfully.');
        }

        return redirect()->back()->with('error','Password not changed.');
    }

    // Additional Method
    public function export(): BinaryFileResponse
    {
        return Excel::download( new RsoListExport(), 'rso-list.xlsx' );
    }
}
