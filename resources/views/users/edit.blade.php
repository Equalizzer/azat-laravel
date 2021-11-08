@extends('app.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-header">
                        @include('includes.messages')
                    </div>
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Change your profile</h5>
                        <form method="post" action="/users">
                            @method('put')
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="name" name="name" class="form-control" id="floatingInput" value="{{$user->name}}">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="email"  placeholder="email" value="{{$user->email}}">
                                <label for="floatingEmail">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="current_password" class="form-control"  placeholder="password">
                                <label for="floatingPassword">Current password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control"  placeholder="password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="password_confirmation" class="form-control"  placeholder="confirm your password">
                                <label for="floatingPassword">Password confirmation</label>
                            </div>
                            <div class="d-grid" style="margin-top: 50px">
                                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" value="Update">Change
                                    profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
