@extends('master')
@section('content')
    <div class="card-header">
        Category Product
    </div>
    <div class="row">
        <div class="col-2 mt-3">
            <a class="btn btn-success" href="{{route('create.categories')}}">Add Categories</a>
        </div>
        <div class="col-md-6 mt-3">
            <form class="form-inline my-2 my-lg-0" method="get" action="{{route('search.categories')}}">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="keyword">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>

    </div>

    <div class="card-body">
        <div class="col-6">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Name</th>
                    <th scope="col">Sum</th>
                    <th scope="col">Date</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @forelse($categories as $key=>$category)
                    <tr>
                        <th scope="row">{{++$key}}</th>
                        <td>{{$category->name}}</td>
                        <td>{{ $category->totalProduct() }}</td>
                        <td>{{$category->created_at}}</td>
                        <td>
                            <a class="btn btn-success" href="{{route('edit.categories',['id'=>$category->id])}}">Edit</a>
                            <a class="btn btn-danger" href="{{route('delete.categories',['id'=>$category->id])}}" onclick="return confirm('Are you sure delete?')">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th>No data</th>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
