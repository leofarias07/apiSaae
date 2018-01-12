<?php


namespace App\Http\Controllers;
use App\Vazamento;
use Illuminate\Support\Facades\Redirect;
use App\Http\Resquests\VazamentoFormRequest;
use DB;


use Illuminate\Http\Request;


class VazamentoController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){
    	if ($request) {
    		$query=trim($request->get('searchText'));
    		$vazamentos = DB::table('vazamento')
    		->where('endereco','LIKE', '%'.$query.'%')
    		->where('condicao','=','1')
    		->orderBy('idvazamento','desc')
    		->paginate(7);
    		return view('vazamento.index',[
    			"vazamentos"=>$vazamentos,"searchText"=>$query
    		]);
    	}
    }
      public function create(){
    	return view("vazamento.create");
    }
      public function store(VazamentoFormRequest $request){
    	$vazamento = new Vazamento;
    	$vazamento->endereco=$request->get('endereco');
    	$vazamento->descricao=$request->get('descricao');
    	$vazamento->contato=$request->get('contato');
    	$vazamento->condicao=1;
    	$vazamento ->save();
    	return Redirect::to('/vazamentos');
	}

    public function show($id){
    	return view("vazamentos.show",["vazamento"=>Vazamento::FinfORFail($id)]);
    }
    public function edit(){
    	return view("vazamentos.edit",["vazamento"=>Vazamento::FinfORFail($id)]);
    }
    public function update(VazamentoFormRequest $request, $id){
    	$vazamento = Vazamento::findOrFail($id);
    	$vazamento->endereco=$request->get('endereco');
    	$vazamento->endereco=$request->get('descricao');
    	$vazamento->endereco=$request->get('contato');
    	$vazamento->update();
    	return Redirect::to('/vazamentos');

    }
    public function destroy($id){
    	$vazamento = Vazamento::findOrFail($id);
    	$vazamento->condicao='0';
    	$vazamento->update();
    	return Redirect::to('/vazamentos');
    }
}
