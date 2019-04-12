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
    public function view(User $user, Invoice $invoice)
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
    public function update(User $user, Invoice $invoice)
    {
        return Auth::user()->id === $invoice->id;
    }

    /**
     * Determine whether the user can delete the invoice.
     *
     * @param  \Heisen\User  $user
     * @param  \Heisen\Invoice  $invoice
     * @return mixed
     */
    public function delete(User $user, Invoice $invoice)
    {
        $this->middleware('role:admin');
        return;
    }

    /**
     * Determine whether the user can restore the invoice.
     *
     * @param  \Heisen\User  $user
     * @param  \Heisen\Invoice  $invoice
     * @return mixed
     */
    public function restore(User $user, Invoice $invoice)
    {
        $this->middleware('role:admin');
        return;
    }

    /**
     * Determine whether the user can permanently delete the invoice.
     *
     * @param  \Heisen\User  $user
     * @param  \Heisen\Invoice  $invoice
     * @return mixed
     */
    public function forceDelete(User $user, Invoice $invoice)
    {
        $this->middleware('role:admin');
        return;
    }
}
