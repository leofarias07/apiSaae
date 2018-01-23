<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LigacaoIrregular extends Model
{
   	protected $table = 'ligacao_irregularsEsconder';
	public $primarykey = 'id';
    protected $fillable = [
        'endereco', 'descricao','condicao',
    ];

    protected $guarded = [];
}
