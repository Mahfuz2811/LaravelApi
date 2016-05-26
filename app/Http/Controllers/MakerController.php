<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Maker;
use App\Models\Vehicle;
use App\Http\Requests\CreateMakerRequest;

class MakerController extends Controller
{
    public function index()
    {
    	$makers = Maker::all();
    	return response()->json(['data'=> $makers],200);
    }

    public function show($id)
    {
    	$makers = Maker::find($id);
    	if(!$makers)
    	{
    		return response()->json(['message'=>'This maker does not exit','code'=>404],404);
    	}

    	return response()->json(['data'=> $makers],200);
    }

    public function store(CreateMakerRequest $request)
    {
    	$values = $request->only(['name','phone']);
    	Maker::create($values);
    	return response()->json(['message' => 'maker correctly added'], 201);
    }

    public function update(CreateMakerRequest $request, $id)
    {
        $maker = Maker::find($id);
        if(!$maker)
        {
            return response()->json(['message'=>'This maker does not exit','code'=>404],404);
        }

        $name = $request['name'];
        $phone = $request['phone'];

        $maker->name = $name;
        $maker->phone = $phone;

        $maker->save();
        return response()->json(['message' => 'maker correctly updated'], 201);
    }

    public function destroy($id)
    {
        $maker = Maker::find($id);
        if(!$maker)
        {
            return response()->json(['message'=>'This maker does not exit','code'=>404],404);
        }

        $vehicles = $maker->vehicles;
        if(sizeof($vehicles)>0)
        {
            return response()->json(['message'=>'This maker has associated with vehicles. Delete his vehicles first','code'=>409],409);
        }

        $maker->delete();
        return response()->json(['message' => 'THe maker has been deleted successfully'], 201);
    }
}
