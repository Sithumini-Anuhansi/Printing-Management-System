@extends('layouts.app')

@section('content')
<div class="container mt-4">
    @include('partials.logout-bar')
    <div class="card shadow-sm rounded-3 mb-4">
        <div class="card-body">
            <h2 class="card-title mb-3">Manager Dashboard</h2>
            <p class="text-muted">Welcome, {{ Auth::user()->Name }}</p>
            <hr>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <a href="{{ Route::has('employees.index') ? route('employees.index') : '#' }}" class="btn btn-outline-primary w-100">Manage Employees</a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="{{ Route::has('tasks.index') ? route('tasks.index') : '#' }}" class="btn btn-outline-success w-100">Assign Daily Tasks</a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="{{ Route::has('sales.details') ? route('sales.details') : '#' }}" class="btn btn-outline-info w-100">View Sales Details</a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="{{ Route::has('production.details') ? route('production.details') : '#' }}" class="btn btn-outline-warning w-100">View Production Details</a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="{{ Route::has('designs.index') ? route('designs.index') : '#' }}" class="btn btn-outline-secondary w-100">View Design Files</a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="{{ Route::has('inventory.records') ? route('inventory.records') : '#' }}" class="btn btn-outline-dark w-100">View Inventory Records</a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="{{ Route::has('purchases.index') ? route('purchases.index') : '#' }}" class="btn btn-outline-primary w-100">View Purchase Records</a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="{{ Route::has('material.usage') ? route('material.usage') : '#' }}" class="btn btn-outline-success w-100">View Daily Material Usage</a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="{{ Route::has('delivery.details') ? route('delivery.details') : '#' }}" class="btn btn-outline-info w-100">View Delivery Details</a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="{{ Route::has('quality.records') ? route('quality.records') : '#' }}" class="btn btn-outline-warning w-100">View Quality Records</a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="{{ Route::has('transactions.index') ? route('transactions.index') : '#' }}" class="btn btn-outline-secondary w-100">View Transactions</a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="{{ Route::has('products.index') ? route('products.index') : '#' }}" class="btn btn-outline-dark w-100">View Products</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
