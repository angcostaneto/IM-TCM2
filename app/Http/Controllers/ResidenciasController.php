<?php

namespace App\Http\Controllers;

use App\Residencias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\TipoResidencias;
use App\Http\Controllers\EnderecosController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Helper\SalvaImagens;
use App\Helper\Imgur;

class ResidenciasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Get all residences types.
     */
    public function getTipoResidencias() {
        $return = [];

        $tipoResidencias = DB::table('tipo_residencias')
            ->join('categoria_tipo_residencia', 'tipo_residencias.tipo_residencia_categoria', '=', 'categoria_tipo_residencia.id')
            ->select('tipo_residencias.id', 'tipo_residencias.nome as tipo_residencia', 'categoria_tipo_residencia.nome as categoria_tipo_residencia')
            ->orderBy('categoria_tipo_residencia.nome', 'asc')
            ->get();

        $result = $tipoResidencias->toArray();

        foreach ($result as $tipoResidencia) {
            
            $return[$tipoResidencia->categoria_tipo_residencia][] = [
                'id' => $tipoResidencia->id,
                'nome' => $tipoResidencia->tipo_residencia
            ];;
        }

        return $return;
    }

    /**
     * Generate code for residence
     */
    public function generateCode() {
        $codigo = "";
	    $caracteres = array_merge(range('A','Z'), range('0','9'));
	    $max = count($caracteres) - 1;
        
        for ($i = 0; $i < 5; $i++) {
	    	$rand = mt_rand(0, $max);
	    	$codigo .= $caracteres[$rand];
	    }
        
        $codigoResidencia = DB::table('residencias')
            ->select('codigo')
            ->where([
                ['codigo', $codigo]
            ])
            ->get();
        
        $resultado = $codigoResidencia->toArray();

        if (!empty($resultado)) {
            $this->generateCode();
        }

        return $codigo;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->tipo == "superadmin"){
            $residencias = Residencias::with(['endereco', 'tipo'])
                ->where('residencias.ativo', true)
                ->paginate(20);
        }else{      
            $residencias = Residencias::with(['endereco', 'tipo'])
                    ->join('relacaoresidenciasusers', 'residencias.id', '=', 'relacaoresidenciasusers.residencia_id')
                    ->where('relacaoresidenciasusers.user_id', Auth::user()->id)
                    ->where('residencias.ativo', true)
                    ->paginate(20);
        }
            
        return view('residencias.index', ['residencias' => $residencias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $tipoResidencias = $this->getTipoResidencias();

        return view('residencias.create', ['tipoResidencias' => $tipoResidencias]);
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
                'header_anuncio' => 'required',
                'descricao' => 'required',
                'preco' => 'required',
                'quartos' => 'required|numeric',
                'banheiros' => 'required|numeric',
                'suites' => 'required|numeric',
                'garagens' => 'required|numeric',
                'area' => 'required|numeric',
                'tipo_residencia' => 'required|numeric',
                'toilets' => 'required|numeric',
                'imagens[]' => 'mimes:jpeg,bmp,png,jpg|max:5120',
                'tipo_negociacao' => 'required',
                'ar' => 'nullable|boolean',
                'piscina' => 'nullable|boolean',
                'churrasqueira' => 'nullable|boolean',
                'closet' => 'nullable|boolean',
                'outros' => 'nullable|string|max:300',
            ]
        );

        $tipoResidencia = TipoResidencias::where('id', $data['tipo_residencia'])->first()->id;
        
        unset($data['tipo_residencia']);
        
        $data['codigo'] = $this->generateCode();
        
        $residencia = Residencias::create($data);

        $residencia->tipo()->associate($tipoResidencia);

        $dataEnderecoValidate = $this->validate(request(), 
            [
                'cep' => 'required',
                'numero' => 'required|numeric'
            ]
        );

        $endereco = EnderecosController::verificaEndereco($request->numero, $request->cep);

        $residencia->endereco()->associate($endereco->id);

        $imgur = new Imgur();

        $imagens = !empty($request->imagens) ? $imgur->sobeImagem($request->imagens) : NULL;
        
        $residencia->imagem = $imagens;

        $residencia->save();
        
        DB::table('relacaoresidenciasusers')->insert(
            ['residencia_id' => $residencia->id, 'user_id' => Auth::user()->id]
        );
        
        return redirect('residencias/')->with('success', sprintf('%s foi inserida com sucesso', $residencia->header_anuncio));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Residences  $residencia
     * @return \Illuminate\Http\Response
     */
    public function show(Residencias $residencia)
    {
        return view('residencias.show', ['residencia' => $residencia]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Residences  $residencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Residencias $residencia)
    {
        $tipoResidencias = $this->getTipoResidencias();

        return view('residencias.edit', ['tipoResidencias' => $tipoResidencias, 'residencia' => $residencia]);
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

        $residencia = Residencias::findOrFail($id);

         $data = $this->validate(request(),
            [
                'header_anuncio' => 'required',
                'descricao' => 'required',
                'preco' => 'required',
                'quartos' => 'required|numeric',
                'banheiros' => 'required|numeric',
                'suites' => 'required|numeric',
                'garagens' => 'required|numeric',
                'area' => 'required|numeric',
                'tipo_residencia' => 'required|numeric',
                'toilets' => 'required|numeric',
                'tipo_negociacao' => 'required',
            ]
        );
        
        $tipoResidencia = TipoResidencias::where('id', $data['tipo_residencia'])->first();
        
        unset($data['tipo_residencia']);
        
        $residencia->update($data);

        $residencia->tipo()->associate($tipoResidencia);

        $dataEnderecoValidate = $this->validate(request(), 
            [
                'cep' => 'required',
                'numero' => 'required|numeric'
            ]
        );

        $endereco = EnderecosController::verificaEndereco($request->numero, $request->cep);

        $residencia->endereco()->associate($endereco);
        
        $residencia->save();
        
        return redirect('residencias/')->with('success', sprintf('%s foi atualizada com sucesso', $residencia->header_anuncio));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Residencias::where('id', $id)
            ->update(['ativo' => 0]);

        return redirect('residencias/')->with('success', sprintf('Residencia deletada com sucesso'));
    }
}
