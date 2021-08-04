@extends('adminlte::page')

@section('title', 'Layanan')

@section('content_header')
    <button class="btn btn-primary button-footer mb-3" title="Tambah Data" data-toggle="collapse" data-target="#collapseCreate">
        <i class="fas fa-plus fa-2x"></i>
    </button>
    <a href="{{route('motors.export')}}" class="btn btn-success button-footers mb-3" title="Download Data Layanan">
        <i class="fas fa-download fa-2x center"></i>
    </a>
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="collapse multi-collapse" id="collapseCreate">
                        <div class="card bg-light">
                            <div class="card-header"><h5>Tambah Data Pelanggan</h5></div>
                             <div class="card-body bg-light">
                                 <form action="{{route('motors.store')}}" method="POST">
                                     @csrf
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label for="number">No Layanan</label>
                                            <input type="text" class="form-control" name="number" required>
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="layanan">Layanan</label>
                                            <input type="text" class="form-control" name="layanan" required>
                                        </div>
                                       
                                        <div class="form-group col-6">
                                            <label for="nama_pemilik">Nama Pemilik</label>
                                            <input type="text" class="form-control" name="nama_pemilik" required>
                                        </div>
                                        <div class="form-group col-6">
                                           <label for="no_polisi">No Polisi</label>
                                           <input type="text" class="form-control" name="no_polisi" required>
                                       </div>
                                        <div class="form-group col-12">
                                           <label for="no_rangka">No Rangka</label>
                                           <input type="text" class="form-control" name="no_rangka" required>
                                       </div>
                                        <div class="form-group col-6">
                                           <label for="no_mesin">No Mesin</label>
                                           <input type="text" class="form-control" name="no_mesin" required>
                                       </div>
                                        <div class="form-group col-6">
                                           <label for="nama_stnk">Nama STNK</label>
                                           <input type="text" class="form-control" name="nama_stnk" required>
                                       </div>
                                       <div class="form-group col-12">
                                            <label for="tanggal_terima">Tanggal Terima</label>
                                            <input type="date" class="form-control datepicker" name="tanggal_terima" required>
                                        </div>
                                        <div class="form-group col-6">
                                           <label for="dp">DP</label>
                                           <input type="number" class="form-control" name="dp" required>
                                       </div>
                                       <div class="form-group col-6">
                                        <label for="estimasi">Estimasi</label>
                                        <input type="number" class="form-control" name="estimasi" required>
                                    </div>
                                        <div class="form-group col-12">
                                           <label for="keterangan">Keterangan</label>
                                           <textarea name="keterangan" class="form-control" cols="10" rows="10"></textarea>
                                       </div>
                                        <button class="btn btn-primary ml-1 mr-1" type="submit">
                                           <i class="fa fa-save"></i> Simpan
                                       </button>
                                       <button class="btn btn-warning" type="reset">
                                           <i class="fa fa-undo"></i> Reset
                                       </button>
                                    </div>
                                 </form>
                             </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h3>Data Layanan Motor</h3>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div>
      </div>

      {{-- alert error --}}
      @if ($errors->any())
      <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
              @endforeach
          </ul>
      </div>
      @endif

      @include('sweetalert::alert')

      {{-- alert success --}}
      {{-- @if (session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <i class="fa fa-check-circle"></i> 
            {{session('success')}}
        </div>
      @endif --}}

   <div class="content">
       <div class="container-fluid">
           <div class="row">
                <div class="col">
                    <table class="table table-hover table-bordered table-responsive" id="motors">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Layanan</th>
                                <th>Nama Pemilik</th>
                                <th>No Polisi</th>
                                <th>No Rangka</th>
                                <th>No Mesin</th>
                                <th>Nama STNK</th>
                                <th>DP</th>
                                <th>Estimasi</th>
                                <th>Tanggal Terima</th>
                                <th>Keterangan</th>
                                <th>User</th>
                                <th>Action</th>
                                <th>Status</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($motors as $motor)
                                <tr>
                                    <td>{{$motor->number}}</td>
                                    <td>{{$motor->layanan}}</td>
                                    <td>{{$motor->nama_pemilik}}</td>
                                    <td>{{$motor->no_polisi}}</td>
                                    <td>{{$motor->no_rangka}}</td>
                                    <td>{{$motor->no_mesin}}</td>
                                    <td>{{$motor->nama_stnk}}</td>
                                    <td>@currency($motor->dp)</td>
                                    <td>@currency($motor->estimasi)</td>
                                    <td>{{\Carbon\Carbon::createFromDate($motor->tanggal_terima)->isoFormat('D MMMM Y')}}</td>
                                    <td>{{$motor->keterangan}}</td>
                                    <td>{{$motor->user->name}}</td>
                                    <td>
                                        @if($motor->status == 'Proses')
                                        <a href="{{ route('motors.status', $motor->id) }}?status=Selesai" class="btn btn-success btn-sm">
                                          <i class="fa fa-check"></i>
                                        </a>
                                        <a href="{{ route('motors.status', $motor->id) }}?status=Gagal" class="btn btn-danger btn-sm">
                                          <i class="fa fa-times"></i>
                                        </a>
                                      @endif
                                    </td>
                                    <td>
                                        @if($motor->status == 'Proses')
                                        <span class="badge badge-warning">
                                      @elseif($motor->status == 'Selesai')
                                        <span class="badge badge-success">
                                      @elseif($motor->status == 'Gagal')
                                        <span class="badge badge-danger">
                                      @else
                                        <span>
                                      @endif
                                        {{ $motor->status }}
                                        </span>
                                    </td>
                                    <td>
                                        {{-- <a href="#mymodal" 
                                            data-remote="{{route('motors.edit', $motor->id)}}"
                                            data-toggle="modal"
                                            data-target="#mymodal"
                                            class="btn btn-success">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a> --}}

                                        <a href="{{route('motors.edit', $motor->id)}}" class="btn btn-success">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>

                                      <button class="btn btn-danger my-2 ml-1" type="button" data-motorsid="{{$motor->id}}"  data-toggle="modal" data-target="#modalDelete"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
           </div>
       </div>
   </div>


   <div class="modal" id="mymodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <i class="fa fa-spinner fa-spin"></i>
            </div>
        </div>
    </div>
</div>

   {{-- MODAL HAPUS --}}
    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDeleteLabel">Konfirmasi hapus data motor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            Apakah anda yakin untuk menghapus data layanan?
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <form method="POST" id="formDeleteModal">
                @method('delete')
                @csrf
            <button type="submit" class="btn btn-danger">Ya, hapus</button>
            </form>
            </div>
        </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .button-footer{
            width: 55px;
            height: 55px;
            z-index: 3;
            position: fixed;  
            right: 30px;
            bottom:10px;
            border-radius: 50% !important
        }

        .button-footers{
            width: 55px;
            height: 55px;
            margin-right: 60px;
            z-index: 3;
            position: fixed;  
            right: 30px;
            bottom:10px;
            border-radius: 50% !important
        }
    </style>
@stop

@section('css')
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('#motors').DataTable({
                responsive: true
            } );
            $('#customer').select2();
            $('#layanan').select2();
        });

        jQuery(document).ready(function($){
        $('#mymodal').on('show.bs.modal', function(e){
            var button = $(e.relatedTarget);
            var modal = $(this);
            modal.find('.modal-body').load(button.data("remote"));
             });
        });

        $('#modalDelete').on('show.bs.modal',function(e){
            var motorsid = $(e.relatedTarget).data('motorsid');
            $('#formDeleteModal').attr('action','/motors/'+motorsid);
        });  

        setTimeout(()=> {
            $('.alert').fadeOut();
        }, 4000);
    </script>
@stop
@section('plugins.Datatables', true)
@section('plugins.DatatableResponsive', true)
@section('plugins.Select2', true)
