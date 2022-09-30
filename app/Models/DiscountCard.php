<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscountCard extends Model
{
    protected $fillable = [
        'name',
        'value',
    ];
}
