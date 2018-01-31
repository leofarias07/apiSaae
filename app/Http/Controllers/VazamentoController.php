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
        
        //return response()->json(Vazamento::all());

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
            ->select('vazamento.id', 'vazamento.endereco', 'vazamento.descricao', 'vazamento.contato','vazamento.created_at','status_gerals.statusgeral')
            ->orderBy('id', 'desc')
            ->paginate(15);
          
            return view('vazamento.index', [
                "vazamento"=>$vazamento, "searchText"=>$query
                ]);
        }
      
            
    }
     public function show($id){
         $vazamento = Vazamento::findOrFail($id);
        return response()->json($vazamento);
    }


        public function store(Request $request){

        $vazamento = Vazamento::create($request->all());
        return response()->json($vazamento);    
      
    }
   


   
    public function edit(){
    	//return view("vazamentos.edit",["vazamento"=>Vazamento::FinfORFail($id)]);
    }
    public function update(Request $request, $id){
        $vazamento = Vazamento::findOrFail($id);
        $vazamento->fill($request->all());
        return response()->json($vazamento);

    }
    public function destroy($id){
         $vazamento = Vazamento::findOrFail($id);
        $vazamento->delete();
        return response()->json(['message'=>'Removido com sucesso']);
    	/*$vazamento = Vazamento::findOrFail($id);
    	$vazamento->condicao='0';
    	$vazamento->update();
    	return Redirect::to('/vazamentos');*/
    }
}
