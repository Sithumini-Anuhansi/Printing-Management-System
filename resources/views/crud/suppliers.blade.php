<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Supplier Management | Printing Management System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .form-card {
            background-color: #e6f7ff !important;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2>Supplier Management</h2>

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

    <!-- Supplier Form -->
    <div class="card form-card mb-4">
        <div class="card-header">
            <h5>Add / Edit Supplier</h5>
        </div>
        <div class="card-body">
            <form id="supplierForm" method="POST" action="{{ route('suppliers.store') }}">
                @csrf
                <input type="hidden" id="SupplierID" name="SupplierID" />

                <div class="mb-3">
                    <label for="SupplierName" class="form-label">Supplier Name</label>
                    <input type="text" class="form-control" id="SupplierName" name="SupplierName" maxlength="50" required />
                </div>

                <div class="mb-3">
                    <label for="SupplierType" class="form-label">Supplier Type</label>
                    <select class="form-select" id="SupplierType" name="SupplierType" required>
                        <option value="">Select type</option>
                        <option value="foreign">Foreign</option>
                        <option value="local">Local</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="PhoneNumber" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber" maxlength="11" required />
                </div>

                <div class="mb-3">
                    <label for="Email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="Email" name="Email" maxlength="100" required />
                </div>

                <div class="mb-3">
                    <label for="Address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="Address" name="Address" maxlength="100" required />
                </div>

                <div class="mb-3">
                    <label for="WarehouseLocation" class="form-label">Warehouse Location</label>
                    <input type="text" class="form-control" id="WarehouseLocation" name="WarehouseLocation" maxlength="100" required />
                </div>

                <div class="mb-3">
                    <label for="AvailableMaterial" class="form-label">Available Material</label>
                    <input type="text" class="form-control" id="AvailableMaterial" name="AvailableMaterial" maxlength="255" />
                </div>

                <button type="submit" class="btn btn-primary" id="submitBtn">Save Supplier</button>
                <button type="button" class="btn btn-secondary" id="clearBtn">Clear</button>
            </form>
        </div>
    </div>

    <!-- Supplier Table -->
    <div class="card">
        <div class="card-header">
            <h5>Suppliers List</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped" id="suppliersTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Warehouse Location</th>
                        <th>Available Material</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suppliers as $supplier)
                        <tr>
                            <td>{{ $supplier->SupplierID }}</td>
                            <td>{{ $supplier->SupplierName }}</td>
                            <td>{{ ucfirst($supplier->SupplierType) }}</td>
                            <td>{{ $supplier->PhoneNumber }}</td>
                            <td>{{ $supplier->Email }}</td>
                            <td>{{ $supplier->Address }}</td>
                            <td>{{ $supplier->WarehouseLocation }}</td>
                            <td>{{ $supplier->AvailableMaterial }}</td>
                            <td>
                                <button 
                                    class="btn btn-sm btn-warning edit-btn" 
                                    data-id="{{ $supplier->SupplierID }}"
                                    data-name="{{ $supplier->SupplierName }}"
                                    data-type="{{ $supplier->SupplierType }}"
                                    data-phone="{{ $supplier->PhoneNumber }}"
                                    data-email="{{ $supplier->Email }}"
                                    data-address="{{ $supplier->Address }}"
                                    data-warehouse="{{ $supplier->WarehouseLocation }}"
                                    data-material="{{ $supplier->AvailableMaterial }}"
                                >
                                    Edit
                                </button>
                                <form method="POST" action="{{ route('suppliers.destroy', $supplier->SupplierID) }}" style="display:inline-block" onsubmit="return confirm('Delete this supplier?');">
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
    const form = document.getElementById('supplierForm');
    const submitBtn = document.getElementById('submitBtn');
    const clearBtn = document.getElementById('clearBtn');

    // Clear form
    clearBtn.addEventListener('click', () => {
        form.reset();
        form.action = "{{ route('suppliers.store') }}";
        submitBtn.textContent = 'Save Supplier';
        document.getElementById('SupplierID').value = '';

        // Remove _method input if exists
        const methodInput = form.querySelector('input[name="_method"]');
        if (methodInput) {
            methodInput.remove();
        }
    });

    // Edit buttons
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');
            form.action = `/suppliers/${id}`;
            submitBtn.textContent = 'Update Supplier';

            document.getElementById('SupplierID').value = id;
            document.getElementById('SupplierName').value = button.getAttribute('data-name');
            document.getElementById('SupplierType').value = button.getAttribute('data-type');
            document.getElementById('PhoneNumber').value = button.getAttribute('data-phone');
            document.getElementById('Email').value = button.getAttribute('data-email');
            document.getElementById('Address').value = button.getAttribute('data-address');
            document.getElementById('WarehouseLocation').value = button.getAttribute('data-warehouse');
            document.getElementById('AvailableMaterial').value = button.getAttribute('data-material');

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
