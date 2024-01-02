<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'total_price',
        'payment_method',
        'status',
        'snap_token',
        'tenant_id',
        'user_id',
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
