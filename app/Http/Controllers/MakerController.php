<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Maker;
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
}
