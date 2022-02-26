<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    protected $fillable = ['id', 'image', 'nome', 'descricao', 'preco'];
    protected $table = 'produtos';
}
