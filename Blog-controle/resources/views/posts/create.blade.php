@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0 fw-bold">
                        <i class="bi bi-pencil-square me-2 text-primary"></i>Créer un nouvel article
                    </h3>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="form-label fw-semibold">Titre</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                   id="title" name="title" value="{{ old('title') }}" 
                                   placeholder="Entrez le titre de votre article">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="content" class="form-label fw-semibold">Contenu</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" 
                                      id="content" name="content" rows="6" 
                                      placeholder="Rédigez le contenu de votre article ici...">{{ old('content') }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="photo" class="form-label fw-semibold">Image de couverture</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="bi bi-image"></i>
                                </span>
                                <input type="file" class="form-control @error('photo') is-invalid @enderror" 
                                       id="photo" name="photo" accept="image/*">
                            </div>
                            <div class="form-text">Formats acceptés: JPG, PNG, GIF. Taille max: 2Mo</div>
                            @error('photo')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary me-md-2">Annuler</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-lg me-1"></i> Publier l'article
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection