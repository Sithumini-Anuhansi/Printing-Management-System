<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - Printing Management System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-card {
            max-width: 450px;
            width: 100%;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-light">
<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="login-card">
        <h3 class="text-center mb-4">Login to Your Account</h3>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input
                    type="email"
                    name="Email"
                    id="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}"
                    required
                    autofocus
                >
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input
                    type="password"
                    name="Password"
                    id="password"
                    class="form-control @error('password') is-invalid @enderror"
                    required
                >
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Role Dropdown -->
            <div class="mb-3">
                <label for="Role" class="form-label">Select Role</label>
                <select
                    name="Role"
                    id="Role"
                    class="form-select @error('Role') is-invalid @enderror"
                    required
                >
                    <option value="" disabled selected>Select your role</option>
                    <option value="Owner/Admin" {{ old('Role') == 'Owner/Admin' ? 'selected' : '' }}>Owner/Admin</option>
                    <option value="Manager" {{ old('Role') == 'Manager' ? 'selected' : '' }}>Manager</option>
                    <option value="Finance Officer" {{ old('Role') == 'Finance Officer' ? 'selected' : '' }}>Finance Officer</option>
                    <option value="Sales Officer" {{ old('Role') == 'Sales Officer' ? 'selected' : '' }}>Sales Officer</option>
                    <option value="Production Manager" {{ old('Role') == 'Production Manager' ? 'selected' : '' }}>Production Manager</option>
                    <option value="Inventory Manager" {{ old('Role') == 'Inventory Manager' ? 'selected' : '' }}>Inventory Manager</option>
                    <option value="Logistics Officer" {{ old('Role') == 'Logistics Officer' ? 'selected' : '' }}>Logistics Officer</option>
                </select>
                @error('role')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="mb-3 form-check">
                <input
                    type="checkbox"
                    class="form-check-input"
                    id="remember"
                    name="remember"
                    {{ old('remember') ? 'checked' : '' }}
                >
                <label class="form-check-label" for="remember">Remember Me</label>
            </div>

            <!-- Submit -->
            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>

            <!-- Links -->
            <div class="text-center">
                <a href="{{ route('password.request') }}">Forgot Password?</a>
                <br />
                <span>Don't have an account?</span> <a href="{{ route('register') }}">Register here</a>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
