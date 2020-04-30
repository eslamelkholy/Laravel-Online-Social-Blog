<?php

namespace App\Policies;

use App\User;
use App\UsersPhone;
use Illuminate\Auth\Access\HandlesAuthorization;
use AUth;
class UsersPhonePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any users phones.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the users phone.
     *
     * @param  \App\User  $user
     * @param  \App\UsersPhone  $usersPhone
     * @return mixed
     */
    public function view(User $user, UsersPhone $usersPhone)
    {
        return $user->id == $usersPhone->user;
    }

    /**
     * Determine whether the user can create users phones.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->id == Auth::id();
    }

    /**
     * Determine whether the user can update the users phone.
     *
     * @param  \App\User  $user
     * @param  \App\UsersPhone  $usersPhone
     * @return mixed
     */
    public function update(User $user, UsersPhone $usersPhone)
    {
        return $user->id == $usersPhone->user;
    }

    /**
     * Determine whether the user can delete the users phone.
     *
     * @param  \App\User  $user
     * @param  \App\UsersPhone  $usersPhone
     * @return mixed
     */
    public function delete(User $user, UsersPhone $usersPhone)
    {
        return $user->id == $usersPhone->user;
    }

    /**
     * Determine whether the user can restore the users phone.
     *
     * @param  \App\User  $user
     * @param  \App\UsersPhone  $usersPhone
     * @return mixed
     */
    public function restore(User $user, UsersPhone $usersPhone)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the users phone.
     *
     * @param  \App\User  $user
     * @param  \App\UsersPhone  $usersPhone
     * @return mixed
     */
    public function forceDelete(User $user, UsersPhone $usersPhone)
    {
        //
    }
}
