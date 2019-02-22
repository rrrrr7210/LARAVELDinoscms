@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="">
                <div class="row">
                    <h2 class="col">Login</h2>
                    <a class="col text-center align-items-center" href="{{route('register')}}"><i class="fa fa-forward p-3"></i></a>
                </div>
                    <form class="" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" class="form-control form-control-lg mmm" placeholder="Email:" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" class="form-control form-control-lg mmm" placeholder="Password:" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Emlékezz rám
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-success btn-block">
                                    Login
                                </button>
                            </div>
                            <div class="col">
                                <a class="btn btn-light" href="{{ route('password.request') }}">
                                    Password request
                                </a>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
