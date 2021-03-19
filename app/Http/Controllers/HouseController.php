<?php

namespace App\Http\Controllers;

use App\Models\Parking;
use App\Models\ParkingType;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Requests\HouseRequest;

use App\Models\House;



class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $house = new House;
        // return view('houseView')->with('data', House::paginate(2));
        // return view('houseView', ['data' => $house->orderBy('address')->get()]);
        return view('houseView', ['data' => $house->orderBy('address')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('houseUpdateView');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HouseRequest $request)
    {
        House::create($request->only(['address']));
        return \Ajax::redirect(route('house.index'));
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
        $parkingWithType = DB::table('parkings')
            ->join('parking_types', 'parkings.typeId', '=', 'parking_types.id')
            ->leftJoin('rents', 'parkings.id', '=', 'rents.parkingId')
            ->select('parkings.*', 'parking_types.typeName')//, 'rents.*')
            ->where('houseId','=', $id)
            ->where('endDate', '<', Carbon::now())
            ->orWhere('endDate', '=', null)
            ->orderBy('pricePerDay')
            ->get();
//        dd(DB::listen($parkingWithType));

        $parkingWithTypeArray = $parkingWithType->toArray();
        $parkingWithTypeArray= json_decode( json_encode($parkingWithTypeArray), true);
//        dd($parkingWithTypeArray);
        return view('parkingView', ['data' => $parking->where('houseId', '=', $id)->orderBy('pricePerDay')->paginate(10)], ['parkingData' => $parkingWithTypeArray]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(House $house)
    {
        return view('houseUpdateView', compact('house'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HouseRequest $request, House $house)
    {
        $house->update($request->only(['address']));
        return \Ajax::redirect(route('house.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(House $house)
    {
        $house->delete();
        return \Ajax::redirect(route('house.index'));
    }
}
