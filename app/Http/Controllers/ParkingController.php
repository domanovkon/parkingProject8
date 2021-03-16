<?php

namespace App\Http\Controllers;

use App\Models\Parking;

use App\Models\ParkingType;

use App\Http\Requests\ParkingRequest;


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
        //
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
