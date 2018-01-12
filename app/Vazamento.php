<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vazamento extends Model
{
	protected $table = 'vazamento';
	public $primarykey = 'idvazamento'
    protected $fillable = [
        'endereco', 'descricao', 'contato','condicao',
    ];

    protected $guarded[];

}
