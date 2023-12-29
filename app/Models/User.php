<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use  HasFactory;


    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'tenant_id',
        'is_active'
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
    public function presensi()
    {
        return $this->hasMany(Presensi::class);
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
