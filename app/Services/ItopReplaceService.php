<?php
namespace App\Services;

use App\Events\ItopReplaceEvent;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\ItopReplace;
use App\Models\User;
use App\Notifications\ItopReplaceUpdateNotification;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ItopReplaceService {

    /**
     * Store a newly created resource in storage.
     *
     * @param $request
     * @return bool
     */
    public function store( $request ): bool
    {
        $replace = $request->validated();

        if ( Auth::user()->role != 'super-admin' )
        {
            unset( $replace['serial_number'] );
        }

        if ( $request->filled('user_id') )
        {
            $replace['user_id'] = $request->input('user_id');
        }else{
            $replace['user_id'] = Auth::id();
        }

        if ( ItopReplace::create( $replace ) )
        {
            Session::flash('success', 'New entry created successfully.');
        }else{
            Session::flash('error', 'Entry creation failed.');
        }

        return true;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param $request
     * @param $itopReplace
     * @return bool
     */
    public function update( $request, $itopReplace): bool
    {
        $update = $request->validated();

        if ( $request->input('status') == "paid" )
        {
            $update['payment_at'] = Carbon::now();
        }

        if ( $itopReplace->itop_number != $request->itop_number && Auth::user()->role != 'super-admin' )
        {
            unset( $update['itop_number'] );
            $update['tmp_itop_number'] = $request->itop_number;
            $update['remarks'] = 'Unapproved';

            Event::dispatch( new ItopReplaceEvent( $update, Auth::user() ) );
        }

        if ( $itopReplace->update( $update ) )
        {
            Session::flash('success', 'Record updated successfully.');
        }else{
            Session::flash('error', 'Record update failed.');
        }

        return true;
    }
}
