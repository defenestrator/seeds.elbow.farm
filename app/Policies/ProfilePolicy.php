<?php

namespace Heisen\Policies;

use Auth;
use Heisen\Profile;
use Heisen\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the profile.
     *
     * @param  \Heisen\User  $user
     * @param  \Heisen\Profile  $profile
     * @return mixed
     */
    public function view(User $user, Profile $profile)
    {
        return true;// return Auth::user()->id === $profile->user_id || $profile->public === true;
    }

    /**
     * Determine whether the user can update the profile.
     *
     * @param  \Heisen\User  $user
     * @param  \Heisen\Profile  $profile
     * @return mixed
     */
    public function update(User $user, Profile $profile)
    {
        return Auth::user()->id === $profile->user_id;
    }



}
