<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     * If the user is already authenticated, redirect to their respective dashboard.
     */
    public function create()
    {
        if (Auth::check()) {
            return $this->redirectToDashboard(Auth::user()->Role);
        }

        return view('auth.login');
    }

    /**
     * Handle the login request.
     */
    
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Redirect based on role
        $user = $request->user();

        switch ($user->Role) {
            case 'Owner/Admin':
                return redirect()->route('dashboards.owner');
            case 'Manager':
                return redirect()->route('dashboards.manager');
            case 'Finance Officer':
                return redirect()->route('dashboards.finance');
            case 'Sales Officer':
                return redirect()->route('dashboards.sales');
            case 'Production Manager':
                return redirect()->route('dashboards.production');
            case 'Inventory Manager':
                return redirect()->route('dashboards.inventory');
            case 'Logistics Officer':
                return redirect()->route('dashboards.logistics');
            default:
                return redirect('/');  // fallback
        }
    }


    /**
     * Log the user out and redirect to the login page.
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    /**
     * Role-based redirection method.
     */
    protected function redirectToDashboard(string $role)
    {
        switch ($role) {
            case 'Owner/Admin':
                return redirect()->route('dashboards.owner');
            case 'Manager':
                return redirect()->route('dashboards.manager');
            case 'Finance Officer':
                return redirect()->route('dashboards.finance');
            case 'Sales Officer':
                return redirect()->route('dashboards.sales');
            case 'Production Manager':
                return redirect()->route('dashboards.production');
            case 'Inventory Manager':
                return redirect()->route('dashboards.inventory');
            case 'Logistics Officer':
                return redirect()->route('dashboards.logistics');
            default:
                return redirect()->route('login')->withErrors('Invalid role.');
        }
    }
}
