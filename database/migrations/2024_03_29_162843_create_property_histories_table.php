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
        Schema::create('property_histories', function (Blueprint $table) {
            $table->id();
            // $table->text('qr_code_image');
            $table->string('uuid');
            $table->string('user_id');
            $table->string('establishment');
            $table->string('address');
            $table->string('quantity');
            $table->string('item');
            $table->text('description');
            $table->string('seizing_officer');
            $table->string('witness');
            $table->string('date');
            $table->string('status');
            $table->string('municipality');
            $table->string('received');
            $table->text('receipt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_histories');
    }
};
