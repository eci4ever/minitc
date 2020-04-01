<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Verify extends Model
{
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'minute_id',
        'arahan',
        'pengesah',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

}
