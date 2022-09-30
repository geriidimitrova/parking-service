<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegisteredVehicle extends Model
{
    public $timestamps = false;

    protected $casts = [
        'id' => 'string',
    ];

    protected $fillable = [
        'id',
        'vehicle_type_id',
        'entrance_time',
        'discount_card_id'
    ];

    /**
     * Get vehicle's type
     *
     * @return mixed
     */
    public function vehicleType()
    {
        return $this->belongsTo(VehicleType::class);
    }

    /**
     * Get discount card
     *
     * @return mixed
     */
    public function discountCard()
    {
        return $this->belongsTo(DiscountCard::class);
    }
}
