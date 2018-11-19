<?php

namespace Heisen;

use Illuminate\Database\Eloquent\Model;

/**
 * Heisen\Tester
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
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Tester newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Tester newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Tester query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Tester whereAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Tester whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Tester whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Tester whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Tester whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Tester whereEmailAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Tester whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Tester whereJournalLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Tester whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Tester whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Tester wherePostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Tester whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Heisen\Tester whereUpdatedAt($value)
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
