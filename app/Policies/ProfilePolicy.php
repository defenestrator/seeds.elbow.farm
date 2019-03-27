<?php

namespace Heisen\Policies;

use Heisen\User;
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
    public function view(User $user, Profile $profile)
    {
        if( $user->id === $profile->user_id || $profile->public === true ) {
            return Auth::check();
        }

        return false;
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
        return $user->id === $profile->user_id;
    }

}
