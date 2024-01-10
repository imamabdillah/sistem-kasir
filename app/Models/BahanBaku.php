<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 'jumlah', 'harga', 'foto', 'tenant_id',
    ];
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
