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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('members_id')->constrained('members');
            // $table->foreignId('loan_types_id')->constrained('loan_types');
            // $table->foreignId('amortizations_id')->constrained('amortizations');
            // $table->foreignId('adjustments_id')->constrained('adjustments');
            // $table->foreignId('loan_categories_id')->constrained('loan_categories');

            $table->decimal('principal_amount', 20, 2);
            $table->decimal('interest', 20, 2);
            $table->integer('term_years');
            $table->integer('is_visible');
            $table->integer('is_approved');
            // campus_id_index not added 
            // units_id_index not added 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
