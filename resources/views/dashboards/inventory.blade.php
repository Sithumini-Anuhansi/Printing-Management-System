@extends('layouts.app')

@section('content')
<div class="container mt-4">
    {{-- Dashboard Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Inventory Manager Dashboard</h2>
        <div>
            <button class="btn btn-outline-primary me-2">
                <i class="fas fa-bell"></i> Notifications
            </button>
            <button class="btn btn-outline-secondary">
                <i class="fas fa-user-circle"></i> Profile
            </button>
        </div>
    </div>

    {{-- Stats Row --}}
    <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="card text-bg-primary h-100">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-boxes me-2"></i>Total Materials</h5>
                    <p class="card-text fs-2">{{ $materialsCount ?? 120 }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-bg-success h-100">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-dollar-sign me-2"></i>Inventory Value</h5>
                    <p class="card-text fs-2">Rs. {{ number_format($inventoryValue ?? 250000, 2) }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-bg-info h-100">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-truck me-2"></i>Suppliers</h5>
                    <p class="card-text fs-2">{{ $suppliersCount ?? 35 }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-bg-warning h-100">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-file-invoice me-2"></i>Pending Purchase Requests</h5>
                    <p class="card-text fs-2">{{ $pendingPurchaseRequests ?? 7 }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- CRUD Tabs for Suppliers and Materials --}}
    @include('crud_tabs', [
        'showSuppliers' => true,
        'showMaterials' => true,
        'showOrders' => false,
        'showProducts' => false,
    ])
</div>
@endsection
