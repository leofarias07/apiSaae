<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use apiSaae\LigacaoIrregular;
use Illuminate\Support\Facedes\Redirect;
use apiSaae\Http\Resquests\ligacaoirregularFormRequest;
use DB;

class HomeController extends Controller
{
    	 public function __construct(){

    }
    
    public function index(Request $request){
    
    
   $vazamento = DB::select('select count(idvazamento) as totalvaz, (select count(id) from ligacao_irregulars where condicao = 1) as totallig, (select count(idfalta_de_agua) from falta_de_aguas where condicao = 1) as totalfal, (select count(idvazamento) from vazamento where condicao = 2) as vazaberto from vazamento where condicao = ?', [1]);

        return view('home.index', ['vazamento' => $vazamento]);
      
 
            
    }
}
