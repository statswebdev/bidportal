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
        Schema::create('bids', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('description_mv');
            $table->string('iulaan_number')->unique();
            $table->string('phone');
            $table->datetime('submission_date');
            $table->string('status')->default('active'); 
            $table->string('iulaan_pdf');
            $table->string('info_sheet_pdf');
            $table->string('spec_sheet_pdf')->nullable();
            $table->string('supporting_docs')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bids');
    }
};
