<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Welcome | Chamath Enterprises</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        body {
            background-color: #f8f9fa;
        }
        .welcome-container {
            max-width: 500px;
            padding: 40px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            text-align: center;
        }
        .logo {
            max-height: 100px;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="welcome-container">
            <img src="{{ asset('images/logo.jpg') }}" alt="Chamath Enterprises Logo" class="logo" />
            <h1 class="mb-3">Welcome to Chamath Enterprises</h1>
            <p class="text-muted mb-4">Please login or register to continue.</p>

            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-4">Login</a>
                <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg px-4">Register</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
