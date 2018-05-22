<?php

namespace App\Http\Controllers;
use App\Residencias;
use App\TipoResidencias;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Validation\Rule;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\DB;
use App\User;

class ClienteController extends Controller
{
    public function index(){

        $agent = new Agent();
        $residencias = Residencias::where('ativo', true)->orderBy('id')->paginate(9);
        $tipos = TipoResidencias::orderBy('nome')->get();
        //LIMITE DO PAGINATE À DEFINIR

        $titulo = "Apperitivo Imóveis";
        return view('cliente.cliente', compact('titulo','residencias','tipos','agent'));
    }

    public function residencia($id){
        
        $agent = new Agent();
        $residencia = Residencias::find($id);
        $titulo = $residencia->header_anuncio." | Apperitivo Imóveis";

        $residenciaDonoId = DB::table('relacaoresidenciasusers')
            ->where('residencia_id', '=', $id)
            ->first();

        $residenciaDono = User::find($residenciaDonoId->user_id)->name;

        if(!empty($residencia)){
            return view('cliente.residencia', compact('titulo','residencia', 'agent', 'residenciaDono'));
        }else{
            return null;
        }
        
    }
    
    public function procurar(Request $request){

        $agent = new Agent();
        $tipos = TipoResidencias::orderBy('nome')->get();

        $validator = Validator::make($request->all(), [
            'tiponegocio' => [
                'nullable',
                Rule::in(['Alugar', 'Comprar']),
            ],
            'tipoimovel' => [
                'nullable',
                Rule::in(['Casa de Vila', 'Casa de Condomínio', 'Apartamento Padrão', 
                            'Cobertura', 'Kitnet', 'Chácara', 'Fazenda', 'Sitio']),
            ],
            'cidade' => 'nullable|string|max:30',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }else{

            $tiponegocio = null;
            $tipoimovel = null;
            $cidade = null;
            
            $residencias = Residencias::with('tipo', 'endereco')->where('ativo', true);

            if(!empty($request->tiponegocio)){
                if($request->tiponegocio == "Comprar"){
                    $residencias->where('tipo_negociacao', 'Vender');
                }
                if($request->tiponegocio == "Alugar"){
                    $residencias->where('tipo_negociacao', 'Alugar');
                }
                $tiponegocio = $request->tiponegocio;
            }
            
            if(!empty($request->tipoimovel)){
                
                $residencias->whereHas('tipo', function ($query) use ($request) {
                    $query->where('nome', $request->tipoimovel);
                });

                $tipoimovel = $request->tipoimovel;
            }

            if(!empty($request->cidade)){

                $residencias->whereHas('endereco', function ($query) use ($request) {
                    $query->where('cidade', 'like', '%'.$request->cidade.'%');
                });

                $cidade = $request->cidade;
            }
            
            $residencias = $residencias->paginate(9);

            $titulo = "Apperitivo Imóveis";
            
            return view('cliente.cliente', compact('titulo','residencias','agent', 'tipos','tiponegocio', 'tipoimovel', 'cidade'));
        }
        
    }
}