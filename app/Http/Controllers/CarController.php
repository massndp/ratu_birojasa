<?php

namespace App\Http\Controllers;

use App\Car;
use App\Customer;
use App\Exports\CarExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::with(['user'])->get();
 
        return view('pages.services.car.index', [
            'cars' => $cars,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    public function export_excel()
    {
        return  Excel::download(new CarExport, 'layanan_mobil.xlsx');;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cars = new Car;
        $cars->number = $request->number;
        $cars->user_id = Auth::user()->id;
        $cars->layanan = $request->layanan;
        $cars->nama_pemilik = $request->nama_pemilik;
        $cars->no_polisi = $request->no_polisi;
        $cars->no_rangka = $request->no_rangka;
        $cars->no_mesin = $request->no_mesin;
        $cars->nama_stnk = $request->nama_stnk;
        $cars->dp = $request->dp;
        $cars->estimasi = $request->estimasi;
        $cars->tanggal_terima = $request->tanggal_terima;
        $cars->keterangan = $request->keterangan;
        
        $cars->save();

        Alert::toast('Data layanan berhasil ditambahkan!', 'success');

        return redirect()->route('cars.index');
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
        $car = Car::find($id);
        return view('pages.services.car.edit', [
            'car' => $car
        ]);
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
        $car = Car::find($id);
        if(isset($request->number)){
            $car->number = $request->number;
        }
        if(isset(Auth::user()->id)){
            $car->user_id = Auth::user()->id;
        }
        if(isset($request->layanan)){
            $car->layanan = $request->layanan;
        }
        if(isset($request->nama_pemilik)){
            $car->nama_pemilik = $request->nama_pemilik;
        }
        if(isset($request->no_polisi)){
            $car->no_polisi = $request->no_polisi;
        }
        if(isset($request->no_rangka)){
            $car->no_rangka = $request->no_rangka;
        }
        if(isset($request->no_mesin)){
            $car->no_mesin = $request->no_mesin;
        }
        if(isset($request->nama_stnk)){
            $car->nama_stnk = $request->nama_stnk;
        }
        if(isset($request->dp)){
            $car->dp = $request->dp;
        }
        if(isset($request->estimasi)){
            $car->estimasi = $request->estimasi;
        }
        if(isset($request->tanggal_terima)){
            $car->tanggal_terima = $request->tanggal_terima;
        }
        if(isset($request->keterangan)){
            $car->keterangan = $request->keterangan;
        }

        $car->save();

        Alert::toast('Data layanan berhasil diupdate', 'success');

        return redirect()->route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Car::find($id)->delete();

        Alert::toast('Data layanan berhasil dihapus', 'success');
        return redirect()->route('cars.index');
    }

    public function setStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Proses,Selesai,Gagal'
        ]);

        $car = Car::findOrFail($id);
        $car->status = $request->status;
        $car->save();

        Alert::toast('Status layanan berhasil diganti', 'success');
        return redirect()->route('cars.index');
    }
}
