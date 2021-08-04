<?php

namespace App\Http\Controllers;

use App\Exports\MotorExport;
use App\Motor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motors = Motor::with(['user'])->get();
 
        return view('pages.services.motor.index', [
            'motors' => $motors,
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
        return  Excel::download(new MotorExport, 'layanan_motor.xlsx');;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $motors = new Motor;
        $motors->number = $request->number;
        $motors->user_id = Auth::user()->id;
        $motors->layanan = $request->layanan;
        $motors->nama_pemilik = $request->nama_pemilik;
        $motors->no_polisi = $request->no_polisi;
        $motors->no_rangka = $request->no_rangka;
        $motors->no_mesin = $request->no_mesin;
        $motors->nama_stnk = $request->nama_stnk;
        $motors->dp = $request->dp;
        $motors->estimasi = $request->estimasi;
        $motors->tanggal_terima = $request->tanggal_terima;
        $motors->keterangan = $request->keterangan;
        
        $motors->save();

        Alert::toast('Data layanan berhasil ditambahkan!', 'success');

        return redirect()->route('motors.index');
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
        $motor = Motor::find($id);
        return view('pages.services.car.edit', [
            'motor' => $motor
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
        $motor = Motor::find($id);
        if(isset($request->number)){
            $motor->number = $request->number;
        }
        if(isset(Auth::user()->id)){
            $motor->user_id = Auth::user()->id;
        }
        if(isset($request->layanan)){
            $motor->layanan = $request->layanan;
        }
        if(isset($request->nama_pemilik)){
            $motor->nama_pemilik = $request->nama_pemilik;
        }
        if(isset($request->no_polisi)){
            $motor->no_polisi = $request->no_polisi;
        }
        if(isset($request->no_rangka)){
            $motor->no_rangka = $request->no_rangka;
        }
        if(isset($request->no_mesin)){
            $motor->no_mesin = $request->no_mesin;
        }
        if(isset($request->nama_stnk)){
            $motor->nama_stnk = $request->nama_stnk;
        }
        if(isset($request->dp)){
            $motor->dp = $request->dp;
        }
        if(isset($request->estimasi)){
            $motor->estimasi = $request->estimasi;
        }
        if(isset($request->tanggal_terima)){
            $motor->tanggal_terima = $request->tanggal_terima;
        }
        if(isset($request->keterangan)){
            $motor->keterangan = $request->keterangan;
        }

        $motor->save();

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
        $motor = Motor::find($id)->delete();

        Alert::toast('Data layanan berhasil dihapus', 'success');
    }

    public function setStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Proses,Selesai,Gagal'
        ]);

        $motor = Motor::findOrFail($id);
        $motor->status = $request->status;
        $motor->save();

        Alert::toast('Status layanan berhasil diganti', 'success');
        return redirect()->route('motors.index');
    }
}
