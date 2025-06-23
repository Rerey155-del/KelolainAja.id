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
        Schema::create('content_calenders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('status');
            $table->string('category');
            $table->text('attachments')->nullable();
            $table->string('upload_for')->nullable();
            $table->string('reference')->nullable();
            $table->string('format');
            $table->string('assignee');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_calenders');
    }
};
