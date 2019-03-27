<?php

namespace Heisen;

use Illuminate\Database\Eloquent\Model;

/**
 * Heisen\Profile
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
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Profile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Profile query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Profile whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Profile whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Profile whereFacebookUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Profile whereInstagramHandle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Profile whereRiuUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Profile whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Profile whereUserTitle($value)
 * @mixin \Eloquent
 * @property int $public
 * @property string $chuckers_paradise
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Profile whereChuckersParadise($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Profile wherePublic($value)
 */
class Profile extends Model
{
    protected $fillable = [
        'avatar',
        'riu_username',
        'instagram',
        'facebook_url',
        'chuckers_paradise'
    ];
}
