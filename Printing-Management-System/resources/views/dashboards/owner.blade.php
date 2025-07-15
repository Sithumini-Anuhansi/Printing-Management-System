@extends('layouts.app')

<style>
    body {
        margin: 0;
        padding-top: 70px; /* equal to header height */
    }

    .navbar.custom-header {
        background-color: #004085;
        color: white;
        width: 100%;
        padding: 0.5rem 2rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-bottom: 3px solid #1890ff;
        position: fixed;
        top: 0;
        z-index: 1000;
    }

    .custom-header .logo img {
        border-radius: 10px;
        object-fit: cover;
    }

    .custom-header h1 {
        color: white;
        font-size: 1.4rem;
        margin: 0;
    }

    .custom-header .user-info {
        color: white;
    }

    .custom-header .user-info span {
        font-weight: 600;
        font-size: 0.95rem;
    }

    .custom-header .btn-outline-danger {
        color: #fff;
        border-color: #dc3545;
    }

    .custom-header .btn-outline-danger:hover {
        background-color: #dc3545;
        color: #fff;
    }

    .sidebar {
        position: fixed;
        top: 70px;
        left: 0;
        width: 220px;
        max-height: calc(100vh - 70px); /* keeps it within screen */
        background-color: #212529;
        color: white;
        padding-top: 2rem;
        overflow-y: auto; /* scrolls inside if content exceeds */
        border-right: 1px solid #444;
    }

    .sidebar .nav-link {
        color: white;
        background: transparent;
        transition: background-color 0.3s ease;
    }

    .sidebar .nav-link:hover,
    .sidebar .nav-link.active {
        background-color: #0d6efd;
        color: white;
    }

    .main-content {
        margin-left: 220px;
        padding: 2rem;
        padding-bottom: 4rem; /* avoids overlap with footer */
    }

    .dashboard-title {
        text-align: center;
        font-size: 1.5rem;
        margin-bottom: 2rem;
    }

    .stats-cards .card {
        border: none;
        border-radius: 0.5rem;
    }
</style>

<header>
    <nav class="navbar custom-header d-flex justify-content-between align-items-center">
        <div class="logo d-flex align-items-center">
            <img src="{{ asset('images/logo.jpg') }}" alt="Chamath Enterprises Logo" width="50" height="50" class="me-3">
            <h1 class="h4 m-0">Chamath Enterprises</h1>
        </div>
        <div class="user-info d-flex align-items-center">
            <span class="me-3">{{ Auth::user()->Name }} ({{ Auth::user()->Role }})</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-sm btn-outline-danger">Logout</button>
            </form>
        </div>
    </nav>
</header>

@section('content')
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center mb-4">Dashboard</h4>
        <ul class="nav flex-column nav-pills" id="crudTab" role="tablist" aria-orientation="vertical">
            <li class="nav-item mb-2" role="presentation">
                <button class="nav-link active w-100 text-start" id="suppliers-tab" data-bs-toggle="pill" data-bs-target="#suppliers" type="button" role="tab" aria-controls="suppliers" aria-selected="true">
                    <i class="fas fa-truck me-2"></i> Suppliers
                </button>
            </li>
            <li class="nav-item mb-2" role="presentation">
                <button class="nav-link w-100 text-start" id="materials-tab" data-bs-toggle="pill" data-bs-target="#materials" type="button" role="tab" aria-controls="materials" aria-selected="false">
                    <i class="fas fa-boxes me-2"></i> Materials
                </button>
            </li>
            <li class="nav-item mb-2" role="presentation">
                <button class="nav-link w-100 text-start" id="orders-tab" data-bs-toggle="pill" data-bs-target="#orders" type="button" role="tab" aria-controls="orders" aria-selected="false">
                    <i class="fas fa-shopping-cart me-2"></i> Orders
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link w-100 text-start" id="products-tab" data-bs-toggle="pill" data-bs-target="#products" type="button" role="tab" aria-controls="products" aria-selected="false">
                    <i class="fas fa-tag me-2"></i> Products
                </button>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h3 class="dashboard-title">Welcome, {{ Auth::user()->Name }}!</h3>

        {{-- Tabbed Content --}}
        <div class="tab-content" id="crudTabContent">
            <div class="tab-pane fade show active" id="suppliers" role="tabpanel" aria-labelledby="suppliers-tab">
                {{--@include('crud.suppliers')--}}
            <div class="tab-pane fade" id="materials" role="tabpanel" aria-labelledby="materials-tab">
                {{--@include('crud.materials')--}}
            </div>
            <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                {{-- @include('crud.orders') --}}
            </div>
            <div class="tab-pane fade" id="products" role="tabpanel" aria-labelledby="products-tab">
                {{-- @include('crud.products') --}}
            </div>
        </div>

        {{-- Stats Section --}}
        <div class="row mt-5 mb-4 stats-cards">
            <div class="col-md-3">
                <div class="card text-white bg-primary shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <p class="card-text fs-3">{{ $totalUsers ?? 0 }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Orders</h5>
                        <p class="card-text fs-3">{{ $totalOrders ?? 0 }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-warning shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Pending Payments</h5>
                        <p class="card-text fs-3">Rs. {{ number_format($pendingPayments ?? 0, 2) }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-info shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Active Suppliers</h5>
                        <p class="card-text fs-3">{{ $activeSuppliers ?? 0 }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
