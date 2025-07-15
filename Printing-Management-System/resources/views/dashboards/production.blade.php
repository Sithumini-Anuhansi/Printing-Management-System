@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <header class="mb-4">
        <h1 class="fw-bold">Production Manager Dashboard</h1>
        <p class="lead text-muted">Monitor production, manage orders and products efficiently.</p>
        <hr>
    </header>

    {{-- Operational Statistics --}}
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Productions</h5>
                    <p class="card-text fs-3">128</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Pending Orders</h5>
                    <p class="card-text fs-3">24</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Products in Stock</h5>
                    <p class="card-text fs-3">512</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-info mb-3">
                <div class="card-body">
                    <h5 class="card-title">Design Files Pending</h5>
                    <p class="card-text fs-3">7</p>
                </div>
            </div>
        </div>
    </div>

    {{-- CRUD Tabs for Orders and Products --}}
    <ul class="nav nav-pills mb-4" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="orders-tab" data-bs-toggle="pill" data-bs-target="#orders" type="button" role="tab" aria-controls="orders" aria-selected="true">
                <i class="fas fa-shopping-cart me-2"></i>Orders
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="products-tab" data-bs-toggle="pill" data-bs-target="#products" type="button" role="tab" aria-controls="products" aria-selected="false">
                <i class="fas fa-tag me-2"></i>Products
            </button>
        </li>
    </ul>

    <div class="tab-content">
        <!-- Orders Tab -->
        <div class="tab-pane fade show active" id="orders" role="tabpanel" aria-labelledby="orders-tab">
            <div class="row">
                <!-- Order Form -->
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
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
                                    <label for="orderAmount" class="form-label">Amount</label>
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

                <!-- Orders Table -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5><i class="fas fa-list me-2"></i>Orders List</h5>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover">
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
                                    <!-- Orders data loaded by JS -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Tab -->
        <div class="tab-pane fade" id="products" role="tabpanel" aria-labelledby="products-tab">
            <div class="row">
                <!-- Product Form -->
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header bg-success text-white">
                            <h5><i class="fas fa-edit me-2"></i>Product Form</h5>
                        </div>
                        <div class="card-body">
                            <form id="productForm">
                                <input type="hidden" id="productId">
                                <div class="mb-3">
                                    <label for="productName" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="productName" required>
                                </div>
                                <div class="mb-3">
                                    <label for="productType" class="form-label">Product Type</label>
                                    <input type="text" class="form-control" id="productType" required>
                                </div>
                                <div class="mb-3">
                                    <label for="productPrice" class="form-label">Price</label>
                                    <input type="number" step="0.01" class="form-control" id="productPrice" required>
                                </div>
                                <div class="mb-3">
                                    <label for="productSize" class="form-label">Size</label>
                                    <input type="text" class="form-control" id="productSize" required>
                                </div>
                                <div class="mb-3">
                                    <label for="productDescription" class="form-label">Description</label>
                                    <textarea class="form-control" id="productDescription" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-success w-100">
                                    <i class="fas fa-save me-2"></i>Save Product
                                </button>
                                <button type="button" class="btn btn-secondary w-100 mt-2" onclick="clearProductForm()">
                                    <i class="fas fa-times me-2"></i>Clear
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Products Table -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <h5><i class="fas fa-list me-2"></i>Products List</h5>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>Size</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="productsTableBody">
                                    <!-- Products data loaded by JS -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- Include Bootstrap JS + FontAwesome --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>

<script>
    // Dummy data arrays
    let orders = [
        {id: 101, type: 'Business Cards', date: '2025-06-10', quantity: 1000, amount: 250.00, dueDate: '2025-06-20', status: 'Pending'},
        {id: 102, type: 'Banners', date: '2025-06-15', quantity: 150, amount: 500.00, dueDate: '2025-06-25', status: 'In Progress'}
    ];

    let products = [
        {id: 1, name: 'Standard Business Card', type: 'Business Cards', price: 0.25, size: '3.5x2 inch', description: 'High quality standard business cards'},
        {id: 2, name: 'Premium Banner', type: 'Banners', price: 20.00, size: '24x36 inch', description: 'Durable outdoor banner'}
    ];

    // --- ORDER FUNCTIONS ---
    function loadOrders() {
        const tbody = document.getElementById('ordersTableBody');
        tbody.innerHTML = '';
        orders.forEach(order => {
            const statusClass = order.status === 'Completed' ? 'bg-success' : 'bg-warning';
            tbody.innerHTML += `
                <tr>
                    <td>${order.id}</td>
                    <td>${order.type}</td>
                    <td>${order.date}</td>
                    <td>${order.quantity}</td>
                    <td>Rs.${order.amount.toFixed(2)}</td>
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
        if (!order) return;
        document.getElementById('orderId').value = order.id;
        document.getElementById('orderType').value = order.type;
        document.getElementById('orderDate').value = order.date;
        document.getElementById('orderQuantity').value = order.quantity;
        document.getElementById('orderAmount').value = order.amount;
        document.getElementById('orderDueDate').value = order.dueDate;
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
        const newOrder = {
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
            if (index !== -1) orders[index] = newOrder;
        } else {
            orders.push(newOrder);
        }
        loadOrders();
        clearOrderForm();
        alert('Order saved successfully!');
    });


    // --- PRODUCT FUNCTIONS ---
    function loadProducts() {
        const tbody = document.getElementById('productsTableBody');
        tbody.innerHTML = '';
        products.forEach(product => {
            tbody.innerHTML += `
                <tr>
                    <td>${product.id}</td>
                    <td>${product.name}</td>
                    <td>${product.type}</td>
                    <td>Rs.${product.price.toFixed(2)}</td>
                    <td>${product.size}</td>
                    <td>${product.description || '-'}</td>
                    <td>
                        <button class="btn btn-sm btn-warning" onclick="editProduct(${product.id})"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger ms-1" onclick="deleteProduct(${product.id})"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            `;
        });
    }

    function clearProductForm() {
        document.getElementById('productForm').reset();
        document.getElementById('productId').value = '';
    }

    function editProduct(id) {
        const product = products.find(p => p.id === id);
        if (!product) return;
        document.getElementById('productId').value = product.id;
        document.getElementById('productName').value = product.name;
        document.getElementById('productType').value = product.type;
        document.getElementById('productPrice').value = product.price;
        document.getElementById('productSize').value = product.size;
        document.getElementById('productDescription').value = product.description || '';
    }

    function deleteProduct(id) {
        if (confirm('Are you sure you want to delete this product?')) {
            products = products.filter(p => p.id !== id);
            loadProducts();
            alert('Product deleted successfully!');
        }
    }

    document.getElementById('productForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const id = document.getElementById('productId').value;
        const newProduct = {
            id: id ? parseInt(id) : Date.now(),
            name: document.getElementById('productName').value,
            type: document.getElementById('productType').value,
            price: parseFloat(document.getElementById('productPrice').value),
            size: document.getElementById('productSize').value,
            description: document.getElementById('productDescription').value
        };

        if (id) {
            const index = products.findIndex(p => p.id === parseInt(id));
            if (index !== -1) products[index] = newProduct;
        } else {
            products.push(newProduct);
        }
        loadProducts();
        clearProductForm();
        alert('Product saved successfully!');
    });

    // Initialize forms and tables on page load
    document.addEventListener('DOMContentLoaded', () => {
        loadOrders();
        loadProducts();
        clearOrderForm();
        clearProductForm();
    });
</script>
@endsection
