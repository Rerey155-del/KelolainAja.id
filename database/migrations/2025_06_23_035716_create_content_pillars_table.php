<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('content_pillars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('percentage');
            $table->string('color');
            $table->unsignedBigInteger('user_id')->nullable(); // Tambahkan kolom user_id
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('content_pillars');
    }
};