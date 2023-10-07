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
        Schema::create('phones', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('phone');
            $table->foreignId('student_id');
            $table->foreign('student_id')->references('id')->on('students');

            $table->timestamps();
        });
    }





    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phones');
    }
};
