<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payment_create');
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
            'price' => 'required|numeric',
            'currency' => 'required',
            'fuel_quantity' => 'required|numeric',
            'car_course' => 'required|numeric',
            'refueling_date' => 'required',
            'dkv_number' => 'numeric|nullable',
        ]);

        $payment = Payment::create([
            'driver_name' => $request->driver_name,
            'car_registration' => $request->car_registration,
            'price' => (float)$request->price,
            'currency' => $request->currency,
            'fuel_quantity' => (float)$request->fuel_quantity,
            'car_course' => (int)$request->car_course,
            'payed_by_dkv' => $request->payed_by_dkv == 'true' ? true : false,
            'refueling_date' => $request->refueling_date,
            'dkv_number' => $request->dkv_number == '' ? null : $request->dkv_number
        ]);

        $request->session()->flash('message', 'Pomyślnie dodano płatność');

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        return view('payment', ['payment' => $payment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
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
    public function update(Request $request, Payment $payment)
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
