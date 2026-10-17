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
        Schema::create('elections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by')->constrained('users')->restrictOnDelete();
            $table->string('title');
            $table->string('description')->nullable();
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->enum('status', [
                'draft', 'scheduled', 'ongoing', 'completed', 'cancelled'
            ])->default('draft');
            $table->dateTime('result_published_at')->nullable();
            $table->timestamps();

            $table->index(['status', 'start_at', 'end_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elections');
    }
};
