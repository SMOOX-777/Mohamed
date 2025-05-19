@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-dark text-white text-center py-3">
                    <h4 class="mb-0">{{ __('Connexion') }}</h4>
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="form-label text-muted small text-uppercase">{{ __('Adresse Email') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input id="email" type="email" class="form-control border-start-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="votre@email.com" required autocomplete="email" autofocus>
                            </div>
                            @error('email')
                                <span class="invalid-feedback d-block mt-1" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="password" class="form-label text-muted small text-uppercase">{{ __('Mot de passe') }}</label>
                                @if (Route::has('password.request'))
                                    <a class="text-decoration-none small" href="{{ route('password.request') }}">
                                        {{ __('Mot de passe oublié?') }}
                                    </a>
                                @endif
                            </div>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input id="password" type="password" class="form-control border-start-0 @error('password') is-invalid @enderror" name="password" placeholder="••••••••" required autocomplete="current-password">
                            </div>
                            @error('password')
                                <span class="invalid-feedback d-block mt-1" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Se souvenir de moi') }}
                                </label>
                            </div>
                        </div>

                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" class="btn btn-dark py-2 fw-bold">
                                {{ __('SE CONNECTER') }}
                            </button>
                        </div>
                        
                        <div class="text-center">
                            <span class="text-muted">{{ __('Pas encore de compte?') }}</span>
                            <a class="text-decoration-none ms-1" href="{{ route('register') }}">
                                {{ __('Créer un compte') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection