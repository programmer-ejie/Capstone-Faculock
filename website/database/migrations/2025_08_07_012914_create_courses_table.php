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
       
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('course_code');
            $table->string('course_number');
            $table->integer('units');
            $table->string('faculty_teacher');
            $table->string('subject_name');
            $table->integer('size');
            $table->string('schedule');
            $table->string('department');
            $table->string('college');
            $table->timestamp('date_created')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
