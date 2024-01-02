<?php

namespace App\Models;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    protected $fillable = [
        'id',
        'total_price',
        'tenant_id',
        'user_id',

    ];
    // Relasi dengan OrderItem

    // Definisikan relasi dengan order_items jika diperlukan
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
