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
        Schema::create('periods', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->integer('start_year');
            $table->integer('end_year')->nullable();
            $table->text('description');
            $table->timestamps();
        });

        DB::table('periods')->insert([
    [
        'name' => 'Préhistoire',
        'start_year' => -3000000,
        'end_year' => -3000,
        'description' => "Période précédant l'invention de l'écriture, marquée par l’apparition des premiers hominidés, le développement des outils rudimentaires et l’organisation des premières sociétés humaines.",
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Antiquité',
        'start_year' => -3000,
        'end_year' => 476,
        'description' => "Ère des premières civilisations organisées (Égypte, Mésopotamie, Grèce, Rome), caractérisée par l’écriture, la naissance des cités-États, les grandes religions antiques et les empires.",
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Moyen Âge',
        'start_year' => 476,
        'end_year' => 1492,
        'description' => "Période allant de la chute de l’Empire romain d’Occident à la découverte de l’Amérique ; marquée par la féodalité, les croisades, les royaumes médiévaux et le développement du christianisme en Europe.",
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Temps Modernes',
        'start_year' => 1492,
        'end_year' => 1789,
        'description' => "Époque de transformations intellectuelles, artistiques et politiques : Renaissance, Réforme protestante, découverte du monde, monarchies absolues et prémices des révolutions.",
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Époque contemporaine',
        'start_year' => 1789,
        'end_year' => null,
        'description' => "Période ouverte par la Révolution française, incluant les révolutions industrielles, les grands conflits mondiaux, la décolonisation, la mondialisation et les mutations sociopolitiques du monde moderne.",
        'created_at' => now(),
        'updated_at' => now(),
    ],
]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periods');
    }
};
