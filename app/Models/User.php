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
    protected $table = 'users';

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

    /**
     * Dashboard route name for each role.
     */
    public const ROLE_DASHBOARDS = [
        'Owner/Admin'        => 'dashboards.owner',
        'Manager'            => 'dashboards.manager',
        'Finance Officer'    => 'dashboards.finance',
        'Sales Officer'      => 'dashboards.sales',
        'Production Manager' => 'dashboards.production',
        'Inventory Manager'  => 'dashboards.inventory',
        'Logistics Officer'  => 'dashboards.logistics',
    ];

    /**
     * Route name of this user's dashboard, or null for an unknown role.
     */
    public function dashboardRoute(): ?string
    {
        return self::ROLE_DASHBOARDS[$this->Role] ?? null;
    }
}
