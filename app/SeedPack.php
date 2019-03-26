<?php

namespace Heisen;

use Illuminate\Database\Eloquent\Model;

/**
 * Heisen\SeedPack
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\SeedPack newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\SeedPack newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\SeedPack query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\SeedPack whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\SeedPack whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\SeedPack whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $strain_id
 * @property string $available_since
 * @property int $qty_per_pack
 * @property int $price
 * @property int $inventory
 * @property-read \Heisen\Strain $strain
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\SeedPack whereAvailableSince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\SeedPack whereInventory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\SeedPack wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\SeedPack whereQtyPerPack($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\SeedPack whereStrainId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\SeedPack whereInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\SeedPack whereUuid($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\Heisen\Invoice[] $invoices
 */
class SeedPack extends BaseModel
{
    public function strain()
    {
        return $this->belongsTo(Strain::class);
    }
    
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
