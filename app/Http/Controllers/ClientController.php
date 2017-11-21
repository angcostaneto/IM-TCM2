<?php

namespace App\Http\Controllers;
use App\Residences;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        
        $residences = Residences::orderBy('id')->paginate(9);
        //LIMIT?

        $title = "Apperitivo Imóveis";
        return view('client.client', compact('title','residences'));
    }
}