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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('userId')->notNullable();
            $table->string('name')->notNullable();
            $table->enum('class',['tkj','mm','otkp','akl','other'])->notNullable();
            $table->string('admin')->notNullable();
            $table->integer('oldBalance')->notNullable();
            $table->enum('action',['tarik','setor'])->notNullable();
            $table->integer('amount')->notNullable();
            $table->integer('NewBalance')->notNullable();
            $table->timestamps();
            
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
