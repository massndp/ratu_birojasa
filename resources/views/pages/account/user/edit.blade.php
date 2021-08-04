
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card bg-light">
                    <div class="card-header"><h5>Edit User {{$user->name}} </h5></div>
                    <div class="card-body bg-light">
                        <form action="{{route('users.update', $user->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" name="name" value="{{isset($user) ? $user->name : old('name')}}">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" value="{{isset($user) ? $user->username : old('username')}}">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password">
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

@section('css')

@stop

@section('js')
    
@stop