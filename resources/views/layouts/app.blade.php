<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Chamath Enterprises') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        footer {
            background-color: #004085;
            color: #ffffff;
            padding: 2rem 1rem;
            text-align: center;
            width: 100%;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1);
        }

        .footer_main {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; /* center items horizontally */
            align-items: center;     /* center items vertically if multiple rows */
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer_tag {
            flex: 1 1 220px;
            max-width: 250px;
            text-align: center;
        }

        .footer_tag h2 {
            font-size: 1.2rem;
            margin-bottom: 1rem;
            color: #ffc107;
        }

        .footer_tag p, .footer_tag a {
            font-size: 0.95rem;
            color: #ffffff;
            text-decoration: none;
            margin: 0.3rem 0;
            display: block;
        }

        .footer_tag a:hover {
            color: #17a2b8;
        }

        .footer_tag i {
            margin-right: 0.5rem;
        }

        .footer_tag:last-child a {
            display: inline-block;
            margin: 0 0.5rem;
            font-size: 1.2rem;
        }

        .end {
            margin-top: 2rem;
            font-size: 0.9rem;
            color: #ced4da;
            text-align: center;
        }
    </style>

</head>

<body class="d-flex flex-column min-vh-100">

<main class="container py-4 flex-grow-1">
    @yield('content')
</main>

<footer role="contentinfo">
    <div class="footer_main">

        <div class="footer_tag">
            <h2>Location</h2>
            <a href="https://www.google.com/maps?q=Galle+Road,+Colombo+03+(Kollupitiya),+Sri+Lanka" target="_blank">
            <p><i class="fa-solid fa-location-dot"></i><p></a>
            <p>No. 451/4/B, Royal Garden,</p>
            <p>Gotabaya Mawatha,</p>
            <p>Wanawasala, Kelaniya</p>
        </div>

        <div class="footer_tag">
            <h2>Follows</h2>
            <a href="https://www.facebook.com" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="https://www.twitter.com" title="Twitter"><i class="fa-brands fa-twitter"></i></a>
            <a href="https://www.instagram.com" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://www.linkedin.com" title="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
        </div>
        
        <div class="footer_tag">
            <h2>Contact</h2>
            <p><a href="tel:+94112985319">+94 112985319</a></p>
            <p><a href="tel:+94775307504">+94 775307504</a></p>
            <p><a href="mailto:chamathenterprises2019@gmail.com">chamathenterprises2019@gmail.com</a></p>
            <p><a href="mailto:gdackumara@gmail.com">gdackumara@gmail.com</a></p>
        </div>
    </div>

    <p class="end">&copy; 2025 Chamath Enterprises. All Rights Reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
