@extends('master')
@section('content')
    <div class="card-header">
        Edit product to...
    </div>
    <div class="card-body">
        <div class="col-md-8">
            <form method="post" enctype="multipart/form-data" action="{{route('update.product', [$product->id])}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name Product</label>
                    <input type="text" class="form-control" name="name" value="{{$product->Name}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Category</label>
                    <select class="custom-select" name="category">
                        @foreach($categories as $value)
                            <option value="{{$value->id}}" @if($value->id == $product->category_id)
                                selected
                                @endif>
                                {{$value->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Price</label>
                    <input type="text" class="form-control" name="price" value="{{$product->price}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <img src="{{asset('storage/'.$product->images)}}" style="width: 80px;">
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Desc</label>
                    <textarea class="form-control" name="desc" rows="3" id="area">{{$product->desc}}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <a class="btn btn-secondary" href="{{route('index.product')}}">Cancel</a>
            </form>
        </div>
    </div>
@endsection
