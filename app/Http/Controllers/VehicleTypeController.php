<?php

namespace App\Http\Controllers;

use App\Models\VehicleType;
use Illuminate\Routing\Controller as BaseController;

class VehicleTypeController extends BaseController
{
    /**
     * Get all vehicle's types
     *
     */
    public static function getAll()
    {
        return VehicleType::all();
    }

}
