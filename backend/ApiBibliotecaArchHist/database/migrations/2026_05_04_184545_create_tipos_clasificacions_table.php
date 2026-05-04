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
        Schema::create('TiposClasificacion', function (Blueprint $table) {
            $table->integer('IdTipoClaficacion')->autoIncrement();
            $table->string('NombreTipo',30);
            $table->string('SiglasTipo',3);
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
        Schema::dropIfExists('TiposClasificacion');
    }
};
