<?php

namespace App\Http\Controllers;
use App\Residencias;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(){
        
        $residencias = Residencias::orderBy('id')->paginate(9);
        //LIMITE DO PAGINATE À DEFINIR

        $titulo = "Apperitivo Imóveis";
        return view('cliente.cliente', compact('titulo','residencias'));
    }
}