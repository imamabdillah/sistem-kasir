<?php

namespace App\Models;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'menu_id',
        'nama',
        'harga',
        'quantity',
        'note',
        'tenant_id',
        'user_id',
    ];

    // Definisikan relasi dengan order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Definisikan relasi dengan menu jika diperlukan
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
