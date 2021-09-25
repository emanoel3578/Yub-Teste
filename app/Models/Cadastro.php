<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{
    use HasFactory;

    /**
     * Protected Fillabes para envitar ataque de mass assigment
     * 
     * @var string[]
     */
    protected $primaryKey = 'id';
    protected $table = 'cadastros';
    protected $fillable=[
        'dono',
        'nome',
        'marca',
        'quantidade'
    ];


}
