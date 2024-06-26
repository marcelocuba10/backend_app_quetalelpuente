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
    
    <form method="post" action="{{ url('/user/forget-password') }}">
        @csrf
        {{-- <input type="hidden" name="token" value="{{ $token }}"> --}}

        <div class="form-icon"><img class="img-logo" src="{{ asset('/public/adminLTE/images/logo/logo.png') }}"></div>
        <p class="login-message2">Restablecer Contraseña</p>
        <p style="text-align: center;font-size: 13px;color: #3f3f3f;line-height: 20px;">Ingrese su correo electrónico para recuperar su contraseña. Recibirás un correo electrónico con instrucciones.</p>

        @if (Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-warning" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif
        @if ($errors->has('email'))
            <div class="alert alert-warning" role="alert">
                {{ $errors->first('email') }}
            </div>
        @endif

        <div class="form-group">
            <input name="email" id="email_address" type="text" value="{{ old('email') }}" class="form-control item" placeholder="Email" required>
        </div>

        <div class="form-group" style="text-align: center;margin-top: -25px;">
            <button type="submit" id="btn_submit" class="btn btn-block create-account">Restablecer Contraseña</button>
        </div>

        <p class="text-muted text-center" style="margin-bottom: 0px;margin-top: 15px;"><small>¿Ya tienes una cuenta?</small></p>
        <p class="text-muted text-center"><a style="color: #212529;text-decoration: underline;" href="{{ url('/user/login') }}">Iniciar Sesión</a><p>
    </form>
</div>

@endsection