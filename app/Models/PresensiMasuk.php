<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresensiMasuk extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'checkin_date',
        'checkin_time',
        'checkin_note',
        'latitude',
        'longitude',
        'photo',
    ];

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
