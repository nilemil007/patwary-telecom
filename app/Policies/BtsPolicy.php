<?php

namespace App\Policies;

use App\Models\Bts;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class BtsPolicy
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
//        return $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param  \App\Models\Bts  $bts
     * @return Response|bool
     */
    public function view(User $user, Bts $bts)
    {
        //
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
     * @param  \App\Models\Bts  $bts
     * @return Response|bool
     */
    public function update(User $user, Bts $bts)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param  \App\Models\Bts  $bts
     * @return Response|bool
     */
    public function delete(User $user, Bts $bts)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param  \App\Models\Bts  $bts
     * @return Response|bool
     */
    public function restore(User $user, Bts $bts)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param  \App\Models\Bts  $bts
     * @return Response|bool
     */
    public function forceDelete(User $user, Bts $bts)
    {
        //
    }
}
