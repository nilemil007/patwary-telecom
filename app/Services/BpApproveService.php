<?php
namespace App\Services;

use App\Events\BrandPromoter\ApproveAdditionalInfoEvent;
use App\Models\Bp;
use App\Models\User;
use App\Notifications\BrandPromoter\ApproveAdditionalInfoNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Notification;

class BpApproveService {

    /**
     * Update the specified resource in storage.
     *
     * @param $request
     * @param $bp
     * @return RedirectResponse
     */
    public function approved( $request, $bp): RedirectResponse
    {
        $data = $request->only([
            'personal_number',
            'tmp_personal_number',
            'blood_group',
            'tmp_blood_group',
            'education',
            'tmp_education',
            'father_name',
            'tmp_father_name',
            'mother_name',
            'tmp_mother_name',
            'division',
            'tmp_division',
            'district',
            'tmp_district',
            'thana',
            'tmp_thana',
            'address',
            'tmp_address',
            'nid',
            'tmp_nid',
            'bank_name',
            'tmp_bank_name',
            'brunch_name',
            'tmp_brunch_name',
            'account_number',
            'tmp_account_number',
            'dob',
            'tmp_dob',
            'status'
        ]);

        if ( !empty( $bp->tmp_personal_number ) )
        {
            $data['personal_number'] = $bp->tmp_personal_number;
            $data['tmp_personal_number'] = null;
            $data['status'] = null;
        }else{
            unset( $data['personal_number'] );
        }

        if ( !empty( $bp->tmp_blood_group ) )
        {
            $data['blood_group'] = $bp->tmp_blood_group;
            $data['tmp_blood_group'] = null;
            $data['status'] = null;
        }else{
            unset( $data['blood_group'] );
        }

        if ( !empty( $bp->tmp_education ) )
        {
            $data['education'] = $bp->tmp_education;
            $data['tmp_education'] = null;
            $data['status'] = null;
        }else{
            unset( $data['education'] );
        }

        if ( !empty( $bp->tmp_father_name ) )
        {
            $data['father_name'] = $bp->tmp_father_name;
            $data['tmp_father_name'] = null;
            $data['status'] = null;
        }else{
            unset( $data['father_name'] );
        }

        if ( !empty( $bp->tmp_mother_name ) )
        {
            $data['mother_name'] = $bp->tmp_mother_name;
            $data['tmp_mother_name'] = null;
            $data['status'] = null;
        }else{
            unset( $data['mother_name'] );
        }

        if ( !empty( $bp->tmp_division ) )
        {
            $data['division'] = $bp->tmp_division;
            $data['tmp_division'] = null;
            $data['status'] = null;
        }else{
            unset( $data['division'] );
        }

        if ( !empty( $bp->tmp_district ) )
        {
            $data['district'] = $bp->tmp_district;
            $data['tmp_district'] = null;
            $data['status'] = null;
        }else{
            unset( $data['district'] );
        }

        if ( !empty( $bp->tmp_thana ) )
        {
            $data['thana'] = $bp->tmp_thana;
            $data['tmp_thana'] = null;
            $data['status'] = null;
        }else{
            unset( $data['thana'] );
        }

        if ( !empty( $bp->tmp_address ) )
        {
            $data['address'] = $bp->tmp_address;
            $data['tmp_address'] = null;
            $data['status'] = null;
        }else{
            unset( $data['address'] );
        }

        if ( !empty( $bp->tmp_nid ) )
        {
            $data['nid'] = $bp->tmp_nid;
            $data['tmp_nid'] = null;
            $data['status'] = null;
        }else{
            unset( $data['nid'] );
        }

        if ( !empty( $bp->tmp_bank_name ) )
        {
            $data['bank_name'] = $bp->tmp_bank_name;
            $data['tmp_bank_name'] = null;
            $data['status'] = null;
        }else{
            unset( $data['bank_name'] );
        }

        if ( !empty( $bp->tmp_brunch_name ) )
        {
            $data['brunch_name'] = $bp->tmp_brunch_name;
            $data['tmp_brunch_name'] = null;
            $data['status'] = null;
        }else{
            unset( $data['brunch_name'] );
        }

        if ( !empty( $bp->tmp_account_number ) )
        {
            $data['account_number'] = $bp->tmp_account_number;
            $data['tmp_account_number'] = null;
            $data['status'] = null;
        }else{
            unset( $data['account_number'] );
        }

        if ( !empty( $bp->tmp_dob ) )
        {
            $data['dob'] = $bp->tmp_dob;
            $data['tmp_dob'] = null;
            $data['status'] = null;
        }else{
            unset( $data['dob'] );
        }


        if( $bp->update( $data ) )
        {
            $userBp = User::firstWhere('id', $bp->user_id);
            Notification::sendNow($userBp, new ApproveAdditionalInfoNotification( Auth::user() ));

            return redirect()->route('bp.index')->with('success','Approved successfully.');
        }
    }
}
