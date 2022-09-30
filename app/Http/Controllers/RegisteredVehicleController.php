<?php

namespace App\Http\Controllers;

use App\Models\RegisteredVehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;

class RegisteredVehicleController extends BaseController
{
    /**
     * Get all registered vehicles in the parking
     *
     */
    public static function getAll()
    {
        return RegisteredVehicle::with(['vehicleType','discountCard'])->get()->all();
    }

    /**
     * Get vehicle by registration number
     *
     * @param mixed $id
     * @param Response $response
     *
     * @return Response
     */
    public function getOne(Response $response, ...$id)  : Response
    {
        $vehicle = RegisteredVehicle::where('id', $id)->with(['vehicleType','discountCard'])->first();

        return $response->setContent([
            'data' => $vehicle
        ]);
    }

    /**
     * @inheritDoc
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'registration_number'  => 'required',
            'vehicle_type' => 'required',
        ]);

        if ($validated) {
            try {
                DB::beginTransaction();
                RegisteredVehicle::create([
                    'id'               => $request->input('registration_number'),
                    'vehicle_type_id'  => $request->input('vehicle_type'),
                    'entrance_time'    => Carbon::now()->unix(),
                    'discount_card_id' => $request->input('has_discount'),
                ]);
                DB::commit();
                header('Location: /');
                exit;
            } catch (\Exception $e) {
                DB::rollBack();
                header('Location: /');
                return $e->getMessage();
            }
        }
    }

    /**
     * @inheritDoc
     */

    public function delete(...$id)
    {
        $vehicle = RegisteredVehicle::where('id', $id)->first();
        try {
            DB::beginTransaction();
            $vehicle->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }


}
