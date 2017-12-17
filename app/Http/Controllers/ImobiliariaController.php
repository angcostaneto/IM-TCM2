<?php

namespace App\Http\Controllers;

use App\Imobiliaria;
use Illuminate\Http\Request;
use App\Helper\ConsultApi;
use Illuminate\Support\Facades\DB;
use App\Addresses;

class ImobiliariaController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $realStates = Imobiliaria::with('endereco')->get();

        return view('realstates.index', ['realStates' => $realStates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('realstates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate(request(), 
            [
                'company' => 'required',
                'trading_name' => 'required',
                'logo' => 'required',
                'cnpj' => 'required',
                'creci' => 'required',
                'phones' => 'required',
                'responsable' => 'required',
                'responsable_email' => 'required'
            ]
        );

        $realState = Imobiliaria::create($data);

        $dataAddressValidate = $this->validate(request(), 
            [
                'cep' => 'required',
                'number' => 'required|numeric'
            ]
        );

        $helper = new ConsultApi();        
        
        $verifyAddress = Enderecos::where([
            ['numero', $dataAddressValidate['number']],
            ['cep', $dataAddressValidate['cep']],
        ])->first();

        if (empty($verifyAddress)) {
            $address = $helper->consult_api('GET', 'http://api.postmon.com.br/v1/cep/' . $request->cep, TRUE);
    
            if (!empty($address)) {
                $dataAddress = [
                    'rua' => $address->logradouro,
                    'bairro' => $address->bairro,
                    'cidade' => $address->cidade,
                    'estado' => $address->estado,
                    'numero' => $request->number,
                    'cep' => $address->cep
                ];

                $realStateAddress = Enderecos::create($dataAddress);

                $realState->endereco()->associate($realStateAddress);
            }
        }
        else {
            $realState->endereco()->associate($verifyAddress);
        }
        
        $realState->save();

        return redirect('realstates/')->with('success', sprintf('%s foi inserida com sucesso', $realState->company));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Imobiliaria  $realStates
     * @return \Illuminate\Http\Response
     */
    public function show(Imobiliaria $realStates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $realState = Imobiliaria::with('endereco')->where('id', $id)->first();

        return view('realstates.edit', ['realState' => $realState]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $realState = Imobiliaria::findOrFail($id);

        $data = $this->validate(request(), 
            [
                'company' => 'required',
                'logo' => 'required',
                'phones' => 'required',
                'responsable' => 'required',
                'responsable_email' => 'required'
            ]
        );

        $realState->update($data);

        $dataAddressValidate = $this->validate(request(), 
            [
                'cep' => 'required',
                'number' => 'required|numeric'
            ]
        );

        $verifyAddress = Enderecos::where([
            ['number', $dataAddressValidate['number']],
            ['cep', $dataAddressValidate['cep']],
        ])->first();
        
        if (empty($verifyAddress)) {
            $address = $helper->consult_api('GET', 'http://api.postmon.com.br/v1/cep/' . $request->cep, TRUE);
    
            if (!empty($address)) {
                $dataAddress = [
                    'street' => $address->logradouro,
                    'district' => $address->bairro,
                    'city' => $address->cidade,
                    'state' => $address->estado,
                    'number' => $request->number,
                    'cep' => $address->cep
                ];

                $realStateAddress = Enderecos::create($dataAddress);

                $realState->endereco()->associate($realStateAddress);
            }
        }
        else {
            $realState->endereco()->associate($verifyAddress);
        }

        $realState->save();

        return redirect('realstates/')->with('success', sprintf('%s foi atualizada com sucesso', $realState->company));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $realState = Imobiliaria::find($id);

        $realState->delete();

        return redirect('realstates/')->with('success', sprintf('%s foi deletada com sucesso', $realState->company));
    }
}
