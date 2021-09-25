<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'd/m/Y';

    const CREATED_AT = 'criado_em';
    const UPDATED_AT = 'atualizado_em';
}
