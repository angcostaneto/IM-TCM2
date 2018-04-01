<?php

namespace App\Http\Controllers;

use App\Mensagens;
use Illuminate\Http\Request;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(int $idDestinario, int $idRemetente, string $mensagem)
    {
        $data = [
            'id_destinatario' => $idDestinario,
            'id_remetente' => $idRemetente,
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mensagens  $mensagens
     * @return \Illuminate\Http\Response
     */
    public function edit(Mensagens $mensagens)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mensagens  $mensagens
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mensagens $mensagens)
    {
        //
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
        $mensagem = Mensagens::where('id_remetente', '=', $idRemetente );
    }

    /**
     * VErifica as mensagens recebidas.
     */
    public function verficaMensagensRecebidas(int $idDestinario) {
        $mensagem = Mensagens::where('id_destinatario', '=', $idDestinario);
    }
}
