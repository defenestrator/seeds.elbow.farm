<?php

namespace Heisen;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['thumbnail', 'large', 'stamp'];
}
