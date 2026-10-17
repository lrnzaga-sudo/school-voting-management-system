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
        Schema::create('ballot_selections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ballot_id')->constrained('ballots')->cascadeOnDelete();
            $table->foreignId('election_candidate_id')->constrained('election_candidates')->restrictOnDelete();
            $table->timestamps();

            $table->unique(['ballot_id', 'election_candidate_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ballot_selections');
    }
};
