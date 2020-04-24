<?php

namespace Shoreline;

use Illuminate\Database\Eloquent\Model;

/**
 * Shoreline\Tester
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
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Tester newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Tester newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Tester query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Tester whereAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Tester whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Tester whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Tester whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Tester whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Tester whereEmailAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Tester whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Tester whereJournalLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Tester whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Tester whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Tester wherePostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Tester whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Shoreline\Tester whereUpdatedAt($value)
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
