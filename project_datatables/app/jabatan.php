<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class jabatan extends Model
{
    protected $guarded = [];
    use SoftDeletes;
}
