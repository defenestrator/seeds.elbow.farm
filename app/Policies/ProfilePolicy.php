<?php

namespace Cheeba\Policies;

use Auth;
use Cheeba\Profile;
use Cheeba\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the profile.
     *
     * @param  \Cheeba\User  $user
     * @param  \Cheeba\Profile  $profile
     * @return mixed
     */
    public function view()
    {
        if (Profile::find(Auth::user()->id) || $profile->public == true) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the profile.
     *
     * @return bool
     */
    public function update($user)
    {
        if (Auth::user()->profile_id == $user->profile_id) {
            return true;
        }
        return false;
    }



}
