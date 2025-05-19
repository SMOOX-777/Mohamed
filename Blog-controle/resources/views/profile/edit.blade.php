@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 rounded-lg">
                <div class="card-header bg-dark text-white py-3 d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Modifier mon profil</h4>
                    <a href="{{ route('profile.show') }}" class="btn btn-sm btn-light">
                        <i class="fas fa-arrow-left me-1"></i> Retour
                    </a>
                </div>

                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <div class="avatar-placeholder bg-gradient-dark text-dark rounded-circle d-flex align-items-center justify-content-center mx-auto shadow mb-3" style="width: 100px; height: 100px; font-size: 2.5rem; border: 3px solid #fff;">
                            {{ strtoupper(substr($user->name, 0, 2)) }}
                        </div>
                    </div>

                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="form-label fw-bold">Nom</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-user text-dark"></i>
                                </span>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       id="name" name="name" value="{{ old('name', $user->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label fw-bold">Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-envelope text-dark"></i>
                                </span>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                       id="email" name="email" value="{{ old('email', $user->email) }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <hr class="my-4">
                        <h5 class="fw-bold mb-3">Changer le mot de passe</h5>
                        <p class="text-muted small mb-4">Laissez vide si vous ne souhaitez pas modifier votre mot de passe</p>

                        <div class="mb-4">
                            <label for="current_password" class="form-label fw-bold">Mot de passe actuel</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-lock text-dark"></i>
                                </span>
                                <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                                       id="current_password" name="current_password">
                                @error('current_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="new_password" class="form-label fw-bold">Nouveau mot de passe</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-key text-dark"></i>
                                </span>
                                <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                                       id="new_password" name="new_password">
                                @error('new_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="new_password_confirmation" class="form-label fw-bold">Confirmer le nouveau mot de passe</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-check-double text-dark"></i>
                                </span>
                                <input type="password" class="form-control"
                                       id="new_password_confirmation" name="new_password_confirmation">
                            </div>
                        </div>

                        <div class="d-grid gap-2 mt-5">
                            <button type="submit" class="btn btn-dark py-2">
                                <i class="fas fa-save me-2"></i>Enregistrer les modifications
                            </button>
                            <a href="{{ route('profile.show') }}" class="btn btn-light py-2">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection