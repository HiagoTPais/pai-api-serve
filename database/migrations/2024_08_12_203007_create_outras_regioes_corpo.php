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
        Schema::create('outras_regioes_corpo', function (Blueprint $table) {
            $table->id();
            $table->uuid('tanatorio_id')->nullable(false);
            $table->string('local_corpo')->nullable(true);
            $table->boolean('presencade_secrecao')->nullable(true);
            $table->boolean('deterioracao')->nullable(true);
            $table->boolean('dilaceracao')->nullable(true);
            $table->boolean('amputado')->nullable(true);
            $table->boolean('inchaco')->nullable(true);
            $table->boolean('tecido_mole')->nullable(true);
            $table->boolean('odor')->nullable(true);
            $table->string('imagem')->nullable(true);
            $table->timestamps();
        });

        Schema::table('outras_regioes_corpo', function (Blueprint $table) {
            $table->foreign('tanatorio_id')->references('id')->on('tanatorio')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outras_regioes_corpo');
    }
};
