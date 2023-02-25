<?php

namespace App\Policies\Retailer;

use App\Models\Retailer;
use App\Models\Rso;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class RetailerPolicy
{
    use HandlesAuthorization;

    /**
     * Perform pre-authorization checks.
     */
    public function before(User $user, string $ability): bool|null
    {
        if ( $user->role == 'super-admin' ) {
            return true;
        }

        return null;
    }


    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Retailer $retailer
     * @return Response|bool
     */
    public function view(User $user, Retailer $retailer): Response|bool
    {
//        return Rso::firstWhere('user_id', $user->id)->id == $retailer->rso_id;
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
     * @param Retailer $retailer
     * @return Response|bool
     */
    public function update(User $user, Retailer $retailer)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Retailer $retailer
     * @return Response|bool
     */
    public function delete(User $user, Retailer $retailer)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Retailer $retailer
     * @return Response|bool
     */
    public function restore(User $user, Retailer $retailer)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Retailer $retailer
     * @return Response|bool
     */
    public function forceDelete(User $user, Retailer $retailer)
    {
        //
    }
}
