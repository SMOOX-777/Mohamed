{{-- dashboard.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h1 class="fw-bold">Tableau de bord</h1>
            <p class="text-muted">Statistiques et analyse de votre blog</p>
        </div>
        <div>
            <a href="{{ route('posts.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i> Nouvel article
            </a>
        </div>
    </div>

    <!-- Quick Stats Cards -->
    <div class="row g-4 mb-5">
        <div class="col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 me-3">
                            <div class="rounded-circle bg-primary bg-opacity-10 p-3">
                                <i class="bi bi-file-earmark-text text-primary fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="text-muted fw-semibold mb-1">Articles Total</h6>
                            <h2 class="fw-bold mb-0">{{ $stats['total_posts'] }}</h2>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light py-3 border-0">
                    <div class="d-flex align-items-center">
                        <small class="text-muted">Publications sur la plateforme</small>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 me-3">
                            <div class="rounded-circle bg-success bg-opacity-10 p-3">
                                <i class="bi bi-calendar-day text-success fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="text-muted fw-semibold mb-1">Aujourd'hui</h6>
                            <h2 class="fw-bold mb-0">{{ $stats['posts_today'] }}</h2>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light py-3 border-0">
                    <div class="d-flex align-items-center">
                        <small class="text-muted">Articles publiés aujourd'hui</small>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 me-3">
                            <div class="rounded-circle bg-info bg-opacity-10 p-3">
                                <i class="bi bi-calendar-week text-info fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="text-muted fw-semibold mb-1">Cette semaine</h6>
                            <h2 class="fw-bold mb-0">{{ $stats['posts_this_week'] }}</h2>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light py-3 border-0">
                    <div class="d-flex align-items-center">
                        <small class="text-muted">Articles des 7 derniers jours</small>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 me-3">
                            <div class="rounded-circle bg-warning bg-opacity-10 p-3">
                                <i class="bi bi-calendar-month text-warning fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="text-muted fw-semibold mb-1">Ce mois</h6>
                            <h2 class="fw-bold mb-0">{{ $stats['posts_this_month'] }}</h2>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light py-3 border-0">
                    <div class="d-flex align-items-center">
                        <small class="text-muted">Articles du mois en cours</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Engagement Stats & Top Contributors -->
    <div class="row g-4 mb-5">
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white py-3 border-0">
                    <h5 class="fw-bold mb-0">
                        <i class="bi bi-people me-2 text-primary"></i>Statistiques communauté
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-muted">Utilisateurs total</span>
                            <h5 class="fw-bold mb-0">{{ $stats['total_users'] }}</h5>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-primary" style="width: 100%"></div>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-muted">Commentaires total</span>
                            <h5 class="fw-bold mb-0">{{ $stats['total_comments'] }}</h5>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-success" style="width: 100%"></div>
                        </div>
                    </div>
                    
                    <div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-muted">Taux d'engagement</span>
                            <h5 class="fw-bold mb-0">{{ $stats['engagement_rate']->rate }}%</h5>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-info" style="width: {{ $stats['engagement_rate']->rate }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white py-3 border-0">
                    <h5 class="fw-bold mb-0">
                        <i class="bi bi-trophy me-2 text-warning"></i>Top contributeurs
                    </h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4">Utilisateur</th>
                                    <th>Articles</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stats['top_users'] as $index => $user)
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar {{ ['bg-primary', 'bg-success', 'bg-info', 'bg-warning', 'bg-danger'][$index % 5] }} bg-opacity-10 rounded-circle p-2 text-center">
                                                    <span class="fw-bold {{ ['text-primary', 'text-success', 'text-info', 'text-warning', 'text-danger'][$index % 5] }}">
                                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <h6 class="mb-0">{{ $user->name }}</h6>
                                                <small class="text-muted">Membre</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark">{{ $user->posts_count }}</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent & Popular Posts -->
    <div class="row g-4 mb-5">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0">
                        <i class="bi bi-clock-history me-2 text-primary"></i>Articles récents
                    </h5>
                    <a href="{{ route('posts.index') }}" class="btn btn-sm btn-light">
                        Tout voir
                    </a>
                </div>
                <div class="card-body p-0">
                    @foreach($stats['recent_posts'] as $index => $post)
                    <div class="d-flex p-4 {{ $index < count($stats['recent_posts']) - 1 ? 'border-bottom' : '' }}">
                        <div class="flex-shrink-0 me-3">
                            <div class="rounded bg-light p-2 text-center" style="width: 50px; height: 50px;">
                                <i class="bi bi-file-earmark-text text-primary"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="fw-bold mb-1">{{ $post->title }}</h6>
                            <p class="mb-1 text-truncate">{{ Str::limit($post->content, 80) }}</p>
                            <div class="d-flex align-items-center">
                                <small class="text-muted">{{ $post->user->name }}</small>
                                <span class="mx-2">•</span>
                                <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                                <span class="mx-2">•</span>
                                <small class="text-muted">{{ $post->comments->count() }} commentaires</small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0">
                        <i class="bi bi-chat-square-dots me-2 text-success"></i>Articles les plus discutés
                    </h5>
                    <a href="{{ route('posts.index') }}" class="btn btn-sm btn-light">
                        Tout voir
                    </a>
                </div>
                <div class="card-body p-0">
                    @foreach($stats['popular_posts'] as $index => $post)
                    <div class="d-flex p-4 {{ $index < count($stats['popular_posts']) - 1 ? 'border-bottom' : '' }}">
                        <div class="flex-shrink-0 me-3">
                            <div class="rounded bg-success bg-opacity-10 p-2 text-center d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <span class="fw-bold text-success">{{ $post->comments_count }}</span>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between">
                                <h6 class="fw-bold mb-1">{{ $post->title }}</h6>
                            </div>
                            <div class="d-flex align-items-center">
                                <small class="text-muted">Par {{ $post->user->name }}</small>
                                <span class="ms-auto">
                                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-eye"></i> Voir
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Monthly Activity Chart -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white py-3 border-0">
            <h5 class="fw-bold mb-0">
                <i class="bi bi-bar-chart me-2 text-info"></i>Activité mensuelle ({{ date('Y') }})
            </h5>
        </div>
        <div class="card-body p-4">
            <div class="chart-container" style="height: 300px;">
                <div class="row h-100 align-items-end mx-0">
                    @foreach($stats['monthly_posts'] as $monthStat)
                    <div class="col px-1 h-100 d-flex flex-column justify-content-end">
                        <div class="d-flex flex-column align-items-center mb-2">
                            <span class="text-muted mb-1 small">{{ $monthStat->count }}</span>
                            @php 
                                $maxHeight = 210; // Maximum bar height in pixels
                                $maxCount = max(array_column($stats['monthly_posts']->toArray(), 'count'));
                                $height = $maxCount > 0 ? ($monthStat->count / $maxCount) * $maxHeight : 0;
                                $height = max($height, 10); // Minimum bar height for visibility
                            @endphp
                            <div class="rounded bg-primary bg-opacity-{{ $monthStat->count ? '75' : '25' }}" 
                                 style="width: 30px; height: {{ $height }}px;"></div>
                        </div>
                        <div class="text-center mt-auto">
                            <span class="text-muted small">{{ date('M', mktime(0, 0, 0, $monthStat->month, 1)) }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card-footer bg-light py-3 border-0 text-center">
            <small class="text-muted">Distribution des publications par mois sur l'année {{ date('Y') }}</small>
        </div>
    </div>
</div>
@endsection