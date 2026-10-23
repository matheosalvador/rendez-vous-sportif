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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('organization_id');
            $table->unsignedBigInteger('sport_id');
            $table->unsignedBigInteger('created_by');
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
            $table->foreign('sport_id')->references('id')->on('sports')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();//nullable pour  la description puisse etre vide
            $table->dateTime('starts_at');
            $table->integer('duration_minutes');
            $table->string('city');
            $table->string('venue'); // Le lieu exact
            // Règles spécifiques
            $table->integer('capacity'); 
            $table->string('public_token')->unique();
            $table->string('status')->default('draft'); // "draft" (brouillon) ou "published" (publié)
            // Dates de création et modification
            $table->timestamps();
            // index demandés 
            $table->index(['status', 'starts_at']);
            $table->index(['sport_id', 'starts_at']);
            $table->index(['city', 'starts_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
