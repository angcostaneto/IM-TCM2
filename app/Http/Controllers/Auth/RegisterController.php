<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Helper\ConsultApi;
use Illuminate\Support\Facades\DB;
use App\Addresses;

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
        $this->middleware('guest');
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
}
