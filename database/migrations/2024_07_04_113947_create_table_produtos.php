<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Schema::create('produtos_funerario', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('servico_funerario_id')->nullable(false);
            $table->integer('quantidade')->nullable(true);
            $table->decimal('valor')->nullable(true);
            $table->string('produto_servico')->nullable(true);
            $table->timestamps();
        });

        Schema::table('produtos_funerario', function (Blueprint $table) {
            $table->foreign('servico_funerario_id')->references('id')->on('servico_funerario')->onDelete('cascade');
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_produtos');
    }
};
