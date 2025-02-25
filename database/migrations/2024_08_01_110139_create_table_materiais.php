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
        Schema::create('materiais', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tanatorio_id')->nullable(true);
            $table->uuid('servico_funerario_id')->nullable(true);
            $table->integer('quantidade')->nullable(true);
            $table->decimal('valor')->nullable(true);
            $table->string('produto')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiais');
    }
};
