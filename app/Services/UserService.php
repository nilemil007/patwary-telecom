<?php
namespace App\Services;

use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Bp;
use App\Models\BpDocument;
use App\Models\Cm;
use App\Models\CmDocument;
use App\Models\Nominee;
use App\Models\Rso;
use App\Models\RsoDocument;
use App\Models\Supervisor;
use App\Models\Tmo;
use App\Models\TmoDocument;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class UserService {

    /**
     * Store a newly created resource in storage.
     *
     * @param $request
     * @return bool
     */
    public function store( $request ): bool
    {
        $userData = $request->validated();

        if ( $request->hasFile('image') )
        {
            $imageName = $request->image->hashname();
            $request->image->storeAs('public/users', $imageName);
            $userData['image'] = $imageName;
        }else{
            unset( $userData['image'] );
        }

        $user = User::create( $userData );
        $user->assignRole($user->role);

        switch ( $user->role )
        {
            case 'rso':
                $rso = Rso::create(['user_id' => $user->id]);
                Nominee::create(['rso_id' => $rso->id]);
            break;

            case 'supervisor':
                Supervisor::create(['user_id' => $user->id]);
            break;

            case 'bp':
                Bp::create(['user_id' => $user->id]);
            break;

            case 'tmo':
                Tmo::create(['user_id' => $user->id]);
            break;

            case 'cm':
                Cm::create(['user_id' => $user->id]);
            break;
        }

        Session::flash('success', 'New user created successfully.');

        return true;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param $request
     * @param $id
     * @return bool
     */
    public function update( $request, $id): bool
    {
        $user = User::findOrFail( $id );

        $updateUser = $request->validated();


        if ( empty( $request->password ) )
        {
            unset( $updateUser['password'] );
        }

        if ( $request->hasFile('image') )
        {
            if ( File::exists( public_path($user->image) ) )
            {
                File::delete( $user->image );
            }

            $imgName = $request->image->hashname();
            $request->image->storeAs('public/users', $imgName);
            $updateUser['image'] = $imgName;
        }

        $user->update($updateUser);
        $user->syncRoles($request->role);

        return true;
    }

}
