@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div>
                <h2>Registration</h2>

                    <form class="" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <input id="name" type="text" class="form-control form-control-lg mmm" placeholder="Name:" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" class="form-control form-control-lg mmm" placeholder="Email:" name="email" value="{{ old('email') }}" required>
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

                        <div class="form-group{{ $errors->has('password-confirm') ? ' has-error' : '' }}">
                            <input id="password-confirm" type="password" class="form-control form-control-lg mmm" placeholder="Confirm Password:" name="password_confirmation" required>
                        </div>




                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">
                                    Regisztráció
                                </button>
                            </div>
                            <div class="col">
                                <a class="btn btn-light" href="{{ route('login') }}">
                                    Jelentkezz be
                                </a>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
