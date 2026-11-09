<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    /**
     * Show the registration form.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle registration submission.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Name'     => ['required', 'string', 'max:50'],
            'Email'    => ['required', 'email', 'max:100', 'unique:users,Email'],
            'Age'      => ['required', 'integer', 'min:1', 'max:120'],
            'Address'  => ['required', 'string', 'max:100'],
            'Password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'Name'      => $request->Name,
            'Email'     => $request->Email,
            // Public self-registration must not grant privileged roles.
            'Role'      => 'Sales Officer',
            'Age'       => $request->Age,
            'Address'   => $request->Address,
            'Password'  => Hash::make($request->Password),
            'ProfileID' => null, // To be assigned later
        ]);

        event(new Registered($user));

        // Do NOT auto-login; redirect to login page instead
        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }
}
