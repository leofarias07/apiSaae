<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use apiSaae\FaltaDeAgua;
use Illuminate\Support\Facedes\Redirect;
use apiSaae\Http\Resquests\faltadeaguaFormRequest;
use DB;

class FaltaDeAguaController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){
    	if ($request) {
    		$query=trim($request->get('searchText'));
    		$faltadeaguas = DB::table('falta_de_aguas')
    		->where('endereco','LIKE', '%'.$query.'%')
    		->where('condicao','=','1')
    		->orderBy('idfalta_de_agua','desc')
    		->paginate(7);
    		return view('faltadeagua.index',[
    			"faltadeaguas"=>$faltadeaguas,"searchText"=>$query
    		]);
    	}
    }
      public function create(){
    	return view("faltadeagua.create");
    }
      public function store(faltadeaguaFormRequest $request){
    	$faltadeagua = new falta_de_aguas;
    	$faltadeagua->endereco=$request->get('endereco');
    	$faltadeagua->endereco=$request->get('descricao');
    	$faltadeagua->endereco=$request->get('contato');
    	$faltadeagua->condicao=1;
    	$faltadeagua ->save();
    	return Redirect::to('/faltadeagua');
	}

    public function show($id){
    	return view("faltadeagua.show",["faltadeagua"=>falta_de_aguas::FinfORFail($id)]);
    }
    public function edit(){
    	return view("faltadeagua.edit",["faltadeagua"=>falta_de_aguas::FinfORFail($id)]);
    }
    public function update(faltadeaguaFormRequest $request, $id){
    	$faltadeagua = falta_de_agua::findOrFail($id);
    	$faltadeagua->endereco=$request->get('endereco');
    	$faltadeagua->endereco=$request->get('descricao');
    	$faltadeagua->endereco=$request->get('contato');
    	$faltadeagua->update();
    	return Redirect::to('/faltadeagua');

    }
    public function destroy($id){
    	$faltadeagua = falta_de_aguas::findOrFail($id);
    	$faltadeagua->condicao='0';
    	$faltadeagua->update();
    	return Redirect::to('/faltadeagua');
    }
}
