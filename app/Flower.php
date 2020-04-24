<?php

namespace Shoreline;

use Illuminate\Database\Eloquent\Model;

class Flower extends Model
{
    public function strain()
    {
        return $this->belongsTo(Strain::class);
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class)
                    ->using(CartFlower::class)
                    ->withPivot([
                        'quantity'
                    ]);
    }

    public function invoices()
    {
        return $this->belongsToMany(Invoice::class)
                    ->using(InvoiceFlower::class)
                    ->withPivot([
                        'quantity'
                    ]);
    }
}
