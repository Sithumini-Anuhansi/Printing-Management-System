<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryDashboardController extends Controller
{
    public function index()
    {
        return view('inventory.dashboard');
    }
}

