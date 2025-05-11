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
        Schema::create('figures', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('birth_name');
            $table->date('birth_date');
            $table->string('birth_place');
            $table->string('death_date')->nullable();
            $table->string('death_place')->nullable();
            $table->string('nationality');
            $table->text('short_description');
            $table->enum('gender', ['male','female']);
            $table->string('portrait_url')->nullable();
            $table->string('biography')->nullable();
            $table->boolean('isVerified')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('figures');
    }
};
