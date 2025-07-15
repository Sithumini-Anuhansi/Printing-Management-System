<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogisticsDashboardController extends Controller
{
    public function index()
    {
        return view('logistics.dashboard');
    }
}

