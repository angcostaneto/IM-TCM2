<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Helper\ConsultApi;
use Illuminate\Support\Facades\DB;
use App\Addresses;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

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
        $this->middleware('auth');
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
            'type' => 'required',
            'rg' => 'required',
            'cpf' => 'required',
            'cep' => 'required',
            'number' => 'required|numeric',
            'password' => 'required|string|min:6|confirmed'
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
        $users = User::with('address')->get();
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
        $helper = new ConsultApi();        
        
        $verifyAddress = DB::table('addresses')
            ->select('id')
            ->where([
                ['number', $data['number']],
                ['cep', $data['cep']],
            ])
            ->get();
        
        $result = $verifyAddress->toArray();
        if (empty($result)) {
            $address = $helper->consult_api('GET', 'http://api.postmon.com.br/v1/cep/'.$data['cep'], TRUE);
    
            if (!empty($address)) {
                $dataAddress = [
                    'street' => $address->logradouro,
                    'district' => $address->bairro,
                    'city' => $address->cidade,
                    'state' => $address->estado,
                    'number' => $data['number'],
                    'cep' => $address->cep
                ];
                $userAddress = Addresses::create($dataAddress)->id;
            }
        }
        else {
            $userAddress = $result[0]->id;
        }
        
        if(empty($data['photo'])){
            $photo = null;
        }else{
            $photo = $data['photo'];
        }
        
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'type' => $data['type'],
            'photo' => $photo,
            'rg' => $data['rg'],
            'cpf' => $data['cpf'],
            'user_address' => $userAddress,
            'password' => bcrypt($data['password']),
        ]);
    }
    
    public function edit($id)
    {
        $user = User::with('address')->where('id', $id) -> first();
        if(!empty($user)){
            return view('auth.register', compact ('user'));
        }else{
            return response('User não encontrado', 404);
        }
        
    }
    
    public function update(Request $request, $id){
        
        $user = User::with('address')->find($id);
        
        $helper = new ConsultApi();        
        
        $verifyAddress = DB::table('addresses')
            ->select('id')
            ->where([
                ['number', $request->input('number')],
                ['cep', $request->input('cep')],
            ])
            ->get();
        
        $result = $verifyAddress->toArray();
        if (empty($result)) {
            $address = $helper->consult_api('GET', 'http://api.postmon.com.br/v1/cep/'.$request->input('cep'), TRUE);
    
            if (!empty($address)) {
                $dataAddress = [
                    'street' => $address->logradouro,
                    'district' => $address->bairro,
                    'city' => $address->cidade,
                    'state' => $address->estado,
                    'number' => $request->input('number'),
                    'cep' => $address->cep
                ];
                $userAddress = Addresses::create($dataAddress)->id;
            }
        }
        else {
            $userAddress = $result[0]->id;
        }
        
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->type = $request->input('type');
        $user->photo = $request->input('photo');
        $user->rg = $request->input('rg');
        $user->cpf = $request->input('cpf');
        $user->user_address = $userAddress;
        
        if ( ! $request->input('password') == '')
        {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return back()->with('success', 'Usuário '.$user->name.' atualizado!');
    }
    
    public function destroy(User $user)
    {
        //
    }
    
}
