<?php

namespace App\Repositories;

use App\Models\Pacientes;

class PacienteRepositorie{

    private $model;

    protected $cpf = null;
    protected $nome = null;


    public function __construct(Pacientes $model)
    {
        $this->model = $model;
    }

    public function getPacientes()
    {
        return $this->model->all();
    }

    public function getPacienteById($id)
    {
        return $this->model->find($id);
    }

    public function getPacienteByCpfOrNome($cpf = '', $nome = '')
    {
        $this->cpf = $cpf;
        $this->nome = $nome;
        return $this->model->where(function($query){
            if($this->cpf){
                $query->where('cpf', $this->cpf);
            }

            if($this-> nome){
                $query->where('nome', 'like', '%' . $this->nome . '%');
            }
        })->first();
    }

    public function savePaciente($paciente)
    {
        return $this->model->create([
            'nome' => $paciente['nome'],
            'nome_mae' => $paciente['nome_mae'],
            'nome_pai' => $paciente['nome_pai'],
            'cpf' => $paciente['cpf'],
            'cns' => $paciente['cns'],
            'data_nascimento' => $paciente['data_nascimento']
        ]);
    }

    public function updatePaciente($paciente, $id)
    {
        return $this->model->where('id', $id)->update([
            'nome' => $paciente['nome'],
            'nome_mae' => $paciente['nome_mae'],
            'nome_pai' => $paciente['nome_pai'],
            'cpf' => $paciente['cpf'],
            'cns' => $paciente['cns'],
            'data_nascimento' => $paciente['data_nascimento']
        ]);

    }

    public function deletePaciente($id)
    {
        return $this->model->find($id)->delete();
    }

    public function deletePacienteEndereco($id)
    {
        $this->model->find($id)->endereco->delete();
        return $this->model->find($id)->delete();
    }

}