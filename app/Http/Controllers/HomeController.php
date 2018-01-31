<?php

namespace App\Http\Controllers;
use apiSaae\LigacaoIrregular;
use Illuminate\Support\Facedes\Redirect;
use apiSaae\Http\Resquests\ligacaoirregularFormRequest;
use DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request){
    
    
   $vazamento = DB::select('select count(id) as totalvaz, (select count(id) from ligacao_irregulars where condicao = 1) as totallig, (select count(idfalta_de_agua) from falta_de_aguas where condicao = 1) as totalfal, (select count(id) from vazamento where condicao = 2) as vazaberto from vazamento where condicao = ?', [1]);
        return view('home.index', ['vazamento' => $vazamento]);
      
 
            
    }
}
