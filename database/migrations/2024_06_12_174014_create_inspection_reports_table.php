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
        Schema::create('inspection_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id');
            $table->foreignId('inspector_id');
            $table->json('upload_images')->nullable();
            $table->json('upload_videos')->nullable();
            $table->json('inspected_vehicle_info')->nullable();
            $table->longText('summary')->nullable();
            $table->json('inspected_exterior')->nullable();
            $table->json('inspected_interior')->nullable();
            $table->json('inspected_mechanical')->nullable();
            $table->json('inspected_road_test')->nullable();
            $table->json('inspected_tire')->nullable();
            $table->json('edit_images')->nullable();
            $table->json('inspected_grade')->nullable();
            $table->json('inspected_review')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspection_reports');
    }
};
