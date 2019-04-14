<?php

namespace Heisen\Policies;

use Heisen\User;
use Heisen\Invoice;
use Illuminate\Auth\Access\HandlesAuthorization;

class InvoicePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the invoice.
     *
     * @param  \Heisen\User  $user
     * @param  \Heisen\Invoice  $invoice
     * @return mixed
     */
    public function view(Invoice $invoice)
    {
        return Auth::user()->id === $invoice->id;
    }

    /**
     * Determine whether the user can create invoices.
     *
     * @param  \Heisen\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return Auth::user()->id === $user->id;
    }

    /**
     * Determine whether the user can update the invoice.
     *
     * @param  \Heisen\User  $user
     * @param  \Heisen\Invoice  $invoice
     * @return mixed
     */
    public function update(Invoice $invoice)
    {
        return Auth::user()->id === $invoice->id;
    }

}
