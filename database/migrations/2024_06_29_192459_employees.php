<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PHPUnit\Framework\Constraint\Constraint;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->boolean('active');
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date');
        });

        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->boolean('active')->default(1);
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date');
        });

        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->boolean('active');
            $table->foreignId('department_id')->constrained();
            $table->foreignId('position_id')->constrained();
            $table->date('start_date');
            $table->date('end_date');
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
        Schema::dropIfExists('department');
        Schema::dropIfExists('position');
    }
};
