<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Alive;

class ApiController extends Controller
{
    public function stores()
    {
        $stores = Alive::all();

        return response()->json($stores);
    }
}
