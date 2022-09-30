<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    protected $fillable = [
        'category',
        'name',
        'places_taken',
        'day_fee',
        'night_fee',
    ];
}
