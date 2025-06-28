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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('class_id')->constrained()->onDelete('cascade')->nullable();
            $table->foreignId('academic_year_id')->constrained()->onDelete('cascade')->nullable();
            $table->string('father_name')->nullable();
            $table->string('admission_date')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('dob')->nullable();
      
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['class_id']);
            $table->dropForeign(['academic_year_id']);
            $table->dropColumn(['academic_year_id','class_id','father_name','mother_name',
            'mobile_no','dob']);

        });
    }
};
