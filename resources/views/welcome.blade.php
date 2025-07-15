<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel + Bootstrap</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>

    <!-- Optional Font -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body style="font-family: 'Nunito', sans-serif;">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Laravel</a>
            <div class="d-flex">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary me-2">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-outline-secondary">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container py-5">
        <h1 class="text-center text-primary mb-5">Welcome to Laravel + Bootstrap</h1>

        <div class="row g-4">
            <!-- Documentation -->
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title">📘 Laravel Documentation</h5>
                        <p class="card-text">
                            Laravel has excellent documentation covering all aspects of the framework. Whether you're new or experienced, it's worth reading.
                        </p>
                        <a href="https://laravel.com/docs" class="btn btn-primary" target="_blank">Read Docs</a>
                    </div>
                </div>
            </div>

            <!-- Laracasts -->
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title">🎓 Laracasts</h5>
                        <p class="card-text">
                            Thousands of videos on Laravel, PHP, and JavaScript to help you learn faster and become a better developer.
                        </p>
                        <a href="https://laracasts.com" class="btn btn-success" target="_blank">Watch Tutorials</a>
                    </div>
                </div>
            </div>

            <!-- Laravel News -->
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title">📰 Laravel News</h5>
                        <p class="card-text">
                            A community-driven portal and newsletter with all the latest news, tutorials, and package releases from the Laravel ecosystem.
                        </p>
                        <a href="https://laravel-news.com/" class="btn btn-info" target="_blank">Read News</a>
                    </div>
                </div>
            </div>

            <!-- Laravel Ecosystem -->
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title">🌐 Vibrant Ecosystem</h5>
                        <p class="card-text">
                            Laravel's tools like Forge, Vapor, Nova, and Envoyer, paired with Cashier, Dusk, Echo, Horizon, and more help you build powerful apps.
                        </p>
                        <a href="https://laravel.com" class="btn btn-warning" target="_blank">Explore Ecosystem</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="mt-5 text-center text-muted">
            <p class="mb-1">Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
            <p>
                <a href="https://laravel.bigcartel.com" class="text-decoration-none">🛒 Shop</a> |
                <a href="https://github.com/sponsors/taylorotwell" class="text-decoration-none">❤️ Sponsor</a>
            </p>
        </footer>
    </div>

</body>
</html>
