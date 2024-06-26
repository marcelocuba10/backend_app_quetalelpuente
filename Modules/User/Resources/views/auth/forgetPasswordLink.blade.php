@extends('user::layouts.auth.auth-master')

@section('content')

<div class="container">
    <div class="left"></div>
    <div class="right">
        <div class="ergts">
            <a href="{{ url('/') }}"><button class="ththhf" type="button" class="btn btn-block create-account">Página Web</button></a>
        </div>    
        <div class="login-texto off-mobile">
            <p class="login-title">Bienvenido a {{ config('app.name') }}</p>
            <p class="login-message">Gestión Comercial de Agentes</p>
        </div>
    </div>    
</div> 

<div class="registration-form">
    
    <form method="post" action="{{ url('/user/reset-password') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-icon"><img class="img-logo" src="{{ asset('/public/adminLTE/images/logo/logo.png') }}"></div>
        <p class="login-message2">Restablecer la Contraseña</p>

        @if (Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-warning" role="alert">
                {{ Session::get('error') }}
            </div>
        @endif
        @if ($errors->has('email'))
            <div class="alert alert-warning" role="alert">
                {{ $errors->first('email') }}
            </div>
        @endif
        @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
        @if ($errors->has('password_confirmation'))
            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
        @endif
        
        <div class="form-group">
            <input name="email" type="email" value="{{ old('email') }}" class="form-control item" placeholder="Ingrese su Email" required>
        </div>

        <div class="form-group">
            <input name="password" type="password" value="{{ old('password') }}" class="form-control item" placeholder="Nueva Contraseña" required>
        </div>

        <div class="form-group">
            <input name="password_confirmation" type="password" value="{{ old('password_confirmation') }}" class="form-control item" placeholder="Confirme Nueva Contraseña" required>
        </div>

        <div class="form-group" style="text-align: center;margin-top: -25px;">
            <button type="submit" class="btn btn-block create-account">Restablecer Contraseña</button>
        </div>

        <p class="text-muted text-center" style="margin-bottom: 0px;margin-top: 15px;"><small>¿Ya tienes una cuenta?</small></p>
        <p class="text-muted text-center"><a style="color: #212529;text-decoration: underline;" href="{{ url('/user/login') }}">Iniciar Sesión</a><p>
    </form>
</div>

@endsection