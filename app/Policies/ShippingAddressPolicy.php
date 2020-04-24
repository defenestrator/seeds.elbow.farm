<?php

namespace Shoreline\Policies;

use Shoreline\User;
use Shoreline\ShippingAddress;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShippingAddressPolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can view the shipping address.
     *
     * @param  \Shoreline\User  $user
     * @param  \Shoreline\ShippingAddress  $shippingAddress
     * @return mixed
     */
    public function view(ShippingAddress $shippingAddress)
    {
        return Auth::user()->id === $shippingAddress->user_id;
    }

    /**
     * Determine whether the user can create shipping addresses.
     *
     * @param  \Shoreline\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return Auth::user()->id === $user->id;
    }

    /**
     * Determine whether the user can update the shipping address.
     *
     * @param  \Shoreline\User  $user
     * @param  \Shoreline\ShippingAddress  $shippingAddress
     * @return mixed
     */
    public function update(User $user, ShippingAddress $shippingAddress)
    {
        return Auth::user()->id === $shippingAddress->user_id;
    }

    /**
     * Determine whether the user can delete the shipping address.
     *
     * @param  \Shoreline\User  $user
     * @param  \Shoreline\ShippingAddress  $shippingAddress
     * @return mixed
     */
    public function delete(User $user, ShippingAddress $shippingAddress)
    {
        return Auth::user()->id === $shippingAddress->user_id;
    }

}
