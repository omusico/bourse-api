<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Alive;
use App\RecapGlobal;

class ApiController extends Controller
{
    public function stores()
    {
        $stores = Alive::orderBy('localisation', 'desc')->get();

        return response()->json($stores);
    }

    public function storeSalesByLocation($l) {

        $storeSales = RecapGlobal::where('magasin', '=', $l)->orderBy('id', 'desc')->get();

        return response()->json($storeSales);
    }

    public function storeSalesById($id) {

        $storeSales = RecapGlobal::find($id);

        return response()->json($storeSales);

    }
}
