@extends('layouts.app_login')

@section('content')

<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo text-center">
                <img src="{{ asset('images/logo-r.jpg') }}" alt="logo" style="width:250px;">
              </div>
              <h1 class="text-center" style="font-weight: 800 !important;">Iniciar Sesión</h1>

              <form method="POST" action="{{ route('login') }}" class="pt-3">
                @csrf

                    <div class="form-group">
                        <input id="email" placeholder= "Ingresa tu email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input id="password" placeholder="Ingresa tu contraseña" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" >

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                            <div class="mt-3">
                                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                    {{ __('Entrar') }}
                                </button>
                            </div>
                            <div class="text-center mt-4 font-weight-light">
                              
                   <a href="/register" class="btn btn-outline-success">Registrarse</a>

                   <a href="/email" class="btn btn-outline-danger">¿Olvidó su contraseña?</a>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>







@endsection
