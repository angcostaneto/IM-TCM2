<?php

namespace App\Http\Controllers;

use App\Residences;
use Illuminate\Http\Request;
use App\Helper\ConsultApi;
use Illuminate\Support\Facades\DB;
use App\Addresses;
use App\ResidencesTypes;

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

    /**
     * Generate code for residence
     */
    public function generateCode() {
        $str = "";
	    $characters = array_merge(range('A','Z'), range('0','9'));
	    $max = count($characters) - 1;
        
        for ($i = 0; $i < 5; $i++) {
	    	$rand = mt_rand(0, $max);
	    	$str .= $characters[$rand];
	    }
        
        $codeResidence = DB::table('residences')
            ->select('code')
            ->where([
                ['code', $str]
            ])
            ->get();
        
        $result = $codeResidence->toArray();

        if (!empty($result)) {
            $this->generateCode();
        }

        return $str;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $residences = Residences::with(['address', 'type'])->get();

        return view('residences.index', ['residences' => $residences]);
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
        
        $residenceType = ResidencesTypes::where('id', $data['residences_type'])->first();
        
        unset($data['residences_type']);
        
        $data['code'] = $this->generateCode();
        
        $residences = Residences::create($data);

        $residences->type()->associate($residenceType);

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

                $residencesAddress = Addresses::create($dataAddress);

                $residences->address()->associate($residencesAddress);
            }
        }
        else {
            $residences->address()->associate($verifyAddress);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $residencesTypes = $this->getResidencesType();

        $residence = Residences::with(['address', 'type'])->where(['id' => $id])->first();

        return view('residences.edit', ['residencesTypes' => $residencesTypes, 'residence' => $residence]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Residences  $residences
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $residence = Residences::findOrFail($id);

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
        
        $residenceType = ResidencesTypes::where('id', $data['residences_type'])->first();
        
        unset($data['residences_type']);
        
        $residence->update($data);

        $residence->type()->associate($residenceType);

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

                $residenceAddress = Addresses::create($dataAddress);

                $residence->address()->associate($residenceAddress);
            }
        }
        else {
            $residence->address()->associate($verifyAddress);
        }
        
        
        $residence->save();
        
        return back()->with('success', 'Residence has been updated');
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
