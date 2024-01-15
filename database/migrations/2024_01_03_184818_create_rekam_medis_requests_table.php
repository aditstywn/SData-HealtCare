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
        Schema::create('rekam_medis_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rekam_medis_id');
            $table->foreignId('user_id');
            $table->tinyInteger('is_request')->default(0);
            $table->date('request_date')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekam_medis_requests');
    }
};
