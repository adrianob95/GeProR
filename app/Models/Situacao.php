<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Situacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'situacao',
        'descricao',
        'data',
        'requisicao_id',
        'user_id',
    ];

    public function usuario()
    {
        return $this->hasOne(User::class);
    }

}
