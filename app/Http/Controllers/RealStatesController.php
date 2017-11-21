<?php

namespace App\Http\Controllers;

use App\RealStates;
use Illuminate\Http\Request;
use App\Helper\ConsultApi;
use Illuminate\Support\Facades\DB;
use App\Addresses;

class RealStatesController extends Controller
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
        $realStates = RealStates::with('address')->get();

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

        $realState = RealStates::create($data);

        $dataAddressValidate = $this->validate(request(), 
            [
                'cep' => 'required',
                'number' => 'required|numeric'
            ]
        );

        $helper = new ConsultApi();        
        
        $verifyAddress = Addresses::where([
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

                $realStateAddress = Addresses::create($dataAddress);

                $realState->address()->associate($realStateAddress);
            }
        }
        else {
            $realState->address()->associate($verifyAddress);
        }
        
        $realState->save();

        return redirect('realstates/')->with('success', sprintf('%s foi inserida com sucesso', $realState->company));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RealStates  $realStates
     * @return \Illuminate\Http\Response
     */
    public function show(RealStates $realStates)
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
        $realState = RealStates::with('address')->where('id', $id)->first();

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
        $realState = RealStates::findOrFail($id);

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

        $verifyAddress = Addresses::where([
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

                $realStateAddress = Addresses::create($dataAddress);

                $realState->address()->associate($realStateAddress);
            }
        }
        else {
            $realState->address()->associate($verifyAddress);
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
        $realState = RealStates::find($id);

        $realState->delete();

        return redirect('realstates/')->with('success', sprintf('%s foi deletada com sucesso', $realState->company));
    }
}
