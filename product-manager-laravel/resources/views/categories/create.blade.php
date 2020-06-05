@extends('master')
@section('content')
    <div class="card-header">
        Create Category Product
    </div>
    @if(\Illuminate\Support\Facades\Session::has('success'))
        <p class="text-success">
            <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
        </p>
    @endif
    <div class="card-body">
        <div class="col-6">
            <form method="post" action="{{route('store.categories')}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name Category</label>
                    <input type="text" class="form-control" name="name">
                    @if($errors->first('name'))
                        <p class="text-danger">{{$errors->first('name')}}</p>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success pr-4">Add</button>
                    </div>
                    <div class="col-md-3">
                        <a class="btn btn-secondary" href="{{route('index.categories')}}">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
