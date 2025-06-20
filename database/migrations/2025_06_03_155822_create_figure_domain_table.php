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
        Schema::create('domain_figure', function (Blueprint $table) {
            $table->id();
            $table->foreignId('figure_id')
                ->constrained('figures')
                ->onDelete('cascade');
            $table->foreignId('domain_id')
                ->constrained('domains')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('figure__domain');
    }
};
