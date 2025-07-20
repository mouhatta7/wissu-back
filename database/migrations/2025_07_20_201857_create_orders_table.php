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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            // Précise bien 'userss' si c'est le nom de ta table
            $table->foreignId('user_id')->constrained('userss')->onDelete('cascade');
            $table->foreignId('dress_id')->constrained()->onDelete('cascade');
            $table->string('couleur_choisie');
            $table->string('taille_choisie');
            $table->decimal('prix_total', 8, 2);
            $table->enum('status', ['en_attente', 'confirmee', 'expediee'])->default('en_attente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
