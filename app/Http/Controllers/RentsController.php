<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParkingRequest;
use App\Http\Requests\RentRequest;
use App\Models\Parking;
use App\Models\Rent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RentRequest $request)
    {
        $userId = Auth::user()->id;
        $startDate1 = strtotime($request->startDate);
        $startDate = date('Y-m-d',$startDate1);
        $endDate1 = strtotime($request->endDate);
        $endDate = date('Y-m-d',$endDate1);
        $dateDiff = ($endDate1-$startDate1)/86400;
        $sum = $dateDiff * $request->pricePerDay;

        $array = array(
            "userId" => $userId,
            "parkingId" => $request->parkingId,
            "startDate" => $startDate,
            "endDate" => $endDate,
            "sum" => $sum,
        );

        Rent::create($array);
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

        return view('home', ['rents' => $rents]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
