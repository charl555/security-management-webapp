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
        Schema::create("resident_address", function (Blueprint $table) {
            $table->id("resident_address_id");
            $table->foreignId('resident_information_id')
            ->constrained('resident_informations', 'resident_information_id')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

            $table->string("home_address");
            $table->string("street_name");
            $table->integer("phase_number");
            $table->timestamps();

    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
