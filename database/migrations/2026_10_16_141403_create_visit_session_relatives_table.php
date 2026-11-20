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
        Schema::create('visit_session_relatives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('visit_session_id')
                ->constrained('visit_sessions')
                ->cascadeOnDelete();

            $table->foreignId('prisoner_relative_id')
                ->constrained('prisoner_relatives')
                ->restrictOnDelete();

            $table->unique([
                'visit_session_id',
                'prisoner_relative_id',
            ]);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visit_session_relatives');
    }
};
