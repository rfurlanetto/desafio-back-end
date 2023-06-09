<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePacienteEndereco extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente_enderecos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pacientes_id')->constrained('pacientes');
            $table->string('logradouro');
            $table->string('numero');
            $table->string('bairro');
            $table->string('cep');
            $table->string('cidade');
            $table->string('uf');
            $table->string('complemento');
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
        Schema::dropIfExists('paciente_endereco');
    }
}
