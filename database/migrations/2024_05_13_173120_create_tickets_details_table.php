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
        Schema::create('tickets_details', function (Blueprint $table) {
            $table->id();
            $table->text('message');
            $table->foreignId('ticketId')->nullable()->constrained('tickets')->cascadeOnDelete();
            $table->foreignId('organisationId')->nullable()->constrained('organisations')->cascadeOnDelete();
            $table->foreignId('accontId')->nullable()->constrained('accounts')->cascadeOnDelete();
            $table->foreignId('created_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets_details');
    }
};
