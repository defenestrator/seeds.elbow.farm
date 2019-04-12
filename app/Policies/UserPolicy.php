<?php

namespace Heisen\Policies;

use Heisen\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \Heisen\User  $user
     * @param  \Heisen\User  $model
     * @return mixed
     */
    public function view(User $user, User $model)
    {
        return Auth::user()->id === $user->id && $user->id === $model->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \Heisen\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        $this->middleware('guest');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \Heisen\User  $user
     * @param  \Heisen\User  $model
     * @return mixed
     */
    public function update(User $user, User $model)
    {
        return Auth::user()->id === $user->id && $user->id === $model->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \Heisen\User  $user
     * @param  \Heisen\User  $model
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        return Auth::user()->id === $user->id && $user->id === $model->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \Heisen\User  $user
     * @param  \Heisen\User  $model
     * @return mixed
     */
    public function restore(User $user, User $model)
    {
        $this->middleware('role:admin');

        return;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \Heisen\User  $user
     * @param  \Heisen\User  $model
     * @return mixed
     */
    public function forceDelete(User $user, User $model)
    {
        $this->middleware('role:admin');

        return;
    }
}
