<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser

{

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    const ROLE_ADMIN = "ADMIN";
    const ROLE_SECURITY = "SECURITY";
    const ROLE_USER = "USER";

    const DEFAULT_ROLE = self::ROLE_USER;

    
    const ROLES = [
        self::ROLE_ADMIN =>'Admin',
        self::ROLE_SECURITY=>'Security',
        self::ROLE_USER=>'User',
        ];

    
        public function canAccessPanel(Panel $panel): bool
        {
            return $this->isAdmin() || $this->isSecurity();
        }

        public function isAdmin(){
            return $this->role === self::ROLE_ADMIN;
        }

        public function isSecurity(){
            return $this->role === self::ROLE_SECURITY;
        }


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
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
}
