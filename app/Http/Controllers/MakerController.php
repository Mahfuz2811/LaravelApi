<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Maker;

class MakerController extends Controller
{
    public function index()
    {
    	$makers = Maker::all();
    	return response()->json(['data'=> $makers],200);
    }
}
