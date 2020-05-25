<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class karyawan extends Model
{
    protected $guarded = [];
    use SoftDeletes;

    public function status()
    {
        return $this->belongsTo(status::class, 'status_id', 'id');
    }

    public function jabatan()
    {
        return $this->belongsTo(jabatan::class, 'jabatan_id', 'id');
    }

    public function pendidikan()
    {
        return $this->belongsTo(pendidikan::class, 'pendidikan_id', 'id');
    }
}
