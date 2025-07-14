<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    // Use the correct table name (case-sensitive)
    protected $table = 'Users';

    // Set custom primary key
    protected $primaryKey = 'UserID';

    // If UserID is auto-increment (true if auto), set to false if not
    public $incrementing = true;

    // Primary key type (important for Auth to work)
    protected $keyType = 'int';

    // Disable timestamps (no created_at, updated_at in table)
    public $timestamps = false;

    // Fields that can be mass assigned
    protected $fillable = [
        'UserID',
        'Name',
        'Email',
        'Password',
        'Role',
        'Age',
        'Address',
        'ProfileID',
    ];

    // Hide password and remember token when model is returned as JSON
    protected $hidden = [
        'Password',
        'remember_token',
    ];

    // Optional casting for fields
    protected $casts = [
        'Age' => 'integer',
    ];

    /**
     * Mutator: Automatically hash passwords
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['Password'] = Hash::needsRehash($value) ? Hash::make($value) : $value;
    }

    /**
     * Required for Laravel Auth system to find the password column
     */
    public function getAuthPassword()
    {
        return $this->Password;
    }

    /**
     * Override default "email" column if necessary (e.g., if your column is EmailAddress)
     */
    public function getEmailForPasswordReset()
    {
        return $this->Email;
    }
}
