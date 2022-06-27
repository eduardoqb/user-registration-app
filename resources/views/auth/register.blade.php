@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 pt-1">
            <div class="card rounded-4">
                <div class="card-body">
                    <h3 class="fw-bold text-muted text-center pt-2 pb-3">{{ __('Registro') }}</h3>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombres') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control rounded-4 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="last-name" class="col-md-4 col-form-label text-md-end">{{ __('Apellidos') }}</label>

                            <div class="col-md-6">
                                <input id="last-name" type="text" class="form-control rounded-4 @error('last-name') is-invalid @enderror" name="last-name" value="{{ old('last-name') }}" required autocomplete="last-name" autofocus>

                                @error('last-name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tipo-documento" class="col-md-4 col-form-label text-md-end">{{ __('Tipo de documento') }}</label>

                            <div class="col-md-6">
                                <select id="tipo-documento" type="select" class="form-select rounded-4 @error('tipo-documento') is-invalid @enderror" name="tipo-documento" value="{{ old('tipo-documento') }}" required autocomplete="tipo-documento" autofocus>
                                    <option>Seleccione una opción</option>
                                    <option value="1">Cédula de Ciudadania</option>
                                    <option value="2">Cédula de Extranjeria</option>
                                    <option value="3">Pasaporte</option>
                                </select>
                                @error('tipo-documento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="numero-documento" class="col-md-4 col-form-label text-md-end">{{ __('Número de documento') }}</label>

                            <div class="col-md-6">
                                <input id="numero-documento" type="text" class="form-control rounded-4 @error('numero-documento') is-invalid @enderror" name="numero-documento" value="{{ old('numero-documento') }}" required autocomplete="numero-documento" autofocus>

                                @error('numero-documento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="fecha-nacimiento" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de nacimiento') }}</label>

                            <div class="col-md-6">
                                <input id="fecha-nacimiento" type="date" class="form-control rounded-4 @error('fecha-nacimiento') is-invalid @enderror" name="fecha-nacimiento" value="{{ old('fecha-nacimiento') }}" required autocomplete="fecha-nacimiento" autofocus>

                                @error('fecha-nacimiento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ciudad-nacimiento" class="col-md-4 col-form-label text-md-end">{{ __('Ciudad de nacimiento') }}</label>

                            <div class="col-md-6">
                                <select id="ciudad-nacimiento" type="select" class="form-select rounded-4 @error('ciudad-nacimiento') is-invalid @enderror" name="ciudad-nacimiento" value="{{ old('ciudad-nacimiento') }}" required autocomplete="ciudad-nacimiento" autofocus>
                                    <option>Seleccione una opción</option>
                                    @foreach($ciudades as $ciudad)
                                        <option value="{{ $ciudad['id'] }}">{{ $ciudad['nombre'] }}</option>
                                    @endforeach
                                </select>

                                @error('ciudad-nacimiento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control rounded-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control rounded-4 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control rounded-4" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0 pt-2">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary rounded-pill">
                                    {{ __('Continuar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection