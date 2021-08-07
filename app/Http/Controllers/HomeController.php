<?php

namespace App\Http\Controllers;

use App\Car;
use App\Motor;
use Illuminate\Http\Request;

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
        $car = Car::count(); 
        $carProses = Car::where('status', 'Proses')->count();
        $carGagal = Car::where('status', 'Gagal')->count();
        $carSelesai = Car::where('status', 'Selesai')->count();

        $motor = Motor::count();
        $motorProses = Motor::where('status', 'Proses')->count();
        $motorGagal = Motor::where('status', 'Gagal')->count();
        $motorSelesai = Motor::where('status', 'Selesai')->count();

        return view('home', [
            'car' => $car,
            'carProses' => $carProses,
            'carGagal' => $carGagal,
            'carSelesai' => $carSelesai,
            'motor' => $motor, 
            'motorProses' => $motorProses,
            'motorGagal' => $motorGagal,
            'motorSelesai' => $motorSelesai,
        ]);
    }
}
