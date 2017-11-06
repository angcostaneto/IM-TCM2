<?php

namespace App\Http\Controllers;

use App\RealStates;
use Illuminate\Http\Request;
use App\Helper\ConsultApi;
use Illuminate\Support\Facades\DB;
use App\Addresses;

class RealStatesController extends Controller
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

        $realstate = RealStates::create($data);

        $dataAddressValidate = $this->validate(request(), 
            [
                'cep' => 'required',
                'number' => 'required|numeric'
            ]
        );

        $helper = new ConsultApi();        
        
        $verifyAddress = DB::table('addresses')
            ->select('id')
            ->where([
                ['number', $dataAddressValidate['number']],
                ['cep', $dataAddressValidate['cep']],
            ])
            ->get();
        
        $result = $verifyAddress->toArray();

        if (empty($result)) {
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

                $realstateAddress = Addresses::create($dataAddress)->id;

                $realstate->real_states_address = $realstateAddress;
            }
        }
        else {
            $realstate->real_states_address = $result[0]->id;
        }
        
        $realstate->save();
        
        return back()->with('success', 'RealState has been added');
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
     * @param  \App\RealStates  $realStates
     * @return \Illuminate\Http\Response
     */
    public function edit(RealStates $realStates)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RealStates  $realStates
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RealStates $realStates)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RealStates  $realStates
     * @return \Illuminate\Http\Response
     */
    public function destroy(RealStates $realStates)
    {
        //
    }
}
