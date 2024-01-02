<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresensiKeluar extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tenant_id',
        'checkout_date',
        'checkout_time',
        'checkout_note',
        'latitude',
        'longitude',
        'photo',
    ];

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
