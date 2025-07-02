<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustompackagesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('custompackages', function (Blueprint $table) {
            $table->id(); // bigint + auto increment + primary
            $table->string('name');
            $table->string('price');
            $table->string('category');
            $table->text('description')->nullable();
            $table->timestamps(); // created_at + updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custompackages');
    }
}
