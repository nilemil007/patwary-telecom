<?php
namespace App\Services\Retailer;

use App\Models\Rso;
use App\Models\User;
use App\Notifications\Retailer\ApprovedNotification;
use App\Notifications\Rso\ApproveNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ApproveService {

    /**
     * Update the specified resource in storage.
     *
     * @param $request
     * @param $retailer
     * @return RedirectResponse
     */
    public function approved( $request, $retailer): RedirectResponse
    {
        $data = $request->only([
            'retailer_name',
            'tmp_retailer_name',
            'retailer_type',
            'tmp_retailer_type',
            'owner_name',
            'tmp_owner_name',
            'sim_seller',
            'tmp_sim_seller',
            'contact_no',
            'tmp_contact_no',
            'address',
            'tmp_address',
            'nid',
            'tmp_nid',
            'trade_license_no',
            'tmp_trade_license_no',
            'others_operator',
            'tmp_others_operator',
            'longitude',
            'tmp_longitude',
            'latitude',
            'tmp_latitude',
            'device_name',
            'tmp_device_name',
            'device_sn',
            'tmp_device_sn',
            'scanner_sn',
            'tmp_scanner_sn',
            'status',
        ]);

        if ( !empty( $retailer->tmp_retailer_name ) )
        {
            $data['retailer_name'] = $retailer->tmp_retailer_name;
            $data['tmp_retailer_name'] = null;
            $data['status'] = null;
        }else{
            unset( $data['retailer_name'] );
        }
        if ( !empty( $retailer->tmp_retailer_type ) )
        {
            $data['retailer_type'] = $retailer->tmp_retailer_type;
            $data['tmp_retailer_type'] = null;
            $data['status'] = null;
        }else{
            unset( $data['retailer_type'] );
        }
        if ( !empty( $retailer->tmp_owner_name ) )
        {
            $data['owner_name'] = $retailer->tmp_owner_name;
            $data['tmp_owner_name'] = null;
            $data['status'] = null;
        }else{
            unset( $data['owner_name'] );
        }
        if ( !empty( $retailer->tmp_sim_seller ) )
        {
            $data['sim_seller'] = $retailer->tmp_sim_seller;
            $data['tmp_sim_seller'] = null;
            $data['status'] = null;
        }else{
            unset( $data['sim_seller'] );
        }
        if ( !empty( $retailer->tmp_contact_no ) )
        {
            $data['contact_no'] = $retailer->tmp_contact_no;
            $data['tmp_contact_no'] = null;
            $data['status'] = null;
        }else{
            unset( $data['contact_no'] );
        }
        if ( !empty( $retailer->tmp_address ) )
        {
            $data['address'] = $retailer->tmp_address;
            $data['tmp_address'] = null;
            $data['status'] = null;
        }else{
            unset( $data['address'] );
        }
        if ( !empty( $retailer->tmp_nid ) )
        {
            $data['nid'] = $retailer->tmp_nid;
            $data['tmp_nid'] = null;
            $data['status'] = null;
        }else{
            unset( $data['nid'] );
        }
        if ( !empty( $retailer->tmp_trade_license_no ) )
        {
            $data['trade_license_no'] = $retailer->tmp_trade_license_no;
            $data['tmp_trade_license_no'] = null;
            $data['status'] = null;
        }else{
            unset( $data['trade_license_no'] );
        }
        if ( !empty( $retailer->tmp_others_operator ) )
        {
            $data['others_operator'] = $retailer->tmp_others_operator;
            $data['tmp_others_operator'] = null;
            $data['status'] = null;
        }else{
            unset( $data['others_operator'] );
        }
        if ( !empty( $retailer->tmp_longitude ) )
        {
            $data['longitude'] = $retailer->tmp_longitude;
            $data['tmp_longitude'] = null;
            $data['status'] = null;
        }else{
            unset( $data['longitude'] );
        }
        if ( !empty( $retailer->tmp_latitude ) )
        {
            $data['latitude'] = $retailer->tmp_latitude;
            $data['tmp_latitude'] = null;
            $data['status'] = null;
        }else{
            unset( $data['latitude'] );
        }
        if ( !empty( $retailer->tmp_device_name ) )
        {
            $data['device_name'] = $retailer->tmp_device_name;
            $data['tmp_device_name'] = null;
            $data['status'] = null;
        }else{
            unset( $data['device_name'] );
        }
        if ( !empty( $retailer->tmp_device_sn ) )
        {
            $data['device_sn'] = $retailer->tmp_device_sn;
            $data['tmp_device_sn'] = null;
            $data['status'] = null;
        }else{
            unset( $data['device_sn'] );
        }
        if ( !empty( $retailer->tmp_scanner_sn ) )
        {
            $data['scanner_sn'] = $retailer->tmp_scanner_sn;
            $data['tmp_scanner_sn'] = null;
            $data['status'] = null;
        }else{
            unset( $data['scanner_sn'] );
        }
        if ( !empty( $retailer->tmp_scanner_sn ) )
        {
            $data['scanner_sn'] = $retailer->tmp_scanner_sn;
            $data['tmp_scanner_sn'] = null;
            $data['status'] = null;
        }else{
            unset( $data['scanner_sn'] );
        }


        if( $retailer->update( $data ) )
        {
            $userId = Rso::firstWhere('id', $retailer->rso_id)->user_id;
            $userRso = User::firstWhere('id', $userId);
            Notification::sendNow($userRso, new ApprovedNotification( $retailer, Auth::user() ));

            return redirect()->route('retailer.index')->with('success','Approved successfully.');
        }
        return redirect()->route('retailer.index')->with('error','Approved failed.');
    }
}
