<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MakerVehicleController extends Controller
{
    public function index($id)
    {
    	return "vehicles $id";
    }
}
