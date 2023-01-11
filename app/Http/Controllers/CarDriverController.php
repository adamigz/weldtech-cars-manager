<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarDriver;
use Carbon\Carbon;

class CarDriverController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('car_driver_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'driver_name' => 'required|string',
            'car_registration' => 'required|string',
            'dkv_number' => 'required|numeric',
            'from' => 'required|string'
        ]);

        $carDriver = CarDriver::create([
            'driver_name' => $request->driver_name,
            'car_registration' => $request->car_registration,
            'dkv_number' => (int) $request->dkv_number,
            'from' => $request->from,
            'to' => $request->from,
            'previous_owner' => CarDriver::where('car_registration', $request->car_registration)->latest('created_at')->first()->driver_name ?? 'Brak'
        ]);

        $request->session()->flash('message', 'Pomyślnie dodano tymczasowego właściciela auta');

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  CarDriver  $carDriver
     * @return \Illuminate\Http\Response
     */
    public function show(CarDriver $carDriver)
    {
        return view('car_driver', ['car_driver' => $carDriver]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function endRental(Request $request, CarDriver $carDriver)
    {
        $request->validate([
            'to' => 'required|string'
        ]);

        $carDriver->to = Carbon::parse($request->to)->format('Y-m-d H:i');
        $carDriver->save();
        
        $request->session()->flash('message', 'Pomyślnie ustawiono datę zakończenia posiadania');

        return redirect()->back();
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
