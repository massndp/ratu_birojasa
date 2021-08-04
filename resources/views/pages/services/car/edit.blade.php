@extends('adminlte::page')

@section('title', 'Edit Layanan')

@section('content_header')
    <h2>Edit Layanan</h2>
@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card bg-light">
                    <div class="card-header"><h5>Edit Layanan </h5></div>
                    <div class="card-body bg-light">
                        <form action="{{route('cars.update', $car->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="number">No Layanan</label>
                                    <input type="text" class="form-control" name="number" value="{{isset($car) ? $car->number : old('number')}}">
                                </div>
                                <div class="form-group col-12">
                                    <label for="layanan">layanan</label>
                                    <input type="text" class="form-control" name="layanan" value="{{isset($car) ? $car->layanan : old('layanan')}}">
                                </div>
                                <div class="form-group col-6">
                                    <label for="nama_pemilik">Nama Pemilik</label>
                                    <input type="text" class="form-control" name="nama_pemilik" value="{{isset($car) ? $car->nama_pemilik : old('nama_pemilik')}}">
                                </div>
                                <div class="form-group col-6">
                                    <label for="no_polisi">No Polisi</label>
                                    <input type="text" class="form-control" name="no_polisi" value="{{isset($car) ? $car->no_polisi : old('no_polisi')}}">
                                </div>
                                <div class="form-group col-12">
                                    <label for="no_rangka">No Rangka</label>
                                    <input type="text" class="form-control" name="no_rangka" value="{{isset($car) ? $car->no_rangka : old('no_rangka')}}">
                                </div>
                                <div class="form-group col-6">
                                    <label for="no_mesin">No Mesin</label>
                                    <input type="text" class="form-control" name="no_mesin" value="{{isset($car) ? $car->no_mesin : old('no_mesin')}}">
                                </div>
                                <div class="form-group col-6">
                                    <label for="nama_stnk">Nama STNK</label>
                                    <input type="text" class="form-control" name="nama_stnk" value="{{isset($car) ? $car->nama_stnk : old('nama_stnk')}}">
                                </div>
                                <div class="form-group col-12">
                                    <label for="tanggal_terima">Tanggal Terima</label>
                                    <input type="text" class="form-control" name="tanggal_terima" value="{{isset($car) ? $car->tanggal_terima : old('tanggal_terima')}}">
                                </div>
                                <div class="form-group col-6">
                                    <label for="dp">DP</label>
                                    <input type="text" class="form-control" name="dp" value="{{isset($car) ? $car->dp : old('dp')}}">
                                </div>
                                <div class="form-group col-6">
                                    <label for="estimasi">Estimasi</label>
                                    <input type="text" class="form-control" name="estimasi" value="{{isset($car) ? $car->estimasi : old('estimasi')}}">
                                </div>
                                <div class="form-group col-12">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" rows="10" class="form-control">{{isset($car) ? $car->keterangan : old('keterangan')}}</textarea>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-save"></i> Simpan
                            </button>
                            <button class="btn btn-warning" type="reset">
                                <i class="fa fa-undo"></i> Reset
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
@stop


@section('css')

@stop

@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
            .create( document.querySelector( '#ckeditor' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script> 
@stop