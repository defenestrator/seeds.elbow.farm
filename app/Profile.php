<?php

namespace Seeds;

use Illuminate\Database\Eloquent\Model;

/**
 * Seeds\Profile
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
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Profile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Profile query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Profile whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Profile whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Profile whereFacebookUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Profile whereInstagramHandle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Profile whereRiuUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Profile whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Profile whereUserTitle($value)
 * @mixin \Eloquent
 * @property int $public
 * @property string $chuckers_paradise
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Profile whereChuckersParadise($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Profile wherePublic($value)
 * @property-read \Seeds\Image $image
 * @property-read \Seeds\User $user
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
        return $this->morphOne('Seeds\Image', 'imageable');
    }
}
