<?php

namespace App\Http\Controllers;

use App\Residences;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResidencesController extends Controller
{

    /**
     * Get all residences types.
     */
    public function getResidencesType() {
        $category = NULL;
        $return = [];

        $residencesTypes = DB::table('residences_types')
        ->join('residences_types_category', 'residences_types.residences_types_category', '=', 'residences_types_category.id')
        ->select('residences_types.id', 'residences_types.name as residence_type', 'residences_types_category.name as residences_types_category')
        ->orderBy('residences_types_category.name', 'asc')
        ->get();

        $result = $residencesTypes->toArray();

        foreach ($result as $residencesType) {
            
            $return[$residencesType->residences_types_category][] = [
                'id' => $residencesType->id,
                'name' => $residencesType->residence_type
            ];

            $category = $residencesType->residences_types_category;
        }

        return $return;
    }

    public function generateCode() {
        
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
        $residencesTypes = $this->getResidencesType();

        return view('residences.create', ['residencesTypes' => $residencesTypes]);
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
                'title' => 'required',
                'description' => 'required',
                'negotiation_price' => 'required|numeric',
                'toilet' => 'required|numeric',
                'bathroom' => 'required|numeric',
                'suite' => 'required|numeric',
                'garage' => 'required|numeric',
                'area' => 'required|numeric',
                'residences_type' => 'required|numeric',
            ]
        );

        $residences = Residences::create($data);

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

                $residencesAddress = Addresses::create($dataAddress)->id;

                $residencesAddress->residences_address = $residencesAddress;
            }
        }
        else {
            $residences->residences_address = $result[0]->id;
        }
        
        $residences->save();
        
        return back()->with('success', 'Residence has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Residences  $residences
     * @return \Illuminate\Http\Response
     */
    public function show(Residences $residences)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Residences  $residences
     * @return \Illuminate\Http\Response
     */
    public function edit(Residences $residences)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Residences  $residences
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Residences $residences)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Residences  $residences
     * @return \Illuminate\Http\Response
     */
    public function destroy(Residences $residences)
    {
        //
    }
}
