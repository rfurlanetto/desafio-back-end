<?php
namespace App\Services;

use App\Repositories\PacienteEnderecoRepositorie;

class PacienteEnderecoService{

    private $pacienteEnderecoRepositorie;

    public function __construct(PacienteEnderecoRepositorie $pacienteEnderecoRepositorie)
    {
        $this->pacienteEnderecoRepositorie = $pacienteEnderecoRepositorie;
    }

    public function saveEndereco($endereco, $objPaciente)
    {
        return $this->pacienteEnderecoRepositorie->saveEndereco($endereco, $objPaciente);
    }
}