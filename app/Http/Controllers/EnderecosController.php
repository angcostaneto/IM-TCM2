<?php

namespace App\Http\Controllers;

use App\Enderecos;
use Illuminate\Http\Request;
use App\Helper\ConsultaApi;

class EnderecosController extends Controller
{
    /**
     * Verifica e atribui o endereço
     * 
     * @var int numero
     *  Numero do endereço
     * @var string cep
     *  Cep do endereço
     */
    static function verificaEndereco($numero, $cep) 
    {
        $verificaEndereco = Enderecos::where([
            ['numero', $numero],
            ['cep', $cep],
        ])->first();

        if (empty($verificaEndereco)) {
            $endereco = ConsultaApi::consultaApi('GET', 'http://api.postmon.com.br/v1/cep/' . $cep, TRUE);
    
            if (!empty($endereco)) {
                $dataEndereco = [
                    'rua' => $endereco->logradouro,
                    'bairro' => $endereco->bairro,
                    'cidade' => $endereco->cidade,
                    'estado' => $endereco->estado,
                    'numero' => $numero,
                    'cep' => $endereco->cep
                ];

                $endereco = Enderecos::create($dataEndereco);

                return $endereco;
            }
        }
        else {
            return $verificaEndereco;
        }
    }
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Enderecos  $enderecos
     * @return \Illuminate\Http\Response
     */
    public function show(Enderecos $enderecos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Enderecos  $enderecos
     * @return \Illuminate\Http\Response
     */
    public function edit(Enderecos $enderecos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Enderecos  $enderecos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enderecos $enderecos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enderecos  $enderecos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enderecos $enderecos)
    {
        //
    }
}
