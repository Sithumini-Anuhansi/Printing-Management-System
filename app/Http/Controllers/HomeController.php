<?php

// app/Http/Controllers/HomeController.php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Logged-in users skip the landing page and go to their own dashboard.
        $route = Auth::user()?->dashboardRoute();

        if ($route) {
            return redirect()->route($route);
        }

        return view('home');  // resources/views/home.blade.php
    }
}
