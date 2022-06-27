<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4 pt-5">
                <div class="card rounded-4">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{url('images/logo-z.png')}}" width="80" alt="Logo">
                        </div>
                        <h2 class="fw-bold text-muted text-center pt-3">{{ __('Iniciar Sesión') }}</h2>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row">
                                <div class="col py-3">
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
                                <div class="col py-3">
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
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            @if(session('info'))
                            {{ session('info') }}
                            @endif
                            <div class="row">
                                <div class="col py-3 text-center">
                                    <button type="submit" class="btn btn-primary btn-lg rounded-pill">Entrar</button>
                                </div>
                            </div>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 py-5">
                <div class="text-center">
                    <a href="/" class="link-secondary px-5" title="About Z Inc.">Z Inc.</a>
                    <a href="/" class="link-secondary px-5" title="Blog Z Inc.">Blog</a>
                    <a href="/" class="link-secondary px-5" title="Help">Help</a>
                </div>
            </div>
        </div>
    </div>
</footer>
</html>