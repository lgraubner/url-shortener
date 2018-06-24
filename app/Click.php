<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'referrer'
    ];

    protected $visible= [
        'referrer', 'created_at'
    ];
}
