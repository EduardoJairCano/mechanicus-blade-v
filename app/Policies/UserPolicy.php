<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /*public function before($user, $ability): ?bool
    {
        return $user->hasRole(['owner, admin']);
    }*/

    /**
     * Validation for edit & update own user info.
     *
     * @param User $authUser
     * @param User $user
     * @return bool
     */
    public function editAndUpdateOwnUserInfo(User $authUser, User $user): bool
    {
        return $authUser->id === $user->id;
    }
}
