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
        Schema::create('plantas', function (Blueprint $table) {
            $table->id();
            $table-> string('nombre');
            $table-> string('descripcion');
            $table -> string('imagen');
            $table -> enum('temporada', ['springSummer', 'autumnWinter']);
            $table -> date('siembra'); //fecha aprox
            $table -> date('cosecha');
            $table -> enum('origen', ['local', 'extranjero']);
            $table -> enum('especie', ['cereales', 'leguminosas', 'oleaginosas', 'hortalizas', 'frutales', 'ornamentales', 'raicesTuberculos', 'medicinalesAromaticas', 'tropicales', 'pastos']);
            $table -> integer('temp_min');
            $table -> integer('temp_max');
            $table -> foreignId('terreno_id')->constrained('terrenos');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plantas');
    }
};
