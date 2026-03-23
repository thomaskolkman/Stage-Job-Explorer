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
        Schema::create('vacature_interesses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vacature_id')->constrained('vacatures')->cascadeOnDelete(); //constraint is gewoon een foreign key maken maar dan sneller
            $table->foreignId('interesse_id')->constrained('interesses')->cascadeOnDelete();
            $table->string('name');
            $table->string('type')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacature_interesses');
    }
};
