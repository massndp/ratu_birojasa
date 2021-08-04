@extends('adminlte::page')

@section('title', 'Akun User')

@section('content_header')
    <button class="btn btn-primary button-footer mb-3" title="Tambah Data" data-toggle="collapse" data-target="#collapseCreate">
        <i class="fas fa-plus"></i>
    </button>
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="collapse multi-collapse" id="collapseCreate">
                        <div class="card bg-light">
                            <div class="card-header"><h5>Tambah Data User</h5></div>
                             <div class="card-body bg-light">
                                 <form action="{{route('users.store')}}" method="POST">
                                     @csrf
                                     <div class="form-group">
                                         <label for="name">Nama Lengkap</label>
                                         <input type="text" class="form-control" name="name" required data-validation-required-message="Nama wajib diisi">
                                     </div>
                                     <div class="form-group">
                                         <label for="username">Username</label>
                                         <input type="text" class="form-control" name="username" required>
                                     </div>
                                     <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" name="password" required>
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
    </div>

    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h3>Data User</h3>
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
                    <table class="table table-hover table-bordered" id="users">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>
                                        <a href="#mymodal" 
                                            data-remote="{{route('users.edit', $user->id)}}"
                                            data-toggle="modal"
                                            data-target="#mymodal"
                                            class="btn btn-success">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>

                                      <button class="btn btn-danger my-2 ml-1" type="button" data-usersid="{{$user->id}}"  data-toggle="modal" data-target="#modalDelete"><i class="fa fa-trash"></i></button>
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
                <h5 class="modal-title" id="modalDeleteLabel">Konfirmasi hapus data user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            Apakah anda yakin untuk menghapus data user?
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
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        .button-footer{
            width: 60px;
            height: 60px;
            z-index: 3;
            position: fixed;  
            right: 30px;
            bottom:10px;
            border-radius: 50% !important
        }
    </style>
@stop

@section('js')
    <script>
        $(document).ready(function(){
            $('#users').DataTable();
        });

        jQuery(document).ready(function($){
        $('#mymodal').on('show.bs.modal', function(e){
            var button = $(e.relatedTarget);
            var modal = $(this);
            modal.find('.modal-body').load(button.data("remote"));
             });
        });

        $('#modalDelete').on('show.bs.modal',function(e){
            var usersid = $(e.relatedTarget).data('usersid');
            $('#formDeleteModal').attr('action','/users/'+usersid);
        });  

        setTimeout(()=> {
            $('.alert').fadeOut();
        }, 4000);
    </script>
@stop
@section('plugins.Datatables', true)
