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
        Schema::create('insurance_quote_with_type_quotes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('insurance_quote_id')->constrained('insurance_quotes');
            $table->foreignUuid('type_quote_id')->constrained('type_quotes');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurance_quote_with_type_quotes');
    }
};
