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
        Schema::create('motorcycles', function (Blueprint $table) {
       
    
            $table->id();
            $table->text('qr_code_image');
            $table->string('uuid');
            $table->string('user_id');
            $table->string('make_type');
            $table->string('chasis');
            $table->string('motor_no');
            $table->string('plate_no');
            $table->string('color');
            $table->string('ORCR_no');
            $table->string('LTO_File_no');
            $table->string('registered_owner');
            $table->string('address');
            $table->text('violations');
            $table->string('date');
            $table->string('status');
            $table->string('municipality');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motorcycles');
    }
};
