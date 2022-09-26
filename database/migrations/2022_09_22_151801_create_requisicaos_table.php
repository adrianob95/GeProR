<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisicaos', function (Blueprint $table) {
            $table->id();
            $table->string('paciente');
            $table->string('sus')->nullable();
            $table->string('documento')->nullable();
            $table->string('endereco');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('cep');
            $table->date('datanascimento')->nullable();
            $table->string('indicacao')->nullable();
            $table->string('procedimento');
            $table->string('contato');
            $table->date('datarecebido');
            $table->string('contato2')->nullable();
            $table->string('obs')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requisicaos');
    }
};
