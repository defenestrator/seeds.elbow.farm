<?php

namespace Seeds;

use Illuminate\Database\Eloquent\Model;

/**
 * Seeds\Breeder
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $name
 * @property string|null $description
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Seeds\User $users
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Breeder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Breeder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Breeder query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Breeder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Breeder whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Breeder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Breeder whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Breeder whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Breeder whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Breeder whereUserId($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\Seeds\Strain[] $strains
 * @property string|null $uuid
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Breeder whereUuid($value)
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
