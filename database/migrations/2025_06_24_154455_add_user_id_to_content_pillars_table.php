<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('content_pillars', function (Blueprint $table) {
            if (!Schema::hasColumn('content_pillars', 'user_id')) {
                $table->unsignedBigInteger('user_id')->after('id')->nullable();
                $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            }
        });
    }

    public function down(): void
    {
        Schema::table('content_pillars', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};