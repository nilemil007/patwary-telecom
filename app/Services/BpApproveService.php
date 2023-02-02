<?php
namespace App\Services;

use Illuminate\Http\RedirectResponse;

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
        $data = $request->validated();

        if ( isset( $bp->tmp_personal_number ) )
        {
            $data['personal_number'] = $bp->tmp_personal_number;
            $data['tmp_personal_number'] = '';
        }else{
            unset( $data['personal_number'] );
        }

        if ( isset(  ) )
        {

        }else{

        }

        if ( $bp->tmp_personal_number )
        {
            dd('has');
            unset( $additionalData['personal_number'] );
            $additionalData['tmp_personal_number'] = $request->personal_number;
            $additionalData['status'] = 'unapproved';
        }else{
            dd('not');
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
        if ( $bp->dob != $request->dob )
        {
            unset( $additionalData['dob'] );
            $additionalData['tmp_dob'] = $request->dob;
            $additionalData['status'] = 'unapproved';
        }

        if( $bp->update( $additionalData ) )
        {
            return redirect()->back()->with('success','Information updated successfully.');
        }
    }
}
