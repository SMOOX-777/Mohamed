{{-- layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            letter-spacing: -0.5px;
        }
        .nav-link {
            font-weight: 500;
            padding: 0.5rem 1rem !important;
        }
        .dropdown-menu {
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border: none;
            border-radius: 0.5rem;
        }
        .dropdown-item {
            padding: 0.5rem 1.5rem;
            font-weight: 500;
        }
        .dropdown-item:hover {
            background-color: #f0f4f8;
        }
        .card {
            border: none;
            box-shadow: 0 3px 15px rgba(0,0,0,0.05);
            border-radius: 0.75rem;
            overflow: hidden;
        }
        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #f0f4f8;
            padding: 1.25rem;
        }
        .btn {
            border-radius: 0.5rem;
            padding: 0.5rem 1.25rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .btn-primary {
            background-color: #4361ee;
            border-color: #4361ee;
        }
        .btn-primary:hover {
            background-color: #3a56e4;
            border-color: #3a56e4;
        }
        .btn-danger {
            background-color: #ef476f;
            border-color: #ef476f;
        }
        .btn-danger:hover {
            background-color: #e63e67;
            border-color: #e63e67;
        }
        .form-control {
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
            border: 1px solid #e0e4ec;
        }
        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.1);
            border-color: #4361ee;
        }
        footer {
            background: #212529;
            color: white;
            padding: 2rem 0;
            margin-top: 4rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="bi bi-journal-richtext me-2"></i>BlogSpace
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.index') }}">
                            <i class="bi bi-grid me-1"></i> Articles
                        </a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('posts.create') }}">
                                <i class="bi bi-plus-circle me-1"></i> Rédiger
                            </a>
                        </li>
                    @endauth
                </ul>

                <ul class="navbar-nav">
                    @auth
                        @if(auth()->user()->isAdmin())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <i class="bi bi-speedometer2 me-1"></i> Dashboard
                            </a>
                        </li>
                        @endif
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" 
                               data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.show') }}">
                                        <i class="bi bi-person me-2"></i> Mon Profil
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                        <i class="bi bi-pencil-square me-2"></i> Modifier Profil
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="dropdown-item" type="submit">
                                            <i class="bi bi-box-arrow-right me-2"></i> Déconnexion
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="bi bi-box-arrow-in-right me-1"></i> Connexion
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                <i class="bi bi-person-plus me-1"></i> Inscription
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="container py-5">
        @yield('content')
    </main>

    <footer class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="mb-0">&copy; {{ date('Y') }} BlogSpace. Tous droits réservés.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>