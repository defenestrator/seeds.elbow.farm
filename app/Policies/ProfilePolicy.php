<?php

namespace Heisen\Policies;

use Auth;
use Heisen\Profile;
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
    public function view(Profile $profile)
    {
        return Auth::user()->id === $profile->user_id || $profile->public === true;
    }

    /**
     * Determine whether the user can update the profile.
     *
     * @param  \Heisen\User  $user
     * @param  \Heisen\Profile  $profile
     * @return mixed
     */
    public function update(Profile $profile)
    {
        return Auth::user()->id === $profile->user_id;
    }

}
