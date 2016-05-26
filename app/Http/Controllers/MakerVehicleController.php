<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Maker;
use App\Models\Vehicle;
use App\Http\Requests\CreateVehicleRequest;

class MakerVehicleController extends Controller
{
    public function index($id)
    {
    	$maker = Maker::find($id);
    	if(!$maker)
    	{
    		return response()->json(['message' => 'This maker does not exit', 'code'=> 404], 404);
    	}

    	return response()->json(['data' => $maker->vehicles], 200);
    }

    public function store(CreateVehicleRequest $request, $maker_id)
    {

    	$maker = Maker::find($maker_id);
    	if(!$maker)
    	{
    		return response()->json(['message' => 'This maker does not spacify', 'code' => 404], 404);
    	}

    	$values = $request->all();

    	$maker->vehicles()->create($values);
    	return response()->json(['message' => 'The vehicle associated was created']);
    }

    public function show($id, $vehicle_id)
    {
        $maker = Maker::find($id);
        if(!$maker)
        {
            return response()->json(['message' => 'This maker does not exit', 'code'=> 404], 404);
        }

        $vehicle = $maker->vehicles->find($vehicle_id);
        if(!$vehicle)
        {
            return response()->json(['message' => 'This vehicle does not spacify', 'code' => 404], 404);
        }

        return response()->json(['data' => $vehicle], 200);
    }

    public function update(CreateVehicleRequest $request, $maker_id, $vehicle_id)
    {
        $maker = Maker::find($maker_id);
        if(!$maker_id)
        {
            return response()->json(['message' => 'This maker does not spacify', 'code' => 404], 404);
        }

        $vehicle = $maker->vehicles->find($vehicle_id);
        if(!$vehicle)
        {
            return response()->json(['message' => 'This vehicle does not spacify', 'code' => 404], 404);
        }

        $color = $request->get('color');
        $power = $request->get('power');
        $capacity = $request->get('capacity');
        $speed = $request->get('speed');

        $vehicle->color = $color;
        $vehicle->power = $power;
        $vehicle->capacity = $capacity;
        $vehicle->speed = $speed;

        $vehicle->save();
        return response()->json(['message' => 'vehicle correctly updated'], 201);
    }
}
