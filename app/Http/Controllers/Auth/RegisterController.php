<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\EnderecosController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Helper\SalvaImagens;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['cadastraUsuarioLogin']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'tipo' => 'required',
            'rg' => 'required',
            'cpf' => 'required|unique:users',
            'cep' => 'required',
            'numero' => 'required|numeric',
            'password' => 'required|string|min:6|confirmed',
            'cep' => 'required',
            'numero' => 'required|numeric',
            'foto' => 'mimes:jpeg,bmp,png,jpg',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    public function index()
    {
        $users = User::with('endereco')->get();
        return view('users.index', compact ('users'));
    }
    
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        //$this->guard()->login($user);

        return redirect('users/')->with('success', sprintf('%s cadastrado com sucesso', $user->name));
    }
    
    protected function create(array $data)
    {
        $endereco = EnderecosController::verificaEndereco($data['numero'], $data['cep']);
        
        $foto = SalvaImagens::SalvaImagens($data['foto'], $data['cpf'], "user");
        
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'tipo' => $data['tipo'],
            'foto' => $foto,
            'rg' => $data['rg'],
            'cpf' => $data['cpf'],
            'user_endereco' => $endereco->id,
            'password' => bcrypt($data['password']),
        ]);
    }
    
    public function edit($id)
    {
        $user = User::with('endereco')->where('id', $id) -> first();
        if(!empty($user)){
            return view('auth.register', compact ('user'));
        }else{
            return response('User não encontrado', 404);
        }
        
    }
    
    public function update(Request $request, $id){
        
        $user = User::with('endereco')->find($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'tipo' => 'required',
            'rg' => 'required',
            'cpf' => 'required',
            'cep' => 'required',
            'numero' => 'required|numeric',
            'cep' => 'required',
            'numero' => 'required|numeric'
        ]);
        
        $endereco = EnderecosController::verificaEndereco($request->numero, $request->cep);

        if ($validator->fails()) {
            
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->tipo = $request->input('tipo');
            $user->foto = $request->input('foto');
            $user->rg = $request->input('rg');
            $user->cpf = $request->input('cpf');
            $user->user_endereco = $endereco->id;

            if (!$request->input('password') == ''){
                $user->password = bcrypt($request->input('password'));
            }

            $user->save();

            return redirect('users/')->with('success', sprintf('%s atualizado!', $user->name));
        }       
    }
    
    public function destroy($id)
    {
        $user = User::find($id);
        
        $user->delete();
        
         return redirect('users/')->with('success', sprintf('%s deletado!', $user->name));
    }

    /**
     * Cadastra o usuario a partir da tela de login.
     */
    public function cadastraUsuarioLogin(Request $request) {
        $data = $this->validate(request(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'tipo' => 'cliente',
            'password' => bcrypt($data['password'])
        ]);

        Auth::login($user, true);

        return redirect()->route('users.edit', ['user' => $user->id]);
    }
    
}
