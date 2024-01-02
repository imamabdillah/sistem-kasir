<?php

// presensi_keluar migration
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresensiKeluarTable extends Migration
{
    public function up(): void
    {
        Schema::create('presensi_keluars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tenant_id');
            $table->date('checkout_date');
            $table->time('checkout_time');
            $table->text('checkout_note')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->string('photo')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('tenant_id')->references('id')->on('tenants');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('presensi_keluar');
    }
}
