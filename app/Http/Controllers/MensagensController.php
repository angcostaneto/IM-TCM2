<?php

namespace App\Http\Controllers;

use App\Mensagens;
use App\Residencias;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MensagensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(int $idDestinario, int $idRemetente, int $idAnuncio, string $mensagem)
    {
        $data = [
            'id_destinatario' => $idDestinario,
            'id_remetente' => $idRemetente,
            'id_anuncio' => $idAnuncio,
            'mensagem' => $mensagem
        ];

        Mensagens::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mensagens  $mensagens
     * @return \Illuminate\Http\Response
     */
    public function show(Mensagens $mensagens)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mensagens  $mensagens
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mensagens $mensagens)
    {
        //
    }
    
    /**
     * Verifica as mesagens enviadas.
     */
    public function verificaMensagensEnviadas(int $idRemetente) {
        $mensagens = DB::table('mensagens')
            ->select('id_anuncio', 'id_destinatario')
            ->where('id_remetente', '=', $idRemetente)
            ->groupBy('id_anuncio')
            ->groupBy('id_destinatario')
            ->get();

        $mensagens = $mensagens->toArray();

        $mensagensEnviadas = [];

        foreach ($mensagens as $mensagem) {
            $destinatario = User::find($mensagem['id_destinatario']);
            
            $residencia = Residencia::find($mensagem['id_anuncio']);

            $mensagensEnviadas = [
                'destinatario' => $destinatario,
                'residencia' => $residencia
            ];
        }
        
        return $mensagemEnviadas;
    }

    /**
     * Verifica as mensagens recebidas.
     */
    public function verficaMensagensRecebidas(int $idDestinario) {
        $mensagens = DB::table('mensagens')
            ->select('id_anuncio', 'id_remetente')
            ->where('id_destinatario', '=', $idDestinario)
            ->groupBy('id_anuncio')
            ->groupBy('id_destinatario')
            ->get();

        $mensagens = $mensagens->toArray();

        $mensagensRecebidas = [];

        foreach ($mensagens as $mensagem) {
            $remetente = User::find($mensagem['id_remetente']);
            
            $residencia = Residencia::find($mensagem['id_anuncio']);

            $mensagensEnviadas = [
                'remetente' => $remetente,
                'residencia' => $residencia
            ];
        }
        
        return $mensagensRecebidas;
    }
}
