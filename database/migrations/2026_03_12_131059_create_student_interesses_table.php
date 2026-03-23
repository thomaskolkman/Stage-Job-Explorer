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
        Schema::create('student_interesses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->constraint('students')->cascadeOnDelete(); //constraint is gewoon een foreign key maken maar dan sneller
            $table->unsignedBigInteger('interesse_id')->constraint('interesses')->cascadeOnDelete();
            $table->enum('status', ['interested', 'applied', 'rejected', 'accepted'])->default('interested');
            $table->date('applied_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_interesses');
    }
};
