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

    /* ---- UserInfo actions ------------------------------------------------------------------- */
    /**
     * Validation for users to edit & update their own userInfo.
     *
     * @param User $authUser
     * @param User $user
     * @return bool
     */
    public function editAndUpdateOwnUserInfo(User $authUser, User $user): bool
    {
        return $authUser->id === $user->id;
    }

    /* ---- Administrator actions -------------------------------------------------------------- */
    /**
     * Validation for users to create a new administrator.
     *
     * @param User $authUser
     * @param User $user
     * @return bool
     */
    public function createAdministrator(User $authUser, User $user): bool
    {
        return $authUser->isOwner();
    }

    /**
     * Validation for users to see their own administrators.
     *
     * @param User $authUser
     * @param User $administrator
     * @return bool
     */
    public function showAdministrator(User $authUser, User $administrator): bool
    {
        return $authUser->id === $administrator->owner[0]->id && $authUser->isOwner();
    }

    /**
     * Validation for users to edit and update their own administrators.
     *
     * @param User $authUser
     * @param User $administrator
     * @return bool
     */
    public function editAndUpdateAdministrator(User $authUser, User $administrator): bool
    {
        return $authUser->id === $administrator->owner[0]->id && $authUser->isOwner();
    }

    /**
     * Validation for users to edit and update their own administrators.
     *
     * @param User $authUser
     * @param User $administrator
     * @return bool
     */
    public function deleteAdministrator(User $authUser, User $administrator): bool
    {
        return $authUser->id === $administrator->owner[0]->id && $authUser->isOwner();
    }
}
