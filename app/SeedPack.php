<?php

namespace Seeds;

use Illuminate\Database\Eloquent\Model;

/**
 * Seeds\SeedPack
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\SeedPack newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\SeedPack newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\SeedPack query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\SeedPack whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\SeedPack whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\SeedPack whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $strain_id
 * @property string $available_since
 * @property int $qty_per_pack
 * @property int $price
 * @property int $inventory
 * @property-read \Seeds\Strain $strain
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\SeedPack whereAvailableSince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\SeedPack whereInventory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\SeedPack wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\SeedPack whereQtyPerPack($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\SeedPack whereStrainId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\SeedPack whereInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\SeedPack whereUuid($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\Seeds\Invoice[] $invoices
 * @property string $uuid
 * @property-read \Illuminate\Database\Eloquent\Collection|\Seeds\Cart[] $carts
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
