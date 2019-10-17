<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cartorio extends Model
{
    protected $table = 'cartorios';
    protected $primaryKey = 'id';

    protected $fillable = [
                            'nome',
                            'razao',
                            'documento',
                            'endereco',
                            'bairro',
                            'cidade',
                            'uf',
                            'telefone',
                            'email',
                            'tabeliao',
                            'ativo',
                            'user_id',
                          ];

}
