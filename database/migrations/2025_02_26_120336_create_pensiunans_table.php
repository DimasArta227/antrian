<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pensiunans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->string('no_pensiunan');
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->string('no_telepon')->nullable();
            $table->date('tanggal_pensiun');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pensiunans');
    }
};
