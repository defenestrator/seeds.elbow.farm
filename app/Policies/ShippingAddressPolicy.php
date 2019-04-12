<?php

namespace Heisen\Policies;

use Heisen\User;
use Heisen\ShippingAddress;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShippingAddressPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Determine whether the user can view the shipping address.
     *
     * @param  \Heisen\User  $user
     * @param  \Heisen\ShippingAddress  $shippingAddress
     * @return mixed
     */
    public function view(ShippingAddress $shippingAddress)
    {
        return Auth::user()->id === $shippingAddress->user_id;
    }

    /**
     * Determine whether the user can create shipping addresses.
     *
     * @param  \Heisen\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return Auth::user()->id === $user->id;
    }

    /**
     * Determine whether the user can update the shipping address.
     *
     * @param  \Heisen\User  $user
     * @param  \Heisen\ShippingAddress  $shippingAddress
     * @return mixed
     */
    public function update(User $user, ShippingAddress $shippingAddress)
    {
        return Auth::user()->id === $shippingAddress->user_id;
    }

    /**
     * Determine whether the user can delete the shipping address.
     *
     * @param  \Heisen\User  $user
     * @param  \Heisen\ShippingAddress  $shippingAddress
     * @return mixed
     */
    public function delete(User $user, ShippingAddress $shippingAddress)
    {
        return Auth::user()->id === $shippingAddress->user_id;
    }

    /**
     * Determine whether the user can restore the shipping address.
     *
     * @param  \Heisen\User  $user
     * @param  \Heisen\ShippingAddress  $shippingAddress
     * @return mixed
     */
    public function restore(User $user, ShippingAddress $shippingAddress)
    {
        $this->middleware('role:admin');
        return;
    }

    /**
     * Determine whether the user can permanently delete the shipping address.
     *
     * @param  \Heisen\User  $user
     * @param  \Heisen\ShippingAddress  $shippingAddress
     * @return mixed
     */
    public function forceDelete(User $user, ShippingAddress $shippingAddress)
    {
        $this->middleware('role:admin');
        return;
    }
}