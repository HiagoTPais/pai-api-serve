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
        Schema::create('termo_rescisao', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('beneficiario_id')->nullable(false);
            $table->string('motivo_cancelamento');
            $table->string('observacao_cancelamento');
            $table->timestamps();
        });

        Schema::table('termo_rescisao', function (Blueprint $table) {
            $table->foreign('beneficiario_id')->references('id')->on('beneficiarios')->onDelete('cascade');
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
