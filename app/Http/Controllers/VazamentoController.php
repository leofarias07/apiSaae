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
    
        /*if($request){
            $query=trim($request->get('searchText'));
            $vazamento=DB::table('vazamento')
            ->where('endereco', 'LIKE', '%'.$query.'%')
            ->where('condicao', '=', '1')
            ->orderBy('idvazamento', 'desc')
            ->paginate(7);
            return view('vazamento.index', [
                "vazamento"=>$vazamento, "searchText"=>$query
                ]);
        }
        //return Vazamento::all();*/
        if($request){
            $query=trim($request->get('searchText'));
        $vazamento = DB::table('vazamento')
            ->where('endereco', 'LIKE', '%'.$query.'%')
            ->join('status_gerals', 'status_gerals.id', '=', 'vazamento.condicao')
            ->select('vazamento.idvazamento', 'vazamento.endereco', 'vazamento.descricao', 'vazamento.contato','vazamento.created_at','status_gerals.statusgeral')
            ->orderBy('idvazamento', 'desc')
            ->paginate(15);
          
            return view('vazamento.index', [
                "vazamento"=>$vazamento, "searchText"=>$query
                ]);
        }
      
            
    }

        public function create(Request $request) {

   
        Vazamento::create($request->all());


//        $usuario = Usuario::first();
//        
//        $teste = $request->all();
//        $teste = $teste['perfis'][0];
//        $perfil = $usuario->perfils()->save($teste);
////// or
////        $book = $user->books()->create(['title' => 'A Game of Thrones'])

        return Vazamento::first();
    }
      public function store(Request $request){
    	/*$vazamento = new Vazamento;
    	$vazamento->endereco=$request->get('endereco');
    	$vazamento->descricao=$request->get('descricao');
    	$vazamento->contato=$request->get('contato');
    	$vazamento->condicao=1;
    	$vazamento ->save();
    	return Redirect::to('/vazamentos');*/
	}

    public function show($id){
    	//return view("vazamentos.show",["vazamento"=>Vazamento::FinfORFail($id)]);
    }
    public function edit(){
    	//return view("vazamentos.edit",["vazamento"=>Vazamento::FinfORFail($id)]);
    }
    public function update(){
    	/*$vazamento = Vazamento::findOrFail($id);
    	$vazamento->endereco=$request->get('endereco');
    	$vazamento->endereco=$request->get('descricao');
    	$vazamento->endereco=$request->get('contato');
    	$vazamento->update();
    	return Redirect::to('/vazamentos');*/

    }
    public function destroy($id){
    	/*$vazamento = Vazamento::findOrFail($id);
    	$vazamento->condicao='0';
    	$vazamento->update();
    	return Redirect::to('/vazamentos');*/
    }
}
