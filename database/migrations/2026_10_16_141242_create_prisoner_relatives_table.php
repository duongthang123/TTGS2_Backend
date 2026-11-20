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
        Schema::create('prisoner_relatives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prisoner_id')->constrained('prisoners')->restrictOnDelete();
            $table->foreignId('relative_id')->constrained('relatives')->restrictOnDelete();
            $table->string('relationship', 50);
            $table->unique([
                'prisoner_id',
                'relative_id'
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prisoner_relatives');
    }
};
