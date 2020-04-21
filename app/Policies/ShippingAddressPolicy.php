<?php

namespace Cheeba\Policies;

use Cheeba\User;
use Cheeba\ShippingAddress;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShippingAddressPolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can view the shipping address.
     *
     * @param  \Cheeba\User  $user
     * @param  \Cheeba\ShippingAddress  $shippingAddress
     * @return mixed
     */
    public function view(ShippingAddress $shippingAddress)
    {
        return Auth::user()->id === $shippingAddress->user_id;
    }

    /**
     * Determine whether the user can create shipping addresses.
     *
     * @param  \Cheeba\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return Auth::user()->id === $user->id;
    }

    /**
     * Determine whether the user can update the shipping address.
     *
     * @param  \Cheeba\User  $user
     * @param  \Cheeba\ShippingAddress  $shippingAddress
     * @return mixed
     */
    public function update(User $user, ShippingAddress $shippingAddress)
    {
        return Auth::user()->id === $shippingAddress->user_id;
    }

    /**
     * Determine whether the user can delete the shipping address.
     *
     * @param  \Cheeba\User  $user
     * @param  \Cheeba\ShippingAddress  $shippingAddress
     * @return mixed
     */
    public function delete(User $user, ShippingAddress $shippingAddress)
    {
        return Auth::user()->id === $shippingAddress->user_id;
    }

}
