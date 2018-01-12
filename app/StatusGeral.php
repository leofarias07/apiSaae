<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusGeral extends Model
{
   	protected $table = 'status_gerals';
	public $primarykey = 'idstatus'
    protected $fillable = [
        'descricao',
    ];

    protected $guarded = [];
}
