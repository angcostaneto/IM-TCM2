<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Residencias;

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
    public function index()
    {
        if(Auth::user()->tipo == "superadmin"){
            $residencias = Residencias::where('residencias.ativo', true)->paginate(10);
        }else{      
            $residencias = Residencias::
                join('relacaoresidenciasusers', 'residencias.id', '=', 'relacaoresidenciasusers.residencia_id')
                ->where('relacaoresidenciasusers.user_id', Auth::user()->id)
                ->where('residencias.ativo', true)
                ->paginate(10);
        }

        $naoLidas = DB::table('mensagens')
            ->where('id_destinatario', Auth::user()->id)
            ->where('lido', false)
            ->get();

        return view('home', compact('naoLidas', 'residencias'));
    }
}
