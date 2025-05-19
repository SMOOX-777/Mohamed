@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10">

            
            <div class="card mb-5">
                <div class="card-body p-md-5">
                    <h1 class="fw-bold mb-4">{{ $post->title }}</h1>
                    
                    <div class="d-flex align-items-center mb-4">
                        <div class="rounded-circle bg-secondary bg-opacity-10 p-2 me-3">
                            <i class="bi bi-person text-secondary"></i>
                        </div>
                        <span class="text-muted">{{ $post->user->name }}</span>
                        <span class="mx-3 text-muted">•</span>
                        <span class="text-muted">
                            <i class="bi bi-calendar3 me-1"></i>
                            {{ $post->created_at->format('d M Y') }}
                        </span>
                    </div>
                    
                    @if($post->photo)
                    <div class="my-4">
                        <img src="{{ asset('storage/' . $post->photo) }}" 
                             alt="{{ $post->title }}" 
                             class="img-fluid rounded shadow-sm" style="max-height: 500px; width: 100%; object-fit: cover;">
                    </div>
                    @endif
                    
                    <div class="content mt-4 fs-5 lh-lg">
                        {{ $post->content }}
                    </div>
                    
                    <div class="mt-5 pt-4 border-top">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('posts.index') }}" class="btn btn-outline-primary">
                                <i class="bi bi-arrow-left me-2"></i> Retour aux articles
                            </a>
                            @can('update', $post)
                            <div>
                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-outline-secondary me-2">
                                    <i class="bi bi-pencil"></i> Modifier
                                </a>
                                @can('delete', $post)
                                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger" 
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article?')">
                                        <i class="bi bi-trash"></i> Supprimer
                                    </button>
                                </form>
                                @endcan
                            </div>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="comments-section mt-5">
                <h3 class="fw-bold mb-4">
                    <i class="bi bi-chat-square-text me-2 text-primary"></i>
                    Commentaires ({{ $post->comments->count() }})
                </h3>
                
                @auth
                <div class="card mb-4">
                    <div class="card-body p-4">
                        <h5 class="mb-3">Ajouter un commentaire</h5>
                        <form action="{{ route('comments.store', $post) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <textarea class="form-control @error('content') is-invalid @enderror" 
                                          name="content" rows="3" 
                                          placeholder="Partagez votre avis sur cet article..."></textarea>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-send me-1"></i> Publier
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <div class="alert alert-light mb-4">
                    <p class="mb-0">
                        <i class="bi bi-info-circle me-2"></i>
                        <a href="{{ route('login') }}">Connectez-vous</a> pour laisser un commentaire.
                    </p>
                </div>
                @endauth
                
                @if($post->comments->count() > 0)
                <div class="comment-list">
                    @foreach($post->comments as $comment)
                        <div class="card mb-3 border-0 shadow-sm">
                            <div class="card-body p-4">
                                <div class="d-flex mb-3">
                                    <div class="rounded-circle bg-primary bg-opacity-10 p-2 me-3">
                                        <i class="bi bi-person text-primary"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 fw-bold">{{ $comment->user->name }}</h6>
                                        <small class="text-muted">{{ $comment->created_at->format('d M Y, H:i') }}</small>
                                    </div>
                                    @can('delete', $comment)
                                    <div class="ms-auto">
                                        <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" 
                                                    onclick="return confirm('Supprimer ce commentaire?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                    @endcan
                                </div>
                                <p class="mb-0">{{ $comment->content }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                @else
                <div class="text-center py-5">
                    <i class="bi bi-chat-square text-muted" style="font-size: 3rem;"></i>
                    <p class="mt-3 text-muted">Soyez le premier à commenter cet article!</p>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection