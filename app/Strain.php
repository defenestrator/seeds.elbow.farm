<?php

namespace Seeds;

use Illuminate\Database\Eloquent\Model;

/**
 * Seeds\Strain
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
 * @property-read \Seeds\Breeder $breeders
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Strain newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Strain newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Strain query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Strain whereBreederId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Strain whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Strain whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Strain whereFloweringTimeMaxWeeks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Strain whereFloweringTimeMinWeeks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Strain whereGenetics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Strain whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Strain whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Strain whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Strain whereRetailPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Strain whereFeminized($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Strain whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Seeds\Breeder $breeder
 * @property int $qty_per_pack
 * @property int $inventory
 * @property int $published
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Strain whereInventory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Strain wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Strain whereQtyPerPack($value)
 * @property int $seed_pack_id
 * @property int|null $image_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\Seeds\SeedPack[] $seedPacks
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Strain whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Strain whereSeedPackId($value)
 * @property string|null $uuid
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Strain whereUuid($value)
 * @property int $s1
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Strain whereS1($value)
 * @property-read \Seeds\Image $images
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
        return $this->morphOne('Seeds\Image', 'imageable');
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
