@extends('master')
@section('content')
    <div class="card-header">
        Product
    </div>
    <div class="row">
        <div class="col-3 mt-3">
            <a class="btn btn-success" href="{{route('create.product')}}">Add Product</a>
        </div>
        <div class="col-md-6 mt-3">
            <form class="form-inline my-2 my-lg-0" action="{{route('search.product')}}">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>

    <div class="card-body">
        @if(\Illuminate\Support\Facades\Session::has('success'))
            <p class="text-success">
                <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
            </p>
        @endif
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">STT</th>
                <th scope="col"></th>
                <th scope="col">Name</th>
                <th scope="col">Categories</th>
                <th scope="col">Price</th>
                <th scope="col">Desc</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @forelse($products as $key=>$product)
                <tr>
                    <th scope="row">{{++$key}}</th>
                    <td><img src="{{asset('storage/'.$product->images)}}" style="width: 80px; height:80px; border-radius: 50%"></td>
                    <td>{{$product->Name}}</td>

                    <td>{{$product->categories->name}}</td>
                    <td>{{number_format($product->price)}}</td>
                    <td>{!! $product->desc !!}</td>
                    <td>
                        <a class="btn btn-success" href="{{route('edit.product',['id'=>$product->id])}}">Edit</a>
                        <a class="btn btn-danger" href="{{route('delete.product',['id'=>$product->id])}}" onclick="return confirm('Are you sure delete?')">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>No data</tr>
            @endforelse
            </tbody>
        </table>
        {!! $products->links() !!}
{{--        {!! $products->render() !!}--}}
    </div>
    @toastr_render
@endsection
