<?php
namespace App\Services;


use App\Events\BrandPromoter\BpAdditionalInfoUpdateEvent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;

class BpAdditionalInfoService {

    /**
     * Update the specified resource in storage.
     *
     * @param $request
     * @param $bp
     * @return RedirectResponse
     */
    public function update( $request, $bp): RedirectResponse
    {
        $additionalData = $request->validated();

        if ( $bp->personal_number != $request->personal_number )
        {
            unset( $additionalData['personal_number'] );
            $additionalData['tmp_personal_number'] = $request->personal_number;
            $additionalData['status'] = 'unapproved';
        }
        if ( $bp->blood_group != $request->blood_group )
        {
            unset( $additionalData['blood_group'] );
            $additionalData['tmp_blood_group'] = $request->blood_group;
            $additionalData['status'] = 'unapproved';
        }
        if ( $bp->education != $request->education )
        {
            unset( $additionalData['education'] );
            $additionalData['tmp_education'] = $request->education;
            $additionalData['status'] = 'unapproved';
        }
        if ( $bp->father_name != $request->father_name )
        {
            unset( $additionalData['father_name'] );
            $additionalData['tmp_father_name'] = $request->father_name;
            $additionalData['status'] = 'unapproved';
        }
        if ( $bp->mother_name != $request->mother_name )
        {
            unset( $additionalData['mother_name'] );
            $additionalData['tmp_mother_name'] = $request->mother_name;
            $additionalData['status'] = 'unapproved';
        }
        if ( $bp->division != $request->division )
        {
            unset( $additionalData['division'] );
            $additionalData['tmp_division'] = $request->division;
            $additionalData['status'] = 'unapproved';
        }
        if ( $bp->district != $request->district )
        {
            unset( $additionalData['district'] );
            $additionalData['tmp_district'] = $request->district;
            $additionalData['status'] = 'unapproved';
        }
        if ( $bp->thana != $request->thana )
        {
            unset( $additionalData['thana'] );
            $additionalData['tmp_thana'] = $request->thana;
            $additionalData['status'] = 'unapproved';
        }
        if ( $bp->address != $request->address )
        {
            unset( $additionalData['address'] );
            $additionalData['tmp_address'] = $request->address;
            $additionalData['status'] = 'unapproved';
        }
        if ( $bp->nid != $request->nid )
        {
            unset( $additionalData['nid'] );
            $additionalData['tmp_nid'] = $request->nid;
            $additionalData['status'] = 'unapproved';
        }
        if ( $bp->bank_name != $request->bank_name )
        {
            unset( $additionalData['bank_name'] );
            $additionalData['tmp_bank_name'] = $request->bank_name;
            $additionalData['status'] = 'unapproved';
        }
        if ( $bp->brunch_name != $request->brunch_name )
        {
            unset( $additionalData['brunch_name'] );
            $additionalData['tmp_brunch_name'] = $request->brunch_name;
            $additionalData['status'] = 'unapproved';
        }
        if ( $bp->account_number != $request->account_number )
        {
            unset( $additionalData['account_number'] );
            $additionalData['tmp_account_number'] = $request->account_number;
            $additionalData['status'] = 'unapproved';
        }
        if ( !empty($bp->dob) && $bp->dob->toDateString() != $request->dob )
        {
            unset( $additionalData['dob'] );
            $additionalData['tmp_dob'] = $request->dob;
            $additionalData['status'] = 'unapproved';
        }

        dd($additionalData);
        if( $bp->update( $additionalData ) )
        {
            Event::dispatch( new BpAdditionalInfoUpdateEvent( Auth::user() ) );

            return redirect()->back()->with('success','Update request sent successfully.');
        }
    }
}
