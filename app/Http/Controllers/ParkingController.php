<?php

namespace App\Http\Controllers;

use App\Models\Parking;

use App\Models\ParkingType;

use App\Http\Requests\ParkingRequest;
use Illuminate\Support\Facades\DB;


class ParkingController extends Controller
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
        return view('parkingUpdateView');
    }

    public function createParking($houseId)
    {
        $parkingTypes = ParkingType::get();
        return view('parkingUpdateView', compact('houseId'), compact('parkingTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParkingRequest $request)
    {
//        dd($request);
        Parking::create($request->only(['houseId', 'typeId', 'placeNumber', 'pricePerDay']));
        return redirect()->route('house.show', $request->houseId);
    }


    public function redirectToBack()
    {
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parking = new Parking;
        $parkingReserve = DB::table('parkings')
            ->join('parking_types', 'parkings.typeId', '=', 'parking_types.id')
            ->join('houses', 'parkings.houseId', '=', 'houses.id')
            ->select('parkings.*', 'parking_types.typeName', 'houses.address')
            ->where('parkings.id','=', $id)
            ->get();


        $parkingReserve = $parkingReserve->toArray();
        $parkingReserve= json_decode( json_encode($parkingReserve), true);
//        dd($parkingWithTypeArray);
        return view('parkingReserveView', ['data' => $parking->where('houseId', '=', $id)->orderBy('pricePerDay')->paginate(10)], ['parkingReserve' => $parkingReserve]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Parking $parking)
    {
        $parkingTypesToUpdate = ParkingType::get();
//        return view('parkingUpdateView', compact('houseId'), compact('parkingTypes'));
        return view('parkingUpdateView', compact('parking'), compact('parkingTypesToUpdate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ParkingRequest $request, Parking $parking)
    {
        $parking->update($request->only(['typeId','placeNumber', 'pricePerDay']));
        return redirect()->route('house.show', $parking->houseId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parking $parking)
    {
        $parking->delete();
//        return redirect()->route('house.show', $parking->houseId);
        return \Ajax::redirect(route('house.show',  $parking->houseId));
    }
}
