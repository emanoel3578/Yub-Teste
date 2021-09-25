<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cadastro;
use App\Models\User;

class Estoque extends Model
{
    use HasFactory;

    /**
     * Protected fillabes to avoid mass assigment
     * 
     * @return string[]
     */
    protected $fillable=[
        'tipo',
        'quantidade',
        'produto_id',
        'dono',
        'nomedaempresa',

    ];

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */

    const CREATED_AT = 'criado_em';
    const UPDATED_AT = 'atualizado_em';

}
