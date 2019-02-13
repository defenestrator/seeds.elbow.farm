<?php

namespace Heisen;

use Illuminate\Database\Eloquent\Model;

/**
 * Heisen\SeedType
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Heisen\Strain[] $strains
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\SeedType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\SeedType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\SeedType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\SeedType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\SeedType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\SeedType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\SeedType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\SeedType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SeedType extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    public function strain()
    {
        return $this->hasMany(Strain::class);
    }
}
