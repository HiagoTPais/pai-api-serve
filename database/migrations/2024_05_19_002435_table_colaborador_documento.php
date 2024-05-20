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
        Schema::create('colaborador_documento', function (Blueprint $table) {
            $table->id();
            $table->uuid('contrato_id')->nullable(false);
            $table->string('arquivo');
            $table->timestamps();
        });

        Schema::table('colaborador_documento', function (Blueprint $table) {
            $table->foreign('contrato_id')->references('id')->on('contrato_colaborador')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
