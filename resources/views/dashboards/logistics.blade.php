@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm rounded-3 mb-4">
        <div class="card-body">
            <h2 class="card-title mb-3">Logistics Officer Dashboard</h2>
            <p class="text-muted">Welcome, {{ Auth::user()->name }}</p>
            <hr>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <a href="{{ route('orders.index') }}" class="btn btn-outline-primary w-100">View Orders</a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="{{ route('tasks.index') }}" class="btn btn-outline-success w-100">Manage Daily Tasks</a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="{{ route('deliveries.index') }}" class="btn btn-outline-info w-100">Record Delivery Details</a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="{{ route('reports.delivery') }}" class="btn btn-outline-dark w-100">Generate Delivery Report</a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="{{ route('quality.records') }}" class="btn btn-outline-warning w-100">Maintain Quality Records</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
