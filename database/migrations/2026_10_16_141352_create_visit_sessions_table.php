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
        Schema::create('visit_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prisoner_id')->constrained('prisoners')->restrictOnDelete();
            $table->date('visit_date');
            $table->time('check_in_at')->nullable();
            $table->text('note')->nullable();
            $table->index([
                'prisoner_id',
                'visit_date',
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visit_sessions');
    }
};
