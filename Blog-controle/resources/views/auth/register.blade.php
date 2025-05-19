@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-dark text-white text-center py-3">
                    <h4 class="mb-0">{{ __('Créer un compte') }}</h4>
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="form-label text-muted small text-uppercase">{{ __('Nom') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-person"></i>
                                </span>
                                <input id="name" type="text" class="form-control border-start-0 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Votre nom complet" required autocomplete="name" autofocus>
                            </div>
                            @error('name')
                                <span class="invalid-feedback d-block mt-1" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label text-muted small text-uppercase">{{ __('Adresse Email') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input id="email" type="email" class="form-control border-start-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="votre@email.com" required autocomplete="email">
                            </div>
                            @error('email')
                                <span class="invalid-feedback d-block mt-1" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label text-muted small text-uppercase">{{ __('Mot de passe') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input id="password" type="password" class="form-control border-start-0 @error('password') is-invalid @enderror" name="password" placeholder="Minimum 8 caractères" required autocomplete="new-password">
                            </div>
                            @error('password')
                                <span class="invalid-feedback d-block mt-1" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password-confirm" class="form-label text-muted small text-uppercase">{{ __('Confirmer le mot de passe') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-lock-fill"></i>
                                </span>
                                <input id="password-confirm" type="password" class="form-control border-start-0" name="password_confirmation" placeholder="Répétez votre mot de passe" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" class="btn btn-dark py-2 fw-bold">
                                {{ __('S\'INSCRIRE') }}
                            </button>
                        </div>
                        
                        <div class="text-center">
                            <span class="text-muted">{{ __('Déjà inscrit?') }}</span>
                            <a class="text-decoration-none ms-1" href="{{ route('login') }}">
                                {{ __('Se connecter') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection