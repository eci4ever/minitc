<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Announcement extends Model
{
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'datetime',
    ];

    protected $fillable = [
        'title',
        'datetime',
        'content',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
