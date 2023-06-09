<?php

namespace App\Repositories;

use App\Models\PacienteEnderecos;

class PacienteEnderecoRepositorie{

    private $model;


    public function __construct(PacienteEnderecos $model)
    {
        $this->model = $model;
    }

    public function saveEndereco($endereco, $objPaciente)
    {
        return $objPaciente->endereco()->create($endereco);
    }


    // public function getPacientes()
    // {
    //     return $this->model->all();
    // }

    // public function getPacienteById($id)
    // {
    //     return $this->model->find($id);
    // }

    // public function savePaciente($paciente)
    // {
    //     return $this->model->create([
    //         'nome' => $paciente['nome'],
    //         'nome_mae' => $paciente['nome_mae'],
    //         'nome_pai' => $paciente['nome_pai'],
    //         'cpf' => $paciente['cpf'],
    //         'cns' => $paciente['cns'],
    //         'data_nascimento' => $paciente['data_nascimento']
    //     ]);
    // }

    // public function updatePaciente($paciente, $id)
    // {
    //     return $this->model->where('id', $id)->update([
    //         'nome' => $paciente['nome'],
    //         'nome_mae' => $paciente['nome_mae'],
    //         'nome_pai' => $paciente['nome_pai'],
    //         'cpf' => $paciente['cpf'],
    //         'cns' => $paciente['cns'],
    //         'data_nascimento' => $paciente['data_nascimento']
    //     ]);

    // }

    // public function deletePaciente($id)
    // {
    //     return $this->model->find($id)->delete();
    // }

}