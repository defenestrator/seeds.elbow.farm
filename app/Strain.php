<?php

namespace Shoreline;

use Illuminate\Database\Eloquent\Model;

/**
 * Shoreline\Strain
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
 * @property-read \Shoreline\Breeder $breeders
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Strain newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Strain newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Strain query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Strain whereBreederId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Strain whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Strain whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Strain whereFloweringTimeMaxWeeks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Strain whereFloweringTimeMinWeeks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Strain whereGenetics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Strain whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Strain whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Strain whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Strain whereRetailPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Strain whereFeminized($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Strain whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Shoreline\Breeder $breeder
 * @property int $qty_per_pack
 * @property int $inventory
 * @property int $published
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Strain whereInventory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Strain wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Strain whereQtyPerPack($value)
 * @property int $seed_pack_id
 * @property int|null $image_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\Shoreline\SeedPack[] $seedPacks
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Strain whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Strain whereSeedPackId($value)
 * @property string|null $uuid
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Strain whereUuid($value)
 * @property int $s1
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Strain whereS1($value)
 * @property-read \Shoreline\Image $images
 */
class Strain extends BaseModel
{

    protected $fillable = [
        'name',
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
    ];

    public function images()
    {
        return $this->morphOne('Shoreline\Image', 'imageable');
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
