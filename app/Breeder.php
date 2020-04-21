<?php

namespace Cheeba;

use Illuminate\Database\Eloquent\Model;

/**
 * Cheeba\Breeder
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $name
 * @property string|null $description
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Cheeba\User $users
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Breeder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Breeder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Breeder query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Breeder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Breeder whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Breeder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Breeder whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Breeder whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Breeder whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Breeder whereUserId($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cheeba\Strain[] $strains
 * @property string|null $uuid
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Breeder whereUuid($value)
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
