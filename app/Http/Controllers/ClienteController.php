<?php

namespace App\Http\Controllers;
use App\Residencias;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Validation\Rule;

class ClienteController extends Controller
{
    public function index(){
        
        $residencias = Residencias::orderBy('id')->paginate(9);
        //LIMITE DO PAGINATE À DEFINIR

        $titulo = "Apperitivo Imóveis";
        return view('cliente.cliente', compact('titulo','residencias'));
    }
    
    public function procurar(Request $request){

        $validator = Validator::make($request->all(), [
            'tiponegocio' => [
                'required',
                Rule::in(['Alugar', 'Comprar', 'Vender']),
            ],
            'tipoimovel' => [
                'required',
                Rule::in(['Casa de Vila', 'Casa de Condomínio', 'Apartamento Padrão', 
                            'Cobertura', 'Kitnet', 'Chácara', 'Fazenda', 'Sitio']),
            ],
            'cidade' => 'required|string|max:30',
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $residencias = Residencias::with('tipo', 'endereco')
                    ->where('tipo_negociacao', $request->tiponegocio)
                    ->orderBy('id')
                    ->paginate(9);
            /*
            //dd($residencias);
            foreach($residencias as $residencia){
                if($residencia->tipo->nome != $request->tipoimovel
                   || $residencia->endereco->cidade != $request->cidade){

                    $residencias->forget($residencia->id);
                    
                }
            }
            */
            $titulo = "Apperitivo Imóveis";
            
            //dd($residencias);
            
            return view('cliente.cliente', compact('titulo','residencias'));
        }
        
    }
}