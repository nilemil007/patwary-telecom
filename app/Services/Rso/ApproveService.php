<?php
namespace App\Services\Rso;

use App\Models\User;
use App\Notifications\Rso\ApproveNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ApproveService {

    /**
     * Update the specified resource in storage.
     *
     * @param $request
     * @param $rso
     * @return RedirectResponse
     */
    public function approved( $request, $rso): RedirectResponse
    {
        $data = $request->only([
            'personal_number',
            'tmp_personal_number',
            'father_name',
            'tmp_father_name',
            'mother_name',
            'tmp_mother_name',
            'address',
            'tmp_address',
            'blood_group',
            'tmp_blood_group',
            'account_number',
            'tmp_account_number',
            'bank_name',
            'tmp_bank_name',
            'brunch_name',
            'tmp_brunch_name',
            'routing_number',
            'tmp_routing_number',
            'education',
            'tmp_education',
            'marital_status',
            'tmp_marital_status',
            'nid',
            'tmp_nid',
            'dob',
            'tmp_dob',
            'status'
        ]);

        if ( !empty( $rso->tmp_personal_number ) )
        {
            $data['personal_number'] = $rso->tmp_personal_number;
            $data['tmp_personal_number'] = null;
            $data['status'] = null;
        }else{
            unset( $data['personal_number'] );
        }
        if ( !empty( $rso->tmp_father_name ) )
        {
            $data['father_name'] = $rso->tmp_father_name;
            $data['tmp_father_name'] = null;
            $data['status'] = null;
        }else{
            unset( $data['father_name'] );
        }
        if ( !empty( $rso->tmp_mother_name ) )
        {
            $data['mother_name'] = $rso->tmp_mother_name;
            $data['tmp_mother_name'] = null;
            $data['status'] = null;
        }else{
            unset( $data['mother_name'] );
        }
        if ( !empty( $rso->tmp_address ) )
        {
            $data['address'] = $rso->tmp_address;
            $data['tmp_address'] = null;
            $data['status'] = null;
        }else{
            unset( $data['address'] );
        }
        if ( !empty( $rso->tmp_blood_group ) )
        {
            $data['blood_group'] = $rso->tmp_blood_group;
            $data['tmp_blood_group'] = null;
            $data['status'] = null;
        }else{
            unset( $data['blood_group'] );
        }
        if ( !empty( $rso->tmp_account_number ) )
        {
            $data['account_number'] = $rso->tmp_account_number;
            $data['tmp_account_number'] = null;
            $data['status'] = null;
        }else{
            unset( $data['account_number'] );
        }
        if ( !empty( $rso->tmp_bank_name ) )
        {
            $data['bank_name'] = $rso->tmp_bank_name;
            $data['tmp_bank_name'] = null;
            $data['status'] = null;
        }else{
            unset( $data['bank_name'] );
        }
        if ( !empty( $rso->tmp_brunch_name ) )
        {
            $data['brunch_name'] = $rso->tmp_brunch_name;
            $data['tmp_brunch_name'] = null;
            $data['status'] = null;
        }else{
            unset( $data['brunch_name'] );
        }
        if ( !empty( $rso->tmp_routing_number ) )
        {
            $data['routing_number'] = $rso->tmp_routing_number;
            $data['tmp_routing_number'] = null;
            $data['status'] = null;
        }else{
            unset( $data['routing_number'] );
        }
        if ( !empty( $rso->tmp_education ) )
        {
            $data['education'] = $rso->tmp_education;
            $data['tmp_education'] = null;
            $data['status'] = null;
        }else{
            unset( $data['education'] );
        }
        if ( !empty( $rso->tmp_marital_status ) )
        {
            $data['marital_status'] = $rso->tmp_marital_status;
            $data['tmp_marital_status'] = null;
            $data['status'] = null;
        }else{
            unset( $data['marital_status'] );
        }
        if ( !empty( $rso->tmp_nid ) )
        {
            $data['nid'] = $rso->tmp_nid;
            $data['tmp_nid'] = null;
            $data['status'] = null;
        }else{
            unset( $data['nid'] );
        }
        if ( !empty( $rso->tmp_dob ) )
        {
            $data['dob'] = $rso->tmp_dob;
            $data['tmp_dob'] = null;
            $data['status'] = null;
        }else{
            unset( $data['dob'] );
        }


        if( $rso->update( $data ) )
        {
            $userRso = User::firstWhere('id', $rso->user_id);
            Notification::sendNow($userRso, new ApproveNotification( Auth::user() ));

            return redirect()->route('rso.index')->with('success','Approved successfully.');
        }
    }
}
