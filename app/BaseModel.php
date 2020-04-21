<?php

namespace Seeds;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
/**
 * Seeds\BaseModel
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\BaseModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\BaseModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Seeds\BaseModel query()
 * @mixin \Eloquent
 */
class BaseModel extends Model
{

    public static function makeUuid()
    {
        $uuid ='';

        try {
            $uuid= Uuid::uuid1()->toString();
        } catch (UnsatisfiedDependencyException $e) {
            // Some dependency was not met. Either the method cannot be called on a
            // 32-bit system, or it can, but it relies on Moontoast\Math to be present.
            echo 'Caught exception: ' . $e->getMessage() . "\n";
        }

        return $uuid;
    }
}
