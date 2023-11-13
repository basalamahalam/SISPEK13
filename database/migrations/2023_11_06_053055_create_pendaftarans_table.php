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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('pendaftar');
            $table->string('email');
            $table->string('nama');
            $table->string('kelas');
            $table->string('gender');
            $table->string('contact');
            $table->string('image');
            $table->text('knowledge');
            $table->text('reason');
            $table->timestamp('submit_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
