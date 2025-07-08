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
        Schema::create('bid_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bid_id')->constrained('bids')->onDelete('cascade');
            $table->enum('type', ['individual', 'business']);
            // Common fields
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            // Company specific fields
            $table->string('company_name')->nullable();
            $table->string('company_registration_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bid_registrations');
    }
};
