<?php

namespace Shoreline;

use Illuminate\Database\Eloquent\Model;

/**
 * Shoreline\Profile
 *
 * @property int $id
 * @property int $user_id
 * @property string $avatar
 * @property string $user_title
 * @property string $riu_username
 * @property string $instagram_handle
 * @property string $facebook_url
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Profile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Profile query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Profile whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Profile whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Profile whereFacebookUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Profile whereInstagramHandle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Profile whereRiuUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Profile whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Profile whereUserTitle($value)
 * @mixin \Eloquent
 * @property int $public
 * @property string $chuckers_paradise
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Profile whereChuckersParadise($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Profile wherePublic($value)
 * @property-read \Shoreline\Image $image
 * @property-read \Shoreline\User $user
 */
class Profile extends Model
{
    protected $fillable = [
        'avatar',
        'riu_username',
        'instagram_handle',
        'facebook_url',
        'chuckers_paradise',
        'public',
        'user_title',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function image()
    {
        return $this->morphOne('Shoreline\Image', 'imageable');
    }
}
