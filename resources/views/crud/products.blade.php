<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Product Management | Printing Management System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .form-card {
            background-color: #e6f7ff !important;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2>Product Management</h2>

    <!-- Success message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Product Form -->
    <div class="card form-card mb-4">
        <div class="card-header">
            <h5>Add / Edit Product</h5>
        </div>
        <div class="card-body">
            <form id="productForm" method="POST" action="{{ route('product.store') }}">
                @csrf
                <input type="hidden" id="ProductID" name="ProductID" />

                <div class="mb-3">
                    <label for="ProductType" class="form-label">Product Type</label>
                    <input type="text" class="form-control" id="ProductType" name="ProductType" maxlength="20" required />
                </div>

                <div class="mb-3">
                    <label for="Price" class="form-label">Price</label>
                    <input type="number" step="0.01" class="form-control" id="Price" name="Price" required />
                </div>

                <div class="mb-3">
                    <label for="Size" class="form-label">Size</label>
                    <input type="number" step="0.01" class="form-control" id="Size" name="Size" required />
                </div>

                <div class="mb-3">
                    <label for="Description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="Description" name="Description" maxlength="255" />
                </div>

                <button type="submit" class="btn btn-primary" id="submitBtn">Save Product</button>
                <button type="button" class="btn btn-secondary" id="clearBtn">Clear</button>
            </form>
        </div>
    </div>

    <!-- Products Table -->
    <div class="card">
        <div class="card-header">
            <h5>Products List</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped" id="productsTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Size</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->ProductID }}</td>
                            <td>{{ $product->ProductType }}</td>
                            <td>Rs. {{ number_format($product->Price, 2) }}</td>
                            <td>{{ $product->Size }}</td>
                            <td>{{ $product->Description }}</td>
                            <td>
                                <button
                                    class="btn btn-sm btn-warning edit-btn"
                                    data-id="{{ $product->ProductID }}"
                                    data-type="{{ $product->ProductType }}"
                                    data-price="{{ $product->Price }}"
                                    data-size="{{ $product->Size }}"
                                    data-description="{{ $product->Description }}"
                                >Edit</button>
                                <form method="POST" action="{{ route('product.destroy', $product->ProductID) }}" style="display:inline-block" onsubmit="return confirm('Delete this product?');">
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
    const form = document.getElementById('productForm');
    const submitBtn = document.getElementById('submitBtn');
    const clearBtn = document.getElementById('clearBtn');

    // Clear form
    clearBtn.addEventListener('click', () => {
        form.reset();
        form.action = "{{ route('product.store') }}";
        submitBtn.textContent = 'Save Product';
        document.getElementById('ProductID').value = '';
    });

    // Edit buttons
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');
            form.action = `/product/${id}`;
            submitBtn.textContent = 'Update Product';

            document.getElementById('ProductID').value = id;
            document.getElementById('ProductType').value = button.getAttribute('data-type');
            document.getElementById('Price').value = button.getAttribute('data-price');
            document.getElementById('Size').value = button.getAttribute('data-size');
            document.getElementById('Description').value = button.getAttribute('data-description');

            // Add hidden _method for PUT (update)
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
