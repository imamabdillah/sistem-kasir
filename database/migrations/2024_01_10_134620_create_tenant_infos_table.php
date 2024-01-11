<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tenant_infos', function (Blueprint $table) {
            $table->id();
            $table->text('deskripsi_umum')->nullable();
            $table->string('rekomendasi_menu_a')->nullable();
            $table->string('rekomendasi_menu_b')->nullable();
            $table->string('foto_tenant')->nullable();
            $table->string('foto_menu')->nullable();
            $table->foreignId('tenant_id')->constrained('tenants')->onDelete('cascade');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenant_infos');
    }
};
