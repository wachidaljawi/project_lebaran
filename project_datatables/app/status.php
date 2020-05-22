<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class status extends Model
{
    protected $guarded = [];
    use SoftDeletes;
}
