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
            $table->enum('grado_academico', [
                'preparatoria', 'licenciatura', 'maestria', 'doctorado'
            ])->nullable()->after('carac_principal');

            $table->string('codigo_postal', 10)->nullable()->after('estado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['grado_academico', 'codigo_postal']);
        });
    }
};
