<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cares extends Model
{
    protected $fillable = [
        'name',
        'description',
        'frequency',
    ];

}
