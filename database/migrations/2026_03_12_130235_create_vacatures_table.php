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
        Schema::create('vacatures', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->unsignedTinyInteger('spots_available'); //unsigned integer betekend dat het geen negatieve waarde kan hebben, tiny integer betekend dat het een klein getal is (0-255)
            $table->date('start_date');
            $table->date('end_date')->nullable(); //nullable betekend dat het veld leeg mag zijn, in dit geval betekent het dat er geen einddatum hoeft te zijn voor een vacature
            $table->string('location')->nullable();
            $table->foreignId('bedrijf_id')->constrained('bedrijven')->cascadeOnDelete(); //foreignId maakt een veld aan dat een id van een andere tabel bevat, constrained zorgt ervoor dat het veld verwijst naar de id van de bedrijven tabel, cascadeOnDelete zorgt ervoor dat als een bedrijf wordt verwijderd, alle vacatures die bij dat bedrijf horen ook worden verwijderd
            $table->enum('status', ['open', 'gesloten', 'vervuld'])->default('open'); // enum zorgt ervoor dat de status alleen een van deze drie waarden kan zijn, default open betekent dat als er geen status wordt opgegeven, deze automatisch op open wordt gezet
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacatures');
    }
};
