@extends('master')
@section('content')
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">Role</th>
        </tr>
        </thead>
        <tbody>
        @forelse($results as $key=>$value)
            <tr>
                <th scope="row">{{++$key}}</th>
                <td>{{$value->name}}</td>
                <td>{{$value->username}}</td>
                <td>{{$value->password}}</td>
                @if($value->role == 1)
                    <td>Admin</td>
                @else
                    <td>User</td>
                @endif
            </tr>
        @empty
            <p style="color: red">No data</p>
        @endforelse

        </tbody>
    </table>
@endsection
