<?php

namespace App\Models;

use App\Models\Tenant;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    protected $table = 'menus';

    protected $fillable = [
        'nama',
        'harga',
        'deskripsi',
        'foto_produk',
        'category_id',
        'tenant_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
    public function carts()
    {
        return $this->belongsTo(Cart::class);
    }


    use HasFactory;
}
