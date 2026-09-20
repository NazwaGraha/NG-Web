<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'role', 'avatar'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'avatar',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Check if user is Super User.
     */
    public function isSuperUser(): bool
    {
        return $this->role === 'super_user';
    }

    /**
     * Check if user is Supervisor.
     */
    public function isSupervisor(): bool
    {
        return $this->role === 'supervisor';
    }

    /**
     * Check if user is Admin.
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin' || empty($this->role);
    }

    /**
     * Check if user has permission to delete data.
     * Super User & Supervisor have full privileges including deletion.
     * Admin can do everything except delete data.
     */
    public function canDelete(): bool
    {
        return in_array($this->role, ['super_user', 'supervisor'], true);
    }

    /**
     * Human-readable label for user role.
     */
    public function getRoleLabelAttribute(): string
    {
        return match ($this->role) {
            'super_user' => 'Super User',
            'supervisor' => 'Supervisor',
            default => 'Admin',
        };
    }
}
