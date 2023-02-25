<?php
namespace App\Services\Retailer;


use App\Models\User;
use App\Notifications\Retailer\RetailerUpdateNotification;
use App\Notifications\Rso\AdditionalInfoUpdateNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class RetailerUpdateService {

    /**
     * Update the specified resource in storage.
     *
     * @param $request
     * @param $retailer
     * @return RedirectResponse
     */
    public function update( $request, $retailer)
    {
        $information = $request->validated();

        // For admin only
        if ( Auth::user()->role == 'super-admin' )
        {
            if ( !$request->filled('user_id') )
            {
                unset( $information['user_id'] );
            }

            if ( !$request->has( 'enabled' ) )
            {
                $information['enabled'] = 'N';
            }
            if ( !$request->has( 'sim_seller' ) )
            {
                $information['sim_seller'] = 'N';
            }
            if ( !$request->has( 'own_shop' ) )
            {
                $information['own_shop'] = 'N';
            }
            if ( !$request->has( 'others_operator' ) )
            {
                $information['others_operator'] = null;
            }

            $retailer->update( $information );

            return redirect()->route('retailer.index')->with('success', 'Information updated successfully.');
        }


        // For others user
        if ( $retailer->retailer_name != Str::title( $request->retailer_name ) )
        {
            unset( $information['retailer_name'] );
            $information['tmp_retailer_name'] = $request->retailer_name;
            $information['status'] = 'unapproved';
        }
        if ( $retailer->retailer_type != Str::title( $request->retailer_type ) )
        {
            unset( $information['retailer_type'] );
            $information['tmp_retailer_type'] = $request->retailer_type;
            $information['status'] = 'unapproved';
        }
        if ( $retailer->owner_name != Str::title( $request->owner_name ) )
        {
            unset( $information['owner_name'] );
            $information['tmp_owner_name'] = $request->owner_name;
            $information['status'] = 'unapproved';
        }
        if ( $retailer->contact_no != $request->contact_no )
        {
            unset( $information['contact_no'] );
            $information['tmp_contact_no'] = $request->contact_no;
            $information['status'] = 'unapproved';
        }
        if ( $retailer->address != Str::title( $request->address ) )
        {
            unset( $information['address'] );
            $information['tmp_address'] = $request->address;
            $information['status'] = 'unapproved';
        }
        if ( $retailer->trade_license_no != $request->trade_license_no )
        {
            unset( $information['trade_license_no'] );
            $information['tmp_trade_license_no'] = $request->trade_license_no;
            $information['status'] = 'unapproved';
        }
        if ( $retailer->latitude != $request->latitude )
        {
            unset( $information['latitude'] );
            $information['tmp_latitude'] = $request->latitude;
            $information['status'] = 'unapproved';
        }
        if ( $retailer->longitude != $request->longitude )
        {
            unset( $information['longitude'] );
            $information['tmp_longitude'] = $request->longitude;
            $information['status'] = 'unapproved';
        }
        if ( $retailer->device_name != Str::title( $request->device_name ) )
        {
            unset( $information['device_name'] );
            $information['tmp_device_name'] = $request->device_name;
            $information['status'] = 'unapproved';
        }
        if ( $retailer->device != Str::title( $request->device ) )
        {
            unset( $information['device'] );
            $information['tmp_device'] = $request->device;
            $information['status'] = 'unapproved';
        }
        if ( $retailer->scanner != Str::title( $request->scanner ) )
        {
            unset( $information['scanner'] );
            $information['tmp_scanner'] = $request->scanner;
            $information['status'] = 'unapproved';
        }

        $retailer->update( $information );

//        $superAdmin = User::firstWhere('role', 'super-admin');

//        Notification::sendNow( $superAdmin, new RetailerUpdateNotification( $retailer ) );

        return redirect()->back()->with('success','Update request sent successfully.');

    }
}
