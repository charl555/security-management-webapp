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
        Schema::create('resident_photos', function (Blueprint $table) {
            $table->id('resident_photo_id');
            $table->foreignId('resident_information_id')
            ->constrained('resident_informations', 'resident_information_id')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->string("resident_photo");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resident_photos');
    }
};
