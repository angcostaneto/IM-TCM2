<?php

namespace App\Http\Controllers;

use JavaScript;
use App\Conversa;
use App\Mensagens;
use App\Residencias;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

class MensagensController extends Controller
{

    protected $pusher;
    protected $chatChannel;
    protected $currentUser;

    /**
     * Construct.
     */
    public function __construct() {
        $this->middleware('auth');
        $this->pusher = App::make('pusher');
    }

    /**
     * Set o canal de comunicação.
     */
    public function setChannel($chatChannel) {
        $this->chatChannel = 'private-' . $chatChannel;
    }

    /**
     * Retorna o canal de comunicação.
     */
    public function getChannel() {
        return $this->chatChannel;
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
            $conversa = Conversa::create(['channel' => hash('sha256', rand())])->id;
        }
        else {
            $conversa = $existeConversa->id_conversa;
        }
        
        $data = [
            'id_residencia' => $id,
            'id_remetente' => $id_remetente,
            'id_destinatario' => $destinatario->user_id,
            'mensagem' => e($request->mensagem)
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
            ->select('id_residencia', 'id_destinatario', 'id_conversa')
            ->where('id_remetente', '=', $idRemetente)
            ->get();

        $mensagens = $mensagens->toArray();

        $mensagensEnviadas = [];

        foreach ($mensagens as $mensagem) {
            $destinatario = User::find($mensagem->id_destinatario);
            
            $residencia = Residencias::find($mensagem->id_residencia);

            $mensagensEnviadas[] = [
                'destinatario' => $destinatario,
                'residencia' => $residencia,
                'conversa' => $mensagem->id_conversa,
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
            ->select('id_residencia', 'id_remetente', 'id_conversa')
            ->where('id_destinatario', '=', $idDestinario)
            ->get();

        $mensagens = $mensagens->toArray();

        $mensagensRecebidas = [];

        foreach ($mensagens as $mensagem) {
            $remetente = User::find($mensagem->id_remetente);
            
            $residencia = Residencias::find($mensagem->id_residencia);

            $mensagensRecebidas[] = [
                'remetente' => $remetente,
                'residencia' => $residencia,
                'conversa' => $mensagem->id_conversa,
            ];
        }
        
        return view('mensagens.lista_recebidas', ['mensagens' => $mensagensRecebidas, 'tipo' => 'Recebidas']);
    }

    /**
     * Carrega uma conversa.
     */
    public function recuperaConversa(int $idConversa) {
        $conversa = DB::table('conversa')
            ->where([
                ['id', '=', $idConversa],
            ])
            ->get()
            ->toArray();

        $this->setChannel($conversa[0]->channel);

        $mensagens = DB::table('mensagens')
            ->where([
                ['id_conversa', '=', $idConversa],
            ])
            ->orderBy('created_at', 'desc')
            ->get();

        $mensagens = $mensagens->toArray();

        $mensagensEnviadas = [];

        foreach ($mensagens as $mensagem) {
            $remetente = User::find($mensagem->id_remetente);

            $destinatario = User::find($mensagem->id_destinatario);
            
            $residencia = Residencias::find($mensagem->id_residencia);

            $msgs[] = [
                'remetente' => $remetente,
                'destinatario' => $destinatario,
                'residencia' => $residencia,
                'mensagem' => $mensagem->mensagem,
            ];
        }

        return view('mensagens.conversa', ['mensagens' => $msgs, 'chatChannel' => $this->getChannel()]) ;
    }

    public function enviaMensagem(Request $request)
    {   
        $mensagem = [
            'text' => e($request->message),
            'nome' => Auth::user()->name,
        ];

        $this->pusher->trigger($request->chat, 'nova-mensagem', $mensagem);
    }

    /**
     * Autenticação para o chat.
     */
    public function postAuth(Request $request)
    {
        return $this->pusher->socket_auth($request->channel_name, $request->socket_id);
    }
}
