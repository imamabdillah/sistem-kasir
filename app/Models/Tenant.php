<?php

namespace App\Models;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    use HasFactory;
    // Tambahkan metode atau kriteria khusus di sini sesuai kebutuhan Anda
}
