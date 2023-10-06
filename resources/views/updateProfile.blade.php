@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Editar Perfil') }}</div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('actualizar') }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $usuario->name }}" required autocomplete="nombre" autofocus>

                                    @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $usuario->email }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Actualizar Perfil') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                    
                </div>

                <div class="card">
                    <div class="card-header">{{ __('Cambiar Contraseña') }}</div>
                    @if ( session('updateClave') )
                    <div class="row re" id="proBanner">
                        <div class="col-md-12 grid-margin">
                          <div class="card bg-gradient-primary border-0">
                            <div class="card-body py-3 px-4 d-flex align-items-center justify-content-between flex-wrap">
                              <p class="mb-0 text-white font-weight-medium" style="margin: 0 auto;">
                                <strong>Felicitaciones !</strong>
                                {{ session('updateClave') }}
                              </p>
                              
                              <div class="d-flex">
                                <button id="bannerClose" class="btn border-0 p-0">
                                  <i class="mdi mdi-close text-white"></i>
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                        </div>
                    @endif
                    
                    
                    @if ( session('claveIncorrecta') )
                    <div class="row re" id="proBanner">
                        <div class="col-md-12 grid-margin">
                          <div class="card bg-gradient-primary border-0">
                            <div class="card-body py-3 px-4 d-flex align-items-center justify-content-between flex-wrap">
                              <p class="mb-0 text-white font-weight-medium" style="margin: 0 auto;">
                                <strong>Lo siento !</strong>
                                {{ session('claveIncorrecta') }}
                              </p>
                              
                              <div class="d-flex">
                                <button id="bannerClose" class="btn border-0 p-0">
                                  <i class="mdi mdi-close text-white"></i>
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                        </div>
                    @endif
                    
                    
                    @if ( session('clavemenor') )
                    <div class="row re" id="proBanner">
                        <div class="col-md-12 grid-margin">
                          <div class="card bg-gradient-primary border-0">
                            <div class="card-body py-3 px-4 d-flex align-items-center justify-content-between flex-wrap">
                              <p class="mb-0 text-white font-weight-medium" style="margin: 0 auto;">
                                <strong>Lo siento !</strong>
                                {{ session('clavemenor') }}
                              </p>
                              
                              <div class="d-flex">
                                <button id="bannerClose" class="btn border-0 p-0">
                                  <i class="mdi mdi-close text-white"></i>
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                        </div>
                    @endif
                                  
                    <form action="{{route('changePassword')}}" method="POST" class="needs-validation" novalidate>
                        @csrf         
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="main-card mb-3  card">
                                    <div class="card-body">
                                        <div class="row text-center">
                                            <div class="col-md-4">
                                                <div class="form-group mt-3">
                                                    <label for="current_password">Clave Actual</label>
                                                    <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" required>
                                                    @error('current_password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mt-3">
                                                    <label for="new_password ">Nueva Clave</label>
                                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                   
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mt-3">
                                                    <label for="confirm_password">Confirmar nueva Clave</label>
                                                    <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror"required>
                                                    @error('confirm_password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                   
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                    
                                        <div class="row text-center mb-4 mt-5">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary" id="formSubmit">Guardar Cambios</button>
                                            </div>
                                        </div>
                    
                                    </div>
                                </div>
                            </div>
                        </div>        
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

