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
        Schema::create('hasil_aprioris', function (Blueprint $table) {
            $table->id();

            $table->text('antecedent');

            $table->text('consequent');

            $table->decimal('support', 8, 2);

            $table->decimal('confidence', 8, 2);

            $table->decimal('lift', 8, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_aprioris');
    }
};
