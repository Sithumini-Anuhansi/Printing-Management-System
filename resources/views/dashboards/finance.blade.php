@extends('layouts.app')

@section('content')
<div class="container mt-4">
    @include('partials.logout-bar')
    <div class="card shadow-sm rounded-3 mb-4">
        <div class="card-body">
            <h2 class="card-title mb-3">Finance Officer Dashboard</h2>
            <p class="text-muted">Welcome, {{ Auth::user()->Name }}</p>
            <hr>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <a href="{{ Route::has('transactions.index') ? route('transactions.index') : '#' }}" class="btn btn-outline-primary w-100">Maintain Transactions</a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="{{ Route::has('payments.request') ? route('payments.request') : '#' }}" class="btn btn-outline-success w-100">Request Payments</a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="{{ Route::has('invoices.request') ? route('invoices.request') : '#' }}" class="btn btn-outline-info w-100">Request Invoices</a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="{{ Route::has('reports.financial') ? route('reports.financial') : '#' }}" class="btn btn-outline-dark w-100">Generate Financial Reports</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
