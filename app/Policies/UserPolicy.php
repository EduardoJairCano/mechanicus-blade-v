<?php

namespace App\Policies;

use App\Models\Customer;
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
     * Validation for owner users to delete their own administrators.
     *
     * @param User $authUser
     * @param User $administrator
     * @return bool
     */
    public function deleteAdministrator(User $authUser, User $administrator): bool
    {
        return $authUser->id === $administrator->owner[0]->id && $authUser->isOwner();
    }

    /* ---- Customer actions ------------------------------------------------------------------- */
    /**
     * Validation to know if the customer belongs to the user logged.
     *
     * @param User $authUser
     * @param Customer $customer
     * @return bool
     */
    public function showCustomer(User $authUser, Customer $customer): bool
    {
        if ($authUser->hasRole(['owner'])) {
            return $authUser->id === $customer->user_id;
        }

        if ($authUser->hasRole(['admin'])) {
            return $authUser->owner[0]->id === $customer->user_id;
        }

        return false;
    }

    /**
     * Validation for users to edit and update their own customers.
     *
     * @param User $authUser
     * @param Customer $customer
     * @return bool
     */
    public function editAndUpdateCustomer(User $authUser, Customer $customer): bool
    {
        if ($authUser->hasRole(['owner'])) {
            return $authUser->id === $customer->user_id;
        }

        if ($authUser->hasRole(['admin'])) {
            return $authUser->owner[0]->id === $customer->user_id;
        }

        return false;
    }

    /**
     * Validation for owner users to delete their own customers.
     *
     * @param User $authUser
     * @param Customer $customer
     * @return bool
     */
    public function deleteCustomer(User $authUser, Customer $customer): bool
    {
        return $authUser->id === $customer->user_id && $authUser->isOwner();
    }
}
