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
        Schema::create("pedidos", function (Blueprint $table) {
            $table->bigIncrements("id")->primary();
            $table->string("nome_cliente");
            $table->integer("quant_pedido");        
            $table->float("preco_total");        
            $table->unsignedBigInteger("fk_produtos");        
            $table->foreign('fk_produtos')->references('id')->on('produtos')->onDelete('cascade')->onUpdate("cascade");
       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists("pedidos");
    }
};
