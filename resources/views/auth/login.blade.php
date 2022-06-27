@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 pt-1">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{url('images/logo-z.png')}}" width="80" alt="Logo">
                    </div>
                    <h2 class="fw-bold text-muted text-center pt-3">{{ __('Iniciar Sesión') }}</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row">
                            <div class="col pt-3 pb-2">
                                <label for="email" class="form-label fw-bold fs-5 text-muted">
                                    Usuario o correo
                                </label>
                                <input type="email" name="email" id="email" class="form-control rounded-4 @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col py-2">
                                <label for="password" class="form-label fw-bold fs-5 text-muted">
                                    Contraseña
                                </label>
                                <br>
                                <input type="password" name="password" id="password" class="form-control rounded-4 @error('password') is-invalid @enderror" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recordarme') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        @if(session('info'))
                        {{ session('info') }}
                        @endif
                        <div class="row">
                            <div class="col pt-2 pb-3 text-center">
                                <button type="submit" class="btn btn-primary btn-lg rounded-pill">Entrar</button>
                            </div>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="link-secondary" href="{{ route('password.request') }}">
                                {{ __('Olvidé la contraseña') }}
                            </a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection