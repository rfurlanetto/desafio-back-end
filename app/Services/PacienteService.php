<?php
namespace App\Services;

use App\Repositories\PacienteRepositorie;
use App\Services\PacienteEnderecoService;
use App\Support\Cns;
use App\Support\Cpf;

class PacienteService{

    private $pacienteRepositorie;
    private $validateCns;
    private $cpf;
    private $pacienteEnderecoService;

    public function __construct(PacienteRepositorie $pacienteRepositorie, Cns $validateCns, Cpf $cpf, PacienteEnderecoService $pacienteEnderecoService)
    {
        $this->pacienteRepositorie = $pacienteRepositorie;
        $this->validateCns = $validateCns;
        $this->cpf = $cpf;
        $this->pacienteEnderecoService = $pacienteEnderecoService;
    }

    public function getPacientes()
    {
        return $this->pacienteRepositorie->getPacientes();
    }

    public function getPacienteById($id)
    {
        return $this->pacienteRepositorie->getPacienteById($id);
    }

    public function getPacienteByCpfOrNome($cpf = null, $nome = null)
    {
        return $this->pacienteRepositorie->getPacienteByCpfOrNome($cpf, $nome);
    }

    public function savePaciente($paciente)
    {

        $objPaciente = $this->pacienteRepositorie->savePaciente($paciente);
        $this->pacienteEnderecoService->saveEndereco($paciente['endereco'], $objPaciente);
        return $paciente;
    }

    public function updatePaciente($paciente, $id)
    {
        return $this->pacienteRepositorie->updatePaciente($paciente, $id);
    }

    public function deletePaciente($id)
    {
        return $this->pacienteRepositorie->deletePaciente($id);
    }

    public function deletePacienteEndereco($id)
    {
        return $this->pacienteRepositorie->deletePacienteEndereco($id);
    }

    public function validateSavePaciente($paciente)
    {
        $dataNascimento = explode('-', $paciente['data_nascimento']);

        $validateDate = checkdate($dataNascimento[1], $dataNascimento[2], $dataNascimento[0]);
        $validateCns = $this->validateCns->validate($paciente['cns']);
        $validateCpf = $this->cpf->validate($paciente['cpf']);
        $validateString = (!empty($paciente['nome']) || !empty($paciente['nome_mae']) || !empty($paciente['nome_pai'])) ? true : false;

        $endereco = $paciente['endereco'];

        $validateEndereco = (!empty($endereco['logradouro']) || !empty($endereco['numero']) ||
        !empty($endereco['bairro']) || !empty($endereco['cep']) || !empty($endereco['cidade']) || 
        !empty($endereco['uf']) || !empty($endereco['complemento'])) ? true : false;


        if(!$validateDate || !$validateCns || !$validateCpf || !$validateString || $validateEndereco){

            $arrayReturn = [
                'mensagem_retorno' => 'Um ou mais campos não estão no padrão da API',
                'data_nascimento' => $validateDate,
                'cns' => $validateCns,
                'cpf' => $validateCpf,
                'nome' => !empty($paciente['nome']),
                'nome_pai' => !empty($paciente['nome_pai']),
                'nome_mae' => !empty($paciente['nome_mae']),
                'endereco' => $validateEndereco,
                'return' => false
            ];

            return $arrayReturn;
        }
        return true;

    }

}