<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Register - Printing Management System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        body {
            background-color: #f8f9fa;
        }
        .register-card {
            max-width: 520px;
            width: 100%;
        }
    </style>
</head>
<body class="bg-light">

<div class="container py-5 d-flex justify-content-center align-items-center min-vh-100">
    <div class="card register-card shadow-sm p-4">
        <h2 class="text-center mb-4">Register</h2>

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

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="user_id" class="form-label">User ID</label>
                <input type="text" name="UserID" id="user_id"
                    class="form-control"
                    value="{{ old('UserID', $generatedUserId ?? '') }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label" for="name">Name</label>
                <input type="text" id="name" name="Name" class="form-control @error('name') is-invalid @enderror" 
                       value="{{ old('name') }}" required autofocus>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="email">Email address</label>
                <input type="email" id="email" name="Email" class="form-control @error('email') is-invalid @enderror" 
                       value="{{ old('email') }}" required>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="role">Role</label>
                <select id="role" name="Role" class="form-select @error('role') is-invalid @enderror" required>
                    <option value="" disabled {{ old('role') ? '' : 'selected' }}>Select your role</option>
                    <option value="Owner/Admin" {{ old('role') == 'Owner/Admin' ? 'selected' : '' }}>Owner/Admin</option>
                    <option value="Manager" {{ old('role') == 'Manager' ? 'selected' : '' }}>Manager</option>
                    <option value="Finance Officer" {{ old('role') == 'Finance Officer' ? 'selected' : '' }}>Finance Officer</option>
                    <option value="Sales Officer" {{ old('role') == 'Sales Officer' ? 'selected' : '' }}>Sales Officer</option>
                    <option value="Production Manager" {{ old('role') == 'Production Manager' ? 'selected' : '' }}>Production Manager</option>
                    <option value="Inventory Manager" {{ old('role') == 'Inventory Manager' ? 'selected' : '' }}>Inventory Manager</option>
                    <option value="Logistics Officer" {{ old('role') == 'Logistics Officer' ? 'selected' : '' }}>Logistics Officer</option>
                </select>
                @error('role')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="age">Age</label>
                <input type="number" id="age" name="Age" class="form-control @error('age') is-invalid @enderror" 
                       value="{{ old('age') }}" min="1" max="120" required>
                @error('age')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="address">Address</label>
                <textarea id="address" name="Address" class="form-control @error('address') is-invalid @enderror" 
                          rows="3" required>{{ old('address') }}</textarea>
                @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" name="Password" class="form-control @error('password') is-invalid @enderror" required>
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label" for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>

        <div class="mt-3 text-center">
            Already registered? <a href="{{ route('login') }}">Login here</a>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
