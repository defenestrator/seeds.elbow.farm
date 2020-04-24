<?php

namespace Shoreline;

use Illuminate\Database\Eloquent\Model;

/**
 * Shoreline\Breeder
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $name
 * @property string|null $description
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Shoreline\User $users
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Breeder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Breeder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Breeder query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Breeder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Breeder whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Breeder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Breeder whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Breeder whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Breeder whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Breeder whereUserId($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\Shoreline\Strain[] $strains
 * @property string|null $uuid
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Breeder whereUuid($value)
 */
class Breeder extends Model
{
    protected $fillable = [
        'name', 'image', 'description'
    ];

    public function strains()
    {
        return $this->hasMany(Strain::class);
    }

}
