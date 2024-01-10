<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = ['category', 'name', 'kontak', 'tenant_id'];
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
