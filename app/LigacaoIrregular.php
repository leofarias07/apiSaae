<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LigacaoIrregular extends Model
{
   	protected $table = 'ligacao_irregulars';
	public $primarykey = 'id';
    protected $fillable = [
        'endereco', 'descricao','condicao',
    ];

    protected $guarded = [];
}
