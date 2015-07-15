<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
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

    public function storeSalesByDate() {

        $date = Input::get('date');

        $storeSales = RecapGlobal::where('date', '=', $date)->orderBy('id', 'desc')->get();

        return response()->json($storeSales);
    }

    public function today() {

        $dateToday = date("d/m/Y");

        //find today sales
        $storeSalesToday = RecapGlobal::where('date', '=', $dateToday)->orderBy('id', 'desc')->get();

        //find last week sales
        $dateLastWeek = date('d/m/Y', strtotime("-1 week"));
        $storeSalesLastWeek = RecapGlobal::where('date', '=', $dateLastWeek)->orderBy('id', 'desc')->get();

        //find last month sales
        $dateLastMonth = date('d/m/Y', strtotime("-1 month"));
        $storeSalesLastMonth = RecapGlobal::where('date', '=', $dateLastMonth)->orderBy('id', 'desc')->get();

        //find last year sales
        $dateLastYear = date('d/m/Y', strtotime("-1 year"));
        $storeSalesLastYear = RecapGlobal::where('date', '=', $dateLastYear)->orderBy('id', 'desc')->get();

        $response = array(
            "today" => $storeSalesToday,
            "lastWeek" => $storeSalesLastWeek,
            "lastMonth" => $storeSalesLastMonth,
            'lastYear' => $storeSalesLastYear
        );

        return response()->json($response);
    }
}
