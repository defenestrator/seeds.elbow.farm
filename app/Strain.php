<?php

namespace Heisen;

use Illuminate\Database\Eloquent\Model;

/**
 * Heisen\Strain
 *
 * @property int $id
 * @property int $seed_type_id
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
 * @property-read \Heisen\SeedType $seed_types
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
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Strain whereSeedTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Strain whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Heisen\Breeder $breeder
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\Models\Media[] $media
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Strain addMedia()
 */
class Strain extends Model
{

    protected $fillable = [
        'name', 'seed_type_id', 'image', 'genetics', 'description', 'breeder_id'
    ];

    public function breeder()
    {
        return $this->belongsTo(Breeder::class);
    }

    public function scopeAddMedia($query) {
        return $this->addMediaFromRequest($query);
    }

}
