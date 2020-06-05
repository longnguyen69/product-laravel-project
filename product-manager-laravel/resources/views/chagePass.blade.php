@extends('master')
@section('content')

    <div class="card">
        <div class="card-header">
            Change Password
        </div>
        <div class="card-body">
            <div class="col-md-6">
                <form method="post" action="{{route('changePage')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Current password</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" name="current">
                        @if($errors->first('current'))
                            <p class="text-danger">{{$errors->first('current')}}</p>
                        @endif
                        @if(\Illuminate\Support\Facades\Session::has('error'))
                            <p class="text-danger">
                                <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('error') }}
                            </p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">New Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                        @if($errors->first('new'))
                            <p class="text-danger">{{$errors->first('new')}}</p>
                        @endif
                        @if(\Illuminate\Support\Facades\Session::has('error1'))
                            <p class="text-danger">
                                <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('error') }}
                            </p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Enter again your new password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="confirmPassword">
                        @if($errors->first('renew'))
                            <p class="text-danger">{{$errors->first('renew')}}</p>
                        @endif
                        @if(\Illuminate\Support\Facades\Session::has('error2'))
                            <p class="text-danger">
                                <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('error') }}
                            </p>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-success">Confirm</button>
                        </div>
                        <div class="col-md-2">
                            <a class="btn btn-secondary" href="{{route('index.product')}}">Cancel</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection()
