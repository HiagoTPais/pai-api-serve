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
        Schema::dropIfExists('pagamentos_funerario');
        Schema::dropIfExists('cuidados_funerario');
        Schema::dropIfExists('translado');
        Schema::dropIfExists('produtos_funerario');
        Schema::dropIfExists('servico_funerario');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
