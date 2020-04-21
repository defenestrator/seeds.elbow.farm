<?php

namespace Cheeba;

use Illuminate\Database\Eloquent\Model;

/**
 * Cheeba\Tester
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
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Tester newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Tester newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Tester query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Tester whereAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Tester whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Tester whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Tester whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Tester whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Tester whereEmailAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Tester whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Tester whereJournalLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Tester whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Tester whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Tester wherePostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Tester whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Cheeba\Tester whereUpdatedAt($value)
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
