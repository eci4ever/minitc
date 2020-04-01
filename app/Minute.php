<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Minute extends Model
{
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'name',
        'anjuran',
        'tarikh',
        'masa',
        'tempat',
        'pegawai',
        'isu',
        'tindakan',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function verify()
    {
        return $this->hasOne(Verify::class);
    }
}
