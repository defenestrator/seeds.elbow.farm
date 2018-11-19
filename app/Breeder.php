<?php

namespace Heisen;

use Illuminate\Database\Eloquent\Model;

/**
 * Heisen\Breeder
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $name
 * @property string|null $description
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Heisen\User $users
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Breeder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Breeder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Breeder query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Breeder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Breeder whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Breeder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Breeder whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Breeder whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Breeder whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Breeder whereUserId($value)
 * @mixin \Eloquent
 */
class Breeder extends Model
{
    protected $fillable = [
        'name', 'image', 'description'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
