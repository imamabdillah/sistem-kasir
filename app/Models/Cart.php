<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['menu_id', 'quantity', 'total_price'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
