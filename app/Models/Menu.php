<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';

    protected $fillable = [
        'nama',
        'harga',
        'deskripsi',
        'foto_produk',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    use HasFactory;
}
