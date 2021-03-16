<?php

namespace App\Http\Controllers;

use App\Models\Parking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $rents = DB::table('rents')
            ->join('parkings', 'rents.parkingId', '=', 'parkings.id')
            ->join('parking_types', 'parkings.typeId', '=', 'parking_types.id')
            ->join('houses', 'parkings.houseId', 'houses.id')
            ->select('rents.*', 'parking_types.typeName', 'houses.address', 'parkings.*')
            ->where('rents.userId','=', $userId)
            ->orderBy('rents.startDate', 'desc')
            ->get();

        $rents = $rents->toArray();
        $rents= json_decode( json_encode($rents), true);
//        dd($rents);
        return view('home', ['rents' => $rents]);
    }
}
