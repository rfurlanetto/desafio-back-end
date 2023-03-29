<?php
namespace App\Services;

use App\Repositories\PacienteRepositorie;
use App\Support\Cns;
use App\Support\Cpf;

class PacienteService{

    private $pacienteRepositorie;
    private $validateCns;
    private $cpf;

    public function __construct(PacienteRepositorie $pacienteRepositorie, Cns $validateCns, Cpf $cpf)
    {
        $this->pacienteRepositorie = $pacienteRepositorie;
        $this->validateCns = $validateCns;
        $this->cpf = $cpf;
    }

    public function getPacientes()
    {
        return $this->pacienteRepositorie->getPacientes();
    }

    public function getPacienteById($id)
    {
        return $this->pacienteRepositorie->getPacienteById($id);
    }

    public function savePaciente($paciente)
    {
        return $this->pacienteRepositorie->savePaciente($paciente);
    }

    public function updatePaciente($paciente, $id)
    {
        return $this->pacienteRepositorie->updatePaciente($paciente, $id);
    }

    public function deletePaciente($id)
    {
        return $this->pacienteRepositorie->deletePaciente($id);
    }

    public function validateSavePaciente($paciente)
    {
        $dataNascimento = explode('-', $paciente['data_nascimento']);

        $validateDate = checkdate($dataNascimento[1], $dataNascimento[2], $dataNascimento[0]);
        $validateCns = $this->validateCns->validate($paciente['cns']);
        $validateCpf = $this->cpf->validate($paciente['cpf']);
        $validateString = (!empty($paciente['nome']) || !empty($paciente['nome_mae']) || !empty($paciente['nome_pai'])) ? true : false;

        if(!$validateDate || !$validateCns || !$validateCpf || !$validateString){

            $arrayReturn = [
                'mensagem_retorno' => 'Um ou mais campos não estão no padrão da API',
                'data_nascimento' => $validateDate,
                'cns' => $validateCns,
                'cpf' => $validateCpf,
                'nome' => !empty($paciente['nome']),
                'nome_pai' => !empty($paciente['nome_pai']),
                'nome_mae' => !empty($paciente['nome_mae']),
                'return' => false
            ];

            return $arrayReturn;
        }
        return true;

    }

}