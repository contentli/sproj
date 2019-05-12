@extends('layouts.app')

@section('title', 'Login')

@section('content')

<div class="container">
<div class="columns">
    <div class="column is-12">

        <h1 class="title">Login</h1>

        <hr>

        <form class="login-form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="field">
                <label class="label">E-Mail Address</label>
                <p class="control">
                    <input class="input" id="email" type="email" name="email"
                    value="{{ old('email') }}" required autofocus>
                </p>
                @if ($errors->has('email'))
                <p class="help is-danger">
                    {{ $errors->first('email') }}
                </p>
                @endif
            </div>

            <div class="field">
                <label class="label">Password</label>
                <p class="control">
                    <input class="input" id="password" type="password" name="password" required>
                </p>
                @if ($errors->has('password'))
                <p class="help is-danger">
                    {{ $errors->first('password') }}
                </p>
                @endif
            </div>

            <div class="field">
                <p class="control">
                    <label class="checkbox">
                        <input type="checkbox"
                        name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                </p>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button type="submit" class="button is-primary">Login</button>
                </div>
                {{-- <div class="control">
                    <a class="button is-text" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                </div> --}}
            </div>

        </form>
    </div>
</div>
</div>
@endsection
