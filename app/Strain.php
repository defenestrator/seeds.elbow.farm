<?php

namespace Cheeba;

use Illuminate\Database\Eloquent\Model;

/**
 * Cheeba\Strain
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
 * @property-read \Cheeba\Breeder $breeders
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Strain newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Strain newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Strain query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Strain whereBreederId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Strain whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Strain whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Strain whereFloweringTimeMaxWeeks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Strain whereFloweringTimeMinWeeks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Strain whereGenetics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Strain whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Strain whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Strain whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Strain whereRetailPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Strain whereFeminized($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Strain whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Cheeba\Breeder $breeder
 * @property int $qty_per_pack
 * @property int $inventory
 * @property int $published
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Strain whereInventory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Strain wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Strain whereQtyPerPack($value)
 * @property int $seed_pack_id
 * @property int|null $image_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cheeba\SeedPack[] $seedPacks
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Strain whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Strain whereSeedPackId($value)
 * @property string|null $uuid
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Strain whereUuid($value)
 * @property int $s1
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Strain whereS1($value)
 * @property-read \Cheeba\Image $images
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
        return $this->morphOne('Cheeba\Image', 'imageable');
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
