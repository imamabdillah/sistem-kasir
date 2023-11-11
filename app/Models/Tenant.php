<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $table = 'tenants';

    protected $fillable = [
        'nama',
        'deskripsi',
        'foto',
    ];

    // Hubungan dengan menu
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    use HasFactory;
    // Tambahkan metode atau kriteria khusus di sini sesuai kebutuhan Anda
}
