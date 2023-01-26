<?php

namespace App\Policies;

use App\Models\ItopReplace;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class ItopReplacePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function viewAny(User $user): Response|bool
    {
        return $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param ItopReplace $itopReplace
     * @return Response|bool
     */
    public function view(User $user, ItopReplace $itopReplace): Response|bool
    {
        return $user->id === $itopReplace->user_id ? Response::allow() : Response::deny('এই সেবা টি আপনার জন্য প্রযোজ্য নয়।');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param ItopReplace $itopReplace
     * @return Response|bool
     */
    public function update(User $user, ItopReplace $itopReplace): Response|bool
    {
        if ( Auth::user()->role == 'super-admin' || $user->id === $itopReplace->user_id )
        {
            return Response::allow();
        }else{
            return Response::deny('এই সেবা টি আপনার জন্য প্রযোজ্য নয়।');
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param ItopReplace $itopReplace
     * @return Response|bool
     */
    public function delete(User $user, ItopReplace $itopReplace)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param ItopReplace $itopReplace
     * @return Response|bool
     */
    public function restore(User $user, ItopReplace $itopReplace)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param ItopReplace $itopReplace
     * @return Response|bool
     */
    public function forceDelete(User $user, ItopReplace $itopReplace)
    {
        //
    }
}
