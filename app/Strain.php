<?php

namespace Heisen;

use Illuminate\Database\Eloquent\Model;

/**
 * Heisen\Strain
 *
 * @property int $id
 * @property bool $feminized
 * @property int $breeder_id
 * @property string $name
 * @property string $image
 * @property string $genetics
 * @property string $description
 * @property int $retail_price
 * @property int $flowering_time_min_weeks
 * @property int $flowering_time_max_weeks
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Heisen\Breeder $breeders
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Strain newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Strain newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Strain query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Strain whereBreederId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Strain whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Strain whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Strain whereFloweringTimeMaxWeeks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Strain whereFloweringTimeMinWeeks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Strain whereGenetics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Strain whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Strain whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Strain whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Strain whereRetailPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Strain whereFeminized($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Strain whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Heisen\Breeder $breeder
 * @property int $qty_per_pack
 * @property int $inventory
 * @property int $published
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Strain whereInventory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Strain wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Strain whereQtyPerPack($value)
 * @property int $seed_pack_id
 * @property int|null $image_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\Heisen\SeedPack[] $seedPacks
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Strain whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Strain whereSeedPackId($value)
 * @property string|null $uuid
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Strain whereUuid($value)
 * @property int $s1
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Strain whereS1($value)
 */
class Strain extends BaseModel
{

    protected $fillable = [
        'name',
        'feminized',
        's1',
        'uuid',
        'image',
        'image_id',
        'genetics',
        'description',
        'breeder_id',
        'flowering_time_max_weeks',
        'flowering_time_min_weeks',
        'published',
    ];

    protected $attributes = [
        'feminized' => true
    ];

    public function images()
    {
        return $this->morphOne('Heisen\Image', 'imageable');
    }

    public function breeder()
    {
        return $this->belongsTo(Breeder::class);
    }

    public function seedPacks()
    {
        return $this->hasMany(SeedPack::class);
    }
}
