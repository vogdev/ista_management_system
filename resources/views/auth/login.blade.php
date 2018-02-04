@extends('layouts.app')

@section('content')

        <div id="login">
            <div class="form shadow">
                <div class="navbar-item login-logo">
                  <img src="{{asset('img/logo.png')}}" alt="ISTA" width="112" height="28">
                </div>
              <form method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}
                                    <div class="field {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label class="label">Email</label>
                                            <div class="control">
                                                <input id="email" type="email" class="input" name="email" value="{{ old('email') }}" required autofocus>
                                            </div>
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                    </div>

                                    <div class="field {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label class="label">Password</label>
                                            <div class="control">
                                                 <input id="password" type="password" class="input" name="password" required>
                                            </div>
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="field">
                                                <label class="label--checkbox">
                                                    <input class="checkbox" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                                </label>
                                        </div>
                                <div class="field">
                                  <div class="control">
                                    <input class="input button is-primary submit" type="submit" >
                                  </div>
                                </div>
                </form>
            </div>
        </div>
 @endsection