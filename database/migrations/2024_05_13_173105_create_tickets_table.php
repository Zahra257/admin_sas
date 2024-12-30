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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->string('type');
            $table->string('ip_address');
            $table->string('subject');
            $table->string('priority');
            $table->string('status');
            $table->date('closing_date');
            $table->date('opening_date');
            $table->foreignId('organisationId')->nullable()->constrained('organisations')->cascadeOnDelete();
            $table->foreignId('accontId')->nullable()->constrained('accounts')->cascadeOnDelete();
            $table->foreignId('serviceId')->nullable()->constrained('services')->cascadeOnDelete();
            $table->foreignId('assigned_to')->nullable()->constrained('users')->cascadeOnDelete();
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
        Schema::dropIfExists('tickets');
    }
};
