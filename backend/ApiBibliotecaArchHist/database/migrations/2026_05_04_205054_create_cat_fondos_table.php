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
        Schema::create('CatFondos', function (Blueprint $table) {
            $table->integer('IdFondo')->autoIncrement();
            $table->string('NombreFondo',50);
            $table->string('SiglasFondo',3);
            $table->integer('FechaInicial')->nullable();
            $table->integer('FechaFinal')->nullable();
            $table->boolean('EstaActivo')->default(true);
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('CatFondos');
    }
};
