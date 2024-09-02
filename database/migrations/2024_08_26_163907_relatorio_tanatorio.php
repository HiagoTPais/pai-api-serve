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
        Schema::create('relatorio_tanatorio', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tanatorio_id')->nullable(false);
            $table->string('arquivo');
            $table->timestamps();
        });

        Schema::table('relatorio_tanatorio', function (Blueprint $table) {
            $table->foreign('tanatorio_id')->references('id')->on('tanatorio')->onDelete('cascade');
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
