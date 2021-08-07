<?php

namespace App\Http\Controllers;

use App\Car;
use App\Motor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $car_total = Car::count(); 
        $car_proses = Car::where('status', 'Proses')->count();
        $car_gagal = Car::where('status', 'Gagal')->count();
        $car_selesai = Car::where('status', 'Selesai')->count();

        $motor = Motor::count();
        $motor_proses = Motor::where('status', 'Proses')->count();
        $motor_gagal = Motor::where('status', 'Gagal')->count();
        $motor_selesai = Motor::where('status', 'Selesai')->count();

        return view('home', [
            'car_total' => $car_total,
            'car_proses' => $car_proses,
            'car_gagal' => $car_gagal,
            'car_selesai' => $car_selesai,
            'motor' => $motor, 
            'motor_proses' => $motor_proses,
            'motor_gagal' => $motor_gagal,
            'motor_selesai' => $motor_selesai,

        ]);
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
    public function store(Request $request)
    {
        //
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
