<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pacientes extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id', 'nome', 'nome_mae', 'nome_pai', 'cpf', 'cns', 'data_nascimento'
    ];
}
