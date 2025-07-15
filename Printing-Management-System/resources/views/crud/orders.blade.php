<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Order Management | Printing Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .form-card { background-color: #e6f7ff !important; }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2>Order Management</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Order Form -->
    <div class="card form-card mb-4">
        <div class="card-header"><h5>Add / Edit Order</h5></div>
        <div class="card-body">
            <form id="orderForm" method="POST" action="{{ route('order.store') }}">
                @csrf
                <input type="hidden" id="OrderID" name="OrderID" />

                <div class="mb-3">
                    <label for="OrderType" class="form-label">Order Type</label>
                    <input type="text" class="form-control" id="OrderType" name="OrderType" maxlength="20" required />
                </div>

                <div class="mb-3">
                    <label for="OrderDate" class="form-label">Order Date</label>
                    <input type="date" class="form-control" id="OrderDate" name="OrderDate" required />
                </div>

                <div class="mb-3">
                    <label for="Products" class="form-label">Products</label>
                    <input type="text" class="form-control" id="Products" name="Products" maxlength="255" required />
                </div>

                <div class="mb-3">
                    <label for="ProductQuantity" class="form-label">Product Quantity</label>
                    <input type="number" class="form-control" id="ProductQuantity" name="ProductQuantity" min="1" required />
                </div>

                <div class="mb-3">
                    <label for="Description" class="form-label">Description</label>
                    <textarea class="form-control" id="Description" name="Description" maxlength="255"></textarea>
                </div>

                <div class="mb-3">
                    <label for="OrderDueDate" class="form-label">Order Due Date</label>
                    <input type="date" class="form-control" id="OrderDueDate" name="OrderDueDate" required />
                </div>

                <div class="mb-3">
                    <label for="CustomerID" class="form-label">Customer</label>
                    <select class="form-select" id="CustomerID" name="CustomerID" required>
                        <option value="">Select Customer</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->CustomerID }}">{{ $customer->CustomerName ?? 'ID '.$customer->CustomerID }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary" id="submitBtn">Save Order</button>
                <button type="button" class="btn btn-secondary" id="clearBtn">Clear</button>
            </form>
        </div>
    </div>

    <!-- Orders List -->
    <div class="card">
        <div class="card-header"><h5>Orders List</h5></div>
        <div class="card-body">
            <table class="table table-bordered table-striped" id="ordersTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Order Date</th>
                        <th>Products</th>
                        <th>Quantity</th>
                        <th>Description</th>
                        <th>Due Date</th>
                        <th>Customer</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->OrderID }}</td>
                            <td>{{ $order->OrderType }}</td>
                            <td>{{ $order->OrderDate }}</td>
                            <td>{{ $order->Products }}</td>
                            <td>{{ $order->ProductQuantity }}</td>
                            <td>{{ $order->Description }}</td>
                            <td>{{ $order->OrderDueDate }}</td>
                            <td>{{ $order->customer->CustomerName ?? 'ID '.$order->CustomerID }}</td>
                            <td>
                                <button 
                                    class="btn btn-sm btn-warning edit-btn"
                                    data-id="{{ $order->OrderID }}"
                                    data-type="{{ $order->OrderType }}"
                                    data-orderdate="{{ $order->OrderDate }}"
                                    data-products="{{ $order->Products }}"
                                    data-productquantity="{{ $order->ProductQuantity }}"
                                    data-description="{{ $order->Description }}"
                                    data-orderduedate="{{ $order->OrderDueDate }}"
                                    data-customerid="{{ $order->CustomerID }}"
                                >Edit</button>

                                <form method="POST" action="{{ route('order.destroy', $order->OrderID) }}" style="display:inline-block" onsubmit="return confirm('Delete this order?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const form = document.getElementById('orderForm');
    const submitBtn = document.getElementById('submitBtn');
    const clearBtn = document.getElementById('clearBtn');

    clearBtn.addEventListener('click', () => {
        form.reset();
        form.action = "{{ route('order.store') }}";
        submitBtn.textContent = 'Save Order';
        document.getElementById('OrderID').value = '';
    });

    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');
            form.action = `/order/${id}`;
            submitBtn.textContent = 'Update Order';

            document.getElementById('OrderID').value = id;
            document.getElementById('OrderType').value = button.getAttribute('data-type');
            document.getElementById('OrderDate').value = button.getAttribute('data-orderdate');
            document.getElementById('Products').value = button.getAttribute('data-products');
            document.getElementById('ProductQuantity').value = button.getAttribute('data-productquantity');
            document.getElementById('Description').value = button.getAttribute('data-description');
            document.getElementById('OrderDueDate').value = button.getAttribute('data-orderduedate');
            document.getElementById('CustomerID').value = button.getAttribute('data-customerid');

            // Add hidden _method for PUT if missing
            let methodInput = form.querySelector('input[name="_method"]');
            if (!methodInput) {
                methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                form.appendChild(methodInput);
            }
            methodInput.value = 'PUT';
        });
    });
</script>
</body>
</html>
