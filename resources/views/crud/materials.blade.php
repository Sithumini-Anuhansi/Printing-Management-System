<!-- Material Form Section -->
<div class="card mb-4">
    <div class="card-header">
        <h5>Material Management</h5>
    </div>
    <div class="card-body">

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form --}}
        <form id="materialForm" method="POST" action="{{ route('materials.store') }}">
            @csrf
            <input type="hidden" id="MaterialID" name="MaterialID">

            <div class="mb-3">
                <label for="MaterialName" class="form-label">Material Name</label>
                <input type="text" class="form-control" id="MaterialName" name="MaterialName" maxlength="100" required>
            </div>

            <div class="mb-3">
                <label for="Price" class="form-label">Price (Rs.)</label>
                <input type="number" step="0.01" class="form-control" id="Price" name="Price" required>
            </div>

            <div class="mb-3">
                <label for="Description" class="form-label">Description</label>
                <input type="text" class="form-control" id="Description" name="Description" maxlength="255">
            </div>

            <div class="mb-3">
                <label for="AvailableQuantity" class="form-label">Available Quantity</label>
                <input type="number" class="form-control" id="AvailableQuantity" name="AvailableQuantity" min="0" required>
            </div>

            <button type="submit" class="btn btn-primary" id="submitBtn">Save Material</button>
            <button type="button" class="btn btn-secondary" id="clearBtn">Clear</button>
        </form>
    </div>
</div>

<!-- Materials List Table -->
<div class="card">
    <div class="card-header">
        <h5>Materials List</h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped" id="materialsTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price (Rs.)</th>
                    <th>Description</th>
                    <th>Available Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($materials as $material)
                    <tr>
                        <td>{{ $material->MaterialID }}</td>
                        <td>{{ $material->MaterialName }}</td>
                        <td>{{ number_format($material->Price, 2) }}</td>
                        <td>{{ $material->Description }}</td>
                        <td>{{ $material->AvailableQuantity }}</td>
                        <td>
                            <button
                                type="button"
                                class="btn btn-sm btn-warning edit-btn"
                                data-id="{{ $material->MaterialID }}"
                                data-name="{{ $material->MaterialName }}"
                                data-price="{{ $material->Price }}"
                                data-description="{{ $material->Description }}"
                                data-quantity="{{ $material->AvailableQuantity }}"
                            >
                                Edit
                            </button>

                            <form
                                method="POST"
                                action="{{ route('materials.destroy', $material->MaterialID) }}"
                                style="display:inline-block"
                                onsubmit="return confirm('Delete this material?');"
                            >
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

<!-- Inline Script for Form Handling -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('materialForm');
        const submitBtn = document.getElementById('submitBtn');
        const clearBtn = document.getElementById('clearBtn');

        // Clear form
        clearBtn.addEventListener('click', () => {
            form.reset();
            form.action = "{{ route('materials.store') }}";
            submitBtn.textContent = 'Save Material';
            document.getElementById('MaterialID').value = '';

            const methodInput = form.querySelector('input[name="_method"]');
            if (methodInput) methodInput.remove();
        });

        // Handle edit button click
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', () => {
                const id = button.dataset.id;
                form.action = `/materials/${id}`;
                submitBtn.textContent = 'Update Material';

                document.getElementById('MaterialID').value = id;
                document.getElementById('MaterialName').value = button.dataset.name;
                document.getElementById('Price').value = button.dataset.price;
                document.getElementById('Description').value = button.dataset.description;
                document.getElementById('AvailableQuantity').value = button.dataset.quantity;

                // Add hidden PUT method input
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
    });
</script>
