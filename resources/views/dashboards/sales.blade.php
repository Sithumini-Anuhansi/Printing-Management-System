@extends('layouts.app')

@section('content')
<div class="container mt-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Sales Officer Dashboard</h2>
        <div>
            <span class="badge bg-primary">Role: Sales Officer</span>
            <a href="{{ route('logout') }}" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
               class="btn btn-outline-danger btn-sm ms-3">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>

    {{-- Key Sales Stats --}}
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Daily Sales</h5>
                    <p class="card-text fs-3">Rs. 120,500</p>
                    <small>Updated Today</small>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Customers</h5>
                    <p class="card-text fs-3">320</p>
                    <small>Active Customers</small>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Pending Orders</h5>
                    <p class="card-text fs-3">15</p>
                    <small>Orders awaiting approval</small>
                </div>
            </div>
        </div>
    </div>

    {{-- CRUD Tabs for Sales Officer: Orders only --}}
    <ul class="nav nav-pills mb-4" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="orders-tab" data-bs-toggle="pill" href="#orders" role="tab" aria-controls="orders" aria-selected="true">
                <i class="fas fa-shopping-cart me-2"></i>Orders
            </a>
        </li>
    </ul>

    <div class="tab-content">
        {{-- Orders CRUD --}}
        <div class="tab-pane fade show active" id="orders" role="tabpanel" aria-labelledby="orders-tab">
            <div class="row">
                {{-- Order Form --}}
                <div class="col-md-4">
                    <div class="card bg-light mb-4">
                        <div class="card-header">
                            <h5><i class="fas fa-edit me-2"></i>Order Form</h5>
                        </div>
                        <div class="card-body">
                            <form id="orderForm">
                                <input type="hidden" id="orderId">
                                <div class="mb-3">
                                    <label for="orderType" class="form-label">Order Type</label>
                                    <select class="form-select" id="orderType" required>
                                        <option value="">Select Type</option>
                                        <option value="Business Cards">Business Cards</option>
                                        <option value="Brochures">Brochures</option>
                                        <option value="Flyers">Flyers</option>
                                        <option value="Banners">Banners</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="orderDate" class="form-label">Order Date</label>
                                    <input type="date" class="form-control" id="orderDate" required>
                                </div>
                                <div class="mb-3">
                                    <label for="orderQuantity" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" id="orderQuantity" required>
                                </div>
                                <div class="mb-3">
                                    <label for="orderAmount" class="form-label">Amount (Rs.)</label>
                                    <input type="number" step="0.01" class="form-control" id="orderAmount" required>
                                </div>
                                <div class="mb-3">
                                    <label for="orderDueDate" class="form-label">Due Date</label>
                                    <input type="date" class="form-control" id="orderDueDate" required>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-save me-2"></i>Save Order
                                </button>
                                <button type="button" class="btn btn-secondary w-100 mt-2" onclick="clearOrderForm()">
                                    <i class="fas fa-times me-2"></i>Clear
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Orders Table --}}
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5><i class="fas fa-list me-2"></i>Orders List</h5>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Type</th>
                                        <th>Order Date</th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
                                        <th>Due Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="ordersTableBody">
                                    {{-- Orders will load here --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- Bootstrap & FontAwesome Scripts --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>

{{-- Orders CRUD JS --}}
<script>
    let orders = [
        {id: 1001, type: 'Business Cards', date: '2023-05-15', quantity: 500, amount: 150.00, dueDate: '2023-05-20', status: 'Pending'}
    ];

    document.addEventListener('DOMContentLoaded', () => {
        loadOrders();

        // Set today as default order date
        document.getElementById('orderDate').value = new Date().toISOString().split('T')[0];
    });

    function loadOrders() {
        const tbody = document.getElementById('ordersTableBody');
        tbody.innerHTML = '';

        orders.forEach(order => {
            const statusClass = order.status === 'Completed' ? 'bg-success' : 'bg-warning text-dark';
            tbody.innerHTML += `
                <tr>
                    <td>${order.id}</td>
                    <td>${order.type}</td>
                    <td>${order.date}</td>
                    <td>${order.quantity}</td>
                    <td>Rs. ${order.amount.toFixed(2)}</td>
                    <td>${order.dueDate}</td>
                    <td><span class="badge ${statusClass}">${order.status}</span></td>
                    <td>
                        <button class="btn btn-sm btn-warning" onclick="editOrder(${order.id})"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger ms-1" onclick="deleteOrder(${order.id})"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            `;
        });
    }

    function clearOrderForm() {
        document.getElementById('orderForm').reset();
        document.getElementById('orderId').value = '';
        document.getElementById('orderDate').value = new Date().toISOString().split('T')[0];
    }

    function editOrder(id) {
        const order = orders.find(o => o.id === id);
        if (order) {
            document.getElementById('orderId').value = order.id;
            document.getElementById('orderType').value = order.type;
            document.getElementById('orderDate').value = order.date;
            document.getElementById('orderQuantity').value = order.quantity;
            document.getElementById('orderAmount').value = order.amount;
            document.getElementById('orderDueDate').value = order.dueDate;
        }
    }

    function deleteOrder(id) {
        if (confirm('Are you sure you want to delete this order?')) {
            orders = orders.filter(o => o.id !== id);
            loadOrders();
            alert('Order deleted successfully!');
        }
    }

    document.getElementById('orderForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const id = document.getElementById('orderId').value;
        const orderData = {
            id: id ? parseInt(id) : Date.now(),
            type: document.getElementById('orderType').value,
            date: document.getElementById('orderDate').value,
            quantity: parseInt(document.getElementById('orderQuantity').value),
            amount: parseFloat(document.getElementById('orderAmount').value),
            dueDate: document.getElementById('orderDueDate').value,
            status: 'Pending'
        };

        if (id) {
            const index = orders.findIndex(o => o.id === parseInt(id));
            if (index !== -1) orders[index] = orderData;
        } else {
            orders.push(orderData);
        }

        loadOrders();
        clearOrderForm();
        alert('Order saved successfully!');
    });
</script>
@endsection
