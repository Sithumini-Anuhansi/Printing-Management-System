<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    /**
     * Show the registration form with auto-generated UserID.
     */
    public function create()
    {
        // Generate next UserID
        $lastUserId = User::max('UserID');
        $generatedUserId = $lastUserId ? $lastUserId + 1 : 1;

        return view('auth.register', compact('generatedUserId'));
    }

    /**
     * Handle registration submission.
     */
    public function store(Request $request)
    {
        $request->validate([
            'UserID'   => ['required', 'integer', 'unique:Users,UserID'],
            'Name'     => ['required', 'string', 'max:50'],
            'Email'    => ['required', 'email', 'max:100', 'unique:Users,Email'],
            'Role'     => ['required', 'string', Rule::in([
                'Owner/Admin', 'Manager',
                'Finance Officer', 'Sales Officer',
                'Production Manager', 'Inventory Manager', 'Logistics Officer'
            ])],
            'Age'      => ['required', 'integer', 'min:1', 'max:120'],
            'Address'  => ['required', 'string', 'max:100'],
            'Password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'UserID'    => $request->UserID,
            'Name'      => $request->Name,
            'Email'     => $request->Email,
            'Role'      => $request->Role,
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
