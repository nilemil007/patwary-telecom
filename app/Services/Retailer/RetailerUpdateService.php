<?php
namespace App\Services\Retailer;


use App\Models\User;
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
    public function update( $request, $retailer): RedirectResponse
    {
        $information = $request->validated();

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


//        if ( $rso->father_name != Str::title( $request->father_name ) )
//        {
//            unset( $additionalData['father_name'] );
//            $additionalData['tmp_father_name'] = $request->father_name;
//            $additionalData['status'] = 'unapproved';
//        }
//        if ( $rso->mother_name != $request->mother_name )
//        {
//            unset( $additionalData['mother_name'] );
//            $additionalData['tmp_mother_name'] = $request->mother_name;
//            $additionalData['status'] = 'unapproved';
//        }
//        if ( $rso->address != Str::title( $request->address ) )
//        {
//            unset( $additionalData['address'] );
//            $additionalData['tmp_address'] = $request->address;
//            $additionalData['status'] = 'unapproved';
//        }
//        if ( $rso->blood_group != $request->blood_group )
//        {
//            unset( $additionalData['blood_group'] );
//            $additionalData['tmp_blood_group'] = $request->blood_group;
//            $additionalData['status'] = 'unapproved';
//        }
//        if ( $rso->account_number != $request->account_number )
//        {
//            unset( $additionalData['account_number'] );
//            $additionalData['tmp_account_number'] = $request->account_number;
//            $additionalData['status'] = 'unapproved';
//        }
//        if ( $rso->bank_name != Str::title( $request->bank_name ) )
//        {
//            unset( $additionalData['bank_name'] );
//            $additionalData['tmp_bank_name'] = $request->bank_name;
//            $additionalData['status'] = 'unapproved';
//        }
//        if ( $rso->brunch_name != Str::title( $request->brunch_name ) )
//        {
//            unset( $additionalData['brunch_name'] );
//            $additionalData['tmp_brunch_name'] = $request->brunch_name;
//            $additionalData['status'] = 'unapproved';
//        }
//        if ( $rso->routing_number != $request->routing_number )
//        {
//            unset( $additionalData['routing_number'] );
//            $additionalData['tmp_routing_number'] = $request->routing_number;
//            $additionalData['status'] = 'unapproved';
//        }
//        if ( $rso->education != Str::upper( $request->education ) )
//        {
//            unset( $additionalData['education'] );
//            $additionalData['tmp_education'] = $request->education;
//            $additionalData['status'] = 'unapproved';
//        }
//        if ( !empty($rso->dob) && $rso->dob->toDateString() != $request->dob )
//        {
//            unset( $additionalData['dob'] );
//            $additionalData['tmp_dob'] = $request->dob;
//            $additionalData['status'] = 'unapproved';
//        }
//        if ( $rso->nid != $request->nid )
//        {
//            unset( $additionalData['nid'] );
//            $additionalData['tmp_nid'] = $request->nid;
//            $additionalData['status'] = 'unapproved';
//        }
//        if ( $rso->marital_status != Str::title( $request->marital_status ) )
//        {
//            unset( $additionalData['marital_status'] );
//            $additionalData['tmp_marital_status'] = $request->marital_status;
//            $additionalData['status'] = 'unapproved';
//        }
//
//        if( $rso->update( $additionalData ) )
//        {
//            $superAdmin = User::firstWhere('role', 'super-admin');
//
//            Notification::sendNow( $superAdmin, new AdditionalInfoUpdateNotification( $rso ) );
//
//            return redirect()->back()->with('success','Update request sent successfully.');
//        }
    }
}
