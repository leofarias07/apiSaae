<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use apiSaae\LigacaoIrregular;
use Illuminate\Support\Facedes\Redirect;
use apiSaae\Http\Resquests\ligacaoirregularFormRequest;
use DB;

class LigacaoIrregularController extends Controller
{
	 public function __construct(){

    }
    
    public function index(Request $request){
    
       /* if($request){
            $query=trim($request->get('searchText'));
            $ligacao_irregular=DB::table('ligacao_irregulars')
            ->where('endereco', 'LIKE', '%'.$query.'%')
            ->where('condicao', '=', '1')
            ->orderBy('id', 'desc')
            ->paginate(7);
            return view('ligacaoirregular.index', [
                "ligacao_irregular"=>$ligacao_irregular, "searchText"=>$query
                ]);
        }
     //return ligacao_irregular::all();*/
        if($request){
        $query=trim($request->get('searchText'));
        $ligacao_irregular = DB::table('ligacao_irregulars')
            ->where('endereco', 'LIKE', '%'.$query.'%')
            ->join('status_gerals', 'status_gerals.id', '=', 'ligacao_irregulars.condicao')
            ->select('ligacao_irregulars.id', 'ligacao_irregulars.endereco', 'ligacao_irregulars.descricao','ligacao_irregulars.created_at','status_gerals.statusgeral')
            ->orderBy('id', 'desc')
            ->paginate(15);
          
            return view('ligacaoirregular.index', [
                "ligacao_irregular"=>$ligacao_irregular, "searchText"=>$query
                ]);
        }

      
            
    }
}
