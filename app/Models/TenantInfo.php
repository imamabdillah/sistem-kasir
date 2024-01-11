<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'deskripsi_umum',
        'rekomendasi_menu_a',
        'rekomendasi_menu_b',
        'foto_tenant',
        'foto_menu',
        'tenant_id',
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
