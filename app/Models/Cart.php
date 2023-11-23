<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['menu_id', 'nama', 'harga', 'quantity'];
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
    use HasFactory;
}
