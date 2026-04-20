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
        Schema::table('users', function (Blueprint $table) {
            $table->string('apellido')->nullable();
            $table->integer('edad')->nullable();
            $table->bigInteger('celular')->nullable();
            $table->string('tipo')->nullable();
            $table->string('sector')->nullable();
            $table->string('procedencia')->nullable();
            $table->string('pais')->nullable();
            $table->string('estado')->nullable();
            $table->string('referencia')->nullable();
            $table->string('carac_principal')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
