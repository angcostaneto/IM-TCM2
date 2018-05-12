<?php

namespace App\Http\Controllers;

use App\Conversa;
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
     * Verifica se existe uma conversa.
     */
    public function verificaSeExisteUmaConversa($id_residencia, $id_destinatario, $id_rementente) {
        $verficaConversa = DB::table('mensagens')
            ->select('id_conversa')
            ->where([
                ['id_residencia', '=', $id_residencia],
                ['id_destinatario', '=', $id_destinatario],
                ['id_remetente', '=', $id_rementente],
            ])
            ->first();

        return $verficaConversa;
    }

    /**
     * Envia a mensagem.
     *
     * @param object $request
     *   Os inputs dos formularios.
     * @param int $id
     *   Id da residencia que está sendo enviada.
     */
    public function enviar(Request $request, $id)
    {
        
        $id_remetente = Auth::user()->id;

        $destinatario = DB::table('relacaoresidenciasusers')
        ->where('residencia_id', '=', $id)
        ->first();
        
        $existeConversa = $this->verificaSeExisteUmaConversa($id, $destinatario->user_id, $id_remetente);

        if (!$existeConversa) {
            $conversa = Conversa::create()->id;
        }
        else {
            $conversa = $existeConversa->id_conversa;
        }
        
        $data = [
            'id_residencia' => $id,
            'id_remetente' => $id_remetente,
            'id_destinatario' => $destinatario->user_id,
            'mensagem' => $request->mensagem
        ];

        $mensagens = Mensagens::create($data);

        $mensagens->conversa()->associate($conversa);

        $mensagens->save();

        return back()->with('success', 'Mensagem foi enviada');
    }
    
    /**
     * Verifica as mesagens enviadas.
     */
    public function verificaMensagensEnviadas(int $idRemetente) {
        $mensagens = DB::table('mensagens')
            ->distinct()
            ->select('id_residencia', 'id_destinatario')
            ->where('id_remetente', '=', $idRemetente)
            ->get();

        $mensagens = $mensagens->toArray();

        $mensagensEnviadas = [];

        foreach ($mensagens as $mensagem) {
            $destinatario = User::find($mensagem->id_destinatario);
            
            $residencia = Residencias::find($mensagem->id_residencia);

            $mensagensEnviadas[] = [
                'destinatario' => $destinatario,
                'residencia' => $residencia
            ];
        }
        return view('mensagens.lista_enviadas', ['mensagens' => $mensagensEnviadas, 'tipo' => 'Enviadas']);
    }

    /**
     * Verifica as mensagens recebidas.
     */
    public function verficaMensagensRecebidas(int $idDestinario) {
        $mensagens = DB::table('mensagens')
            ->distinct()
            ->select('id_residencia', 'id_remetente')
            ->where('id_destinatario', '=', $idDestinario)
            ->get();

        $mensagens = $mensagens->toArray();

        $mensagensRecebidas = [];

        foreach ($mensagens as $mensagem) {
            $remetente = User::find($mensagem->id_remetente);
            
            $residencia = Residencias::find($mensagem->id_residencia);

            $mensagensRecebidas[] = [
                'remetente' => $remetente,
                'residencia' => $residencia
            ];
        }
        
        return view('mensagens.lista_recebidas', ['mensagens' => $mensagensRecebidas, 'tipo' => 'Recebidas']);
    }

    /**
     * Carrega uma conversa.
     */
    public function recuperaConversaEnviadas(int $idDestinatario, int $idResidencia) {
        $mensagens = DB::table('mensagens')
            ->select('id_residencia', 'id_destinatario', 'mensagem')
            ->where([
                ['id_destinatario', '=', $idDestinatario],
                ['id_residencia', '=', $idResidencia]
            ])
            ->orderBy('created_at', 'desc')
            ->get();

        $mensagens = $mensagens->toArray();

        $mensagensEnviadas = [];

        foreach ($mensagens as $mensagem) {
            $destinatario = User::find($mensagem->id_destinatario);
            
            $residencia = Residencias::find($mensagem->id_residencia);

            $mensagensEnviadas = [
                'destinatario' => $destinatario,
                'residencia' => $residencia,
                'mensagem' => $mensagem->mensagem,
            ];
        }
        
        return $mensagensEnviadas;
    }

    /**
     * Carrega uma conversa.
     */
    public function recuperaConversaRecebidas(int $idResidencia, int $idDestinario) {
        $mensagens = DB::table('mensagens')
            ->distinct()
            ->select('id_residencia', 'id_remetente', 'mensagem')
            ->where([
                ['id_destinatario', '=', $idDestinario],
                ['id_residencia', '=', $idResidencia]
            ])
            ->orderBy('created_at', 'desc')
            ->get();

        $mensagens = $mensagens->toArray();

        $mensagensRecebidas = [];

        foreach ($mensagens as $mensagem) {
            $remetente = User::find($mensagem['id_remetente']);
            
            $residencia = Residencia::find($mensagem['id_residencia']);

            $mensagensEnviadas = [
                'remetente' => $remetente,
                'residencia' => $residencia,
                'mensagem' => $mensagens['mensagem']
            ];
        }
        
        return $mensagensRecebidas;
    }
}
