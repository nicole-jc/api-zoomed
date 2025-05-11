<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
        protected $fillable = [
        'name',
        'description',
        'birthdate',
        'class_id',
        'specie_id',
        'habitat',
        'country'
    ];

}
