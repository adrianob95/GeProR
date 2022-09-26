<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisicao extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente',
        'sus',
        'documento',
        'endereco',
        'bairro',
        'cidade',
        'cep',
        'datanascimento',
        'documento',
        'indicacao',
        'procedimento',
        'contato',
        'contato2',
        'user_id',
        'datarecebido',
        'obs',
    ];

    public function situacao()
    {
        return $this->hasMany(Situacao::class);
    }

    public function latestSituacao()
    {
        return $this->hasOne(Situacao::class)->latestOfMany();
    }
}
