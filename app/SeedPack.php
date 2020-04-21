<?php

namespace Cheeba;

use Illuminate\Database\Eloquent\Model;

/**
 * Cheeba\SeedPack
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\SeedPack newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\SeedPack newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\SeedPack query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\SeedPack whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\SeedPack whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\SeedPack whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $strain_id
 * @property string $available_since
 * @property int $qty_per_pack
 * @property int $price
 * @property int $inventory
 * @property-read \Cheeba\Strain $strain
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\SeedPack whereAvailableSince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\SeedPack whereInventory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\SeedPack wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\SeedPack whereQtyPerPack($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\SeedPack whereStrainId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\SeedPack whereInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\SeedPack whereUuid($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cheeba\Invoice[] $invoices
 * @property string $uuid
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cheeba\Cart[] $carts
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
