@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h1 class="fw-bold">Nos articles</h1>
            <p class="text-muted">Découvrez les dernières actualités et articles</p>
        </div>
        @auth
        <div>
            <a href="{{ route('posts.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i> Nouvel article
            </a>
        </div>
        @endauth
    </div>

    <div class="row g-4">
        @foreach($posts as $post)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    @if($post->photo)
                    <div class="ratio ratio-16x9">
                        <img src="{{ asset('storage/' . $post->photo) }}"
                             alt="{{ $post->title }}"
                             class="card-img-top" style="object-fit: cover;">
                    </div>
                    @endif
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle bg-primary bg-opacity-10 p-2 me-3">
                                <i class="bi bi-person text-primary"></i>
                            </div>
                            <small class="text-muted">{{ $post->user->name }}</small>
                            <small class="text-muted ms-auto">
                                <i class="bi bi-calendar3 me-1"></i>
                                {{ $post->created_at->format('d M Y') }}
                            </small>
                        </div>
                        
                        <h4 class="card-title fw-bold">{{ $post->title }}</h4>
                        <p class="card-text text-muted">{{ Str::limit($post->content, 150) }}</p>
                    </div>
                    <div class="card-footer bg-white border-0 pt-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('posts.show', $post) }}" class="btn btn-outline-primary btn-sm">
                                Lire la suite <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                            @can('delete', $post)
                                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm" 
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-5">
        {{ $posts->links() }}
    </div>
@endsection