@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow rounded-4 border-0">
                <div class="card-header bg-dark text-white rounded-top-4">
                    <h4 class="mb-0">My Profile</h4>
                </div>

                <div class="card-body p-4">
                    <div class="row align-items-center mb-4">
                        <div class="col-md-4 text-center">
                            <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3"
                                style="width: 150px; height: 150px; font-size: 3rem;">
                                {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                            </div>
                        </div>
                        <div class="col-md-8 text-md-start text-center">
                            <h3 class="fw-bold">{{ Auth::user()->name }}</h3>
                            <p class="text-muted mb-1">Member since {{ Auth::user()->created_at->format('F Y') }}</p>
                            <p class="mb-1"><strong>Email:</strong> {{ Auth::user()->email }}</p>
                            <p><strong>Role:</strong> {{ ucfirst(Auth::user()->role) }}</p>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="card text-center border-0 shadow-sm">
                                <div class="card-body">
                                    <h6 class="text-muted">Total Posts</h6>
                                    <h3 class="fw-bold">{{ Auth::user()->posts->count() }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card text-center border-0 shadow-sm">
                                <div class="card-body">
                                    <h6 class="text-muted">Total Comments</h6>
                                    <h3 class="fw-bold">{{ Auth::user()->comments->count() }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 text-end">
                        <a href="{{ route('profile.edit') }}" class="btn btn-outline-dark px-4">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
