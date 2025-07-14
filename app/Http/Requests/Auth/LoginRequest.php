<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Allow all users to attempt login
    }

    public function rules(): array
    {
        return [
            'Email' => ['required', 'string', 'Email'],
            'Password' => ['required', 'string'],
            'Role' => ['required', 'string', 'in:Owner/Admin,Manager,Finance Officer,Sales Officer,Production Manager,Inventory Manager,Logistics Officer'],
        ];
    }

    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        // Find user by email and role (case sensitive, adjust if needed)
        $user = User::where('Email', $this->input('Email'))
            ->where('Role', $this->input('Role'))
            ->first();

        // Check if user exists and password matches
        if (! $user || ! Hash::check($this->input('Password'), $user->Password)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'Email' => trans('auth.failed'),
            ]);
        }

        // Login the user
        Auth::login($user, $this->boolean('remember'));

        RateLimiter::clear($this->throttleKey());
    }

    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'Email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->input('Email')) . '|' . $this->ip());
    }
}
