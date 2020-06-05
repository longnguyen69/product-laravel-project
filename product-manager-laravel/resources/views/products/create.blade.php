@extends('master')
@section('content')
    <div class="card-header">
        Add product to...
    </div>
    <div class="card-body">
        <div class="col-md-8">
            @if(\Illuminate\Support\Facades\Session::has('success'))
                <p class="text-success">
                    <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                </p>
            @endif
            <form method="post" enctype="multipart/form-data" action="#">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name Product</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Category</label>
                    <select class="custom-select" name="category">
                        @foreach($categories as $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Price</label>
                    <input type="text" class="form-control" name="price">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Desc</label>
                    <textarea class="form-control" name="desc" rows="3" id="area"></textarea>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                    <div class="col-md-3">
                        <a class="btn btn-secondary" href="{{route('index.product')}}">Cancel</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
    @toastr_render
@endsection
