@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="container mt-5 mb-3" align="center">
    <h1 style="font-size: 45px;font-family: assistant, sens-serif">Dashboard Ratu Lestari</h1>
</div>
@stop

@section('content')

<div class="col-12">
    <div class="card card-primary">
      <div class="card-header">
        <h1 class="card-title strong">Layanan Mobil</h1>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->
      <div class="card-body" style="display: block;">
        <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-info">
                <div class="inner">
                <h3>{{$car}}</h3>
        
                  <p>Total Layanan Mobil</p>
                </div>
                <div class="icon">
                    <i class="fas fa-car"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{$carSelesai}}</h3>
        
                  <p>Layanan Selesai</p>
                </div>
                <div class="icon">
                    <i class="fas fa-check"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{$carProses}}</h3>
        
                  <p>Layanan Dalam Proses</p>
                </div>
                <div class="icon">
                    <i class="fas fa-hourglass-half"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{$carGagal}}</h3>
        
                  <p>Layanan Gagal/Cancel</p>
                </div>
                <div class="icon">
                    <i class="far fa-times-circle"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <div class="card card-primary">
        <div class="card-header">
          <h1 class="card-title strong">Layanan Motor</h1>
  
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="display: block;">
          <div class="row">
              <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-info">
                  <div class="inner">
                  <h3>{{$motor}}</h3>
          
                    <p>Total Layanan Motor</p>
                  </div>
                  <div class="icon">
                      <i class="fas fa-motorcycle"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3>{{$motorSelesai}}</h3>
          
                    <p>Layanan Selesai</p>
                  </div>
                  <div class="icon">
                      <i class="fas fa-check"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3>{{$motorProses}}</h3>
          
                    <p>Layanan Dalam Proses</p>
                  </div>
                  <div class="icon">
                      <i class="fas fa-hourglass-half"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3>{{$motorGagal}}</h3>
          
                    <p>Layanan Gagal/Cancel</p>
                  </div>
                  <div class="icon">
                      <i class="far fa-times-circle"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              <!-- ./col -->
          </div>
        </div>
        <!-- /.card-body -->
      </div>
</div>
@stop

@section('css')
    <style>
        h1{
        font-size: 60px;
    }
    </style>
@stop