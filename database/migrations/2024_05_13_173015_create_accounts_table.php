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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('city');
            $table->string('email')->unique();
            $table->string('secondary_email')->unique();
            $table->string('country');
            $table->string('phone');
            $table->string('secondary_phone');
            $table->string('website');
            $table->text('address');
            $table->boolean('active');
            $table->string('tax_id_1');
            $table->string('tax_id_2');
            $table->string('tax_id_3');
            $table->string('tax_id_4');
            $table->string('tax_id_5');
            $table->string('tax_id_6');
            $table->string('segment')->nullable();
            $table->foreignId('organisationId')->nullable()->constrained('organisations')->cascadeOnDelete();
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
        Schema::dropIfExists('accounts');
    }
};
