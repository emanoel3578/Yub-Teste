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
    protected $fillable=[
        'dono',
        'nome',
        'marca',
        'quantidade'
    ];


    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'flight_id';
}
