<?php

namespace Cheeba;

use Illuminate\Database\Eloquent\Model;

/**
 * Cheeba\Profile
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
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Profile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Profile query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Profile whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Profile whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Profile whereFacebookUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Profile whereInstagramHandle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Profile whereRiuUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Profile whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Profile whereUserTitle($value)
 * @mixin \Eloquent
 * @property int $public
 * @property string $chuckers_paradise
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Profile whereChuckersParadise($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Profile wherePublic($value)
 * @property-read \Cheeba\Image $image
 * @property-read \Cheeba\User $user
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
        return $this->morphOne('Cheeba\Image', 'imageable');
    }
}
