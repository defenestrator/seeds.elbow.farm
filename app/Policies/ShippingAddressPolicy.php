<?php

namespace Seeds\Policies;

use Seeds\User;
use Seeds\ShippingAddress;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShippingAddressPolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can view the shipping address.
     *
     * @param  \Seeds\User  $user
     * @param  \Seeds\ShippingAddress  $shippingAddress
     * @return mixed
     */
    public function view(ShippingAddress $shippingAddress)
    {
        return Auth::user()->id === $shippingAddress->user_id;
    }

    /**
     * Determine whether the user can create shipping addresses.
     *
     * @param  \Seeds\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return Auth::user()->id === $user->id;
    }

    /**
     * Determine whether the user can update the shipping address.
     *
     * @param  \Seeds\User  $user
     * @param  \Seeds\ShippingAddress  $shippingAddress
     * @return mixed
     */
    public function update(User $user, ShippingAddress $shippingAddress)
    {
        return Auth::user()->id === $shippingAddress->user_id;
    }

    /**
     * Determine whether the user can delete the shipping address.
     *
     * @param  \Seeds\User  $user
     * @param  \Seeds\ShippingAddress  $shippingAddress
     * @return mixed
     */
    public function delete(User $user, ShippingAddress $shippingAddress)
    {
        return Auth::user()->id === $shippingAddress->user_id;
    }

}
