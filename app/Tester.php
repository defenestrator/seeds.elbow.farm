<?php

namespace Seeds;

use Illuminate\Database\Eloquent\Model;

/**
 * Seeds\Tester
 *
 * @property int $id
 * @property string $address_1
 * @property string|null $address_2
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $postcode
 * @property string $name
 * @property string $email_address
 * @property string|null $message
 * @property string|null $journal_link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Tester newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Tester newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Tester query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Tester whereAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Tester whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Tester whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Tester whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Tester whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Tester whereEmailAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Tester whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Tester whereJournalLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Tester whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Tester whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Tester wherePostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Tester whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\Tester whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tester extends Model
{
    protected $fillable = [
        'name',
        'address_1',
        'address_2',
        'state',
        'city',
        'country',
        'postcode',
        'email_address',

        'message',
        'journal_link'
    ];
}
