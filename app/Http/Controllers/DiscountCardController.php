<?php

namespace App\Http\Controllers;

use App\Models\DiscountCard;
use Illuminate\Routing\Controller as BaseController;

class DiscountCardController extends BaseController
{
    /**
     * Get all discount cards
     *
     */
    public static function getAll()
    {
        return DiscountCard::all();
    }

}
