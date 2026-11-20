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
        Schema::create('prisoners', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->date('date')->nullable();
            $table->unsignedTinyInteger('gender')->default(0);
            $table->string('citizen_number')->nullable()->unique();
            $table->string('address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->text('crime');
            $table->string('sentence');
            $table->date('admitted_at');
            $table->unsignedTinyInteger('status')->default(1);
            $table->softDeletes();
            $table->index('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prisoners');
    }
};
