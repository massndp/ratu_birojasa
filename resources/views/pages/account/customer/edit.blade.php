
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card bg-light">
                    <div class="card-header"><h5>Edit User {{$customer->name}} </h5></div>
                    <div class="card-body bg-light">
                        <form action="{{route('customers.update', $customer->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" name="name" value="{{isset($customer) ? $customer->name : old('name')}}">
                            </div>
                            <div class="form-group">
                                <label for="phone">phone</label>
                                <input type="text" class="form-control" name="phone" value="{{isset($customer) ? $customer->phone : old('phone')}}">
                            </div>
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <input type="text" class="form-control" name="address" value="{{isset($customer) ? $customer->address : old('address')}}">
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