<?php

namespace App\Http\Controllers;

use App\Mensagens;
use App\Residencias;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MensagensController extends Controller
{

    /**
     * Construct.
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Envia a mensagem.
     */
    public function enviar(int $idDestinario, int $idRemetente, int $idAnuncio, string $mensagem)
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
     * Verifica as mesagens enviadas.
     */
    public function verificaMensagensEnviadas(int $idRemetente) {
        $mensagens = DB::table('mensagens')
            ->distinct()
            ->select('id_anuncio', 'id_destinatario')
            ->where('id_remetente', '=', $idRemetente)
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
            ->distinct()
            ->select('id_anuncio', 'id_remetente')
            ->where('id_destinatario', '=', $idDestinario)
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

    /**
     * Carrega uma conversa.
     */
    public function recuperaConversaEnviadas(int $idAnuncio, int $idRemetente) {
        $mensagens = DB::table('mensagens')
            ->distinct()
            ->select('id_anuncio', 'id_destinatario', 'mensagem')
            ->where([
                ['id_remetente', '=', $idRemetente],
                ['id_anuncio', '=', $idAnuncio]
            ])
            ->orderBy('created_at', 'desc')
            ->get();

        $mensagens = $mensagens->toArray();

        $mensagensEnviadas = [];

        foreach ($mensagens as $mensagem) {
            $destinatario = User::find($mensagem['id_destinatario']);
            
            $residencia = Residencia::find($mensagem['id_anuncio']);

            $mensagensEnviadas = [
                'destinatario' => $destinatario,
                'residencia' => $residencia,
                'mensagem' => $mensagens['mensagem']
            ];
        }
        
        return $mensagemEnviadas;
    }

    /**
     * Carrega uma conversa.
     */
    public function recuperaConversaRecebidas(int $idAnuncio, int $idDestinario) {
        $mensagens = DB::table('mensagens')
            ->distinct()
            ->select('id_anuncio', 'id_remetente', 'mensagem')
            ->where([
                ['id_destinatario', '=', $idDestinario],
                ['id_anuncio', '=', $idAnuncio]
            ])
            ->orderBy('created_at', 'desc')
            ->get();

        $mensagens = $mensagens->toArray();

        $mensagensRecebidas = [];

        foreach ($mensagens as $mensagem) {
            $remetente = User::find($mensagem['id_remetente']);
            
            $residencia = Residencia::find($mensagem['id_anuncio']);

            $mensagensEnviadas = [
                'remetente' => $remetente,
                'residencia' => $residencia,
                'mensagem' => $mensagens['mensagem']
            ];
        }
        
        return $mensagensRecebidas;
    }
}
