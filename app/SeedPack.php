<?php

namespace Shoreline;

use Illuminate\Database\Eloquent\Model;

/**
 * Shoreline\SeedPack
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\SeedPack newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\SeedPack newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\SeedPack query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\SeedPack whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\SeedPack whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\SeedPack whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $strain_id
 * @property string $available_since
 * @property int $qty_per_pack
 * @property int $price
 * @property int $inventory
 * @property-read \Shoreline\Strain $strain
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\SeedPack whereAvailableSince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\SeedPack whereInventory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\SeedPack wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\SeedPack whereQtyPerPack($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\SeedPack whereStrainId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\SeedPack whereInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\SeedPack whereUuid($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\Shoreline\Invoice[] $invoices
 * @property string $uuid
 * @property-read \Illuminate\Database\Eloquent\Collection|\Shoreline\Cart[] $carts
 */
class SeedPack extends BaseModel
{
    protected $guarded = [];
    protected $attributes = [
        'price' => 60,
        'qty_per_pack' => 6,
        'feminized' => false,
        's1' => false,
    ];

    public function strain()
    {
        return $this->belongsTo(Strain::class);
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class)
                    ->using(CartSeedPack::class)
                    ->withPivot([
                        'quantity'
                    ]);
    }

    public function invoices()
    {
        return $this->belongsToMany(Invoice::class)
                    ->using(InvoiceSeedPack::class)
                    ->withPivot([
                        'quantity'
                    ]);
    }
}
