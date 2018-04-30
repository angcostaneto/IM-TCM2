<?php

namespace App\Helper;

use GuzzleHttp\Client;

class Imgur {
    
    protected $client;

    /**
     * Seta o cliente.
     */
    public function __construct(){
        $this->client = new Client();
    }

    /**
     * Utiliza a api do imgur para o upload da imagem.
     */
    public function sobeImagem(array $imagens) {
        
        $return = [];
        $residenciaImagens = [];;
        
        foreach ($imagens as $imagem) {
            $response = $this->client->request('POST', 'https://api.imgur.com/3/image', [
                'headers' => [
                    'Authorization' => 'Bearer ' . 'b61557f7549eadd40fc367ef00e4d5d2c8bf9997',
                    'Authorization' => 'Client-ID ' . '585cd8860a04521', 
                    'content-type' => 'application/x-www-form-urlencoded',
                ],

                'form_params' => [
                    'image' => base64_encode(file_get_contents($imagem->path())),
                    'album' => '9m3tknUNXkn4x9S',
                ],
            ]);

            $residenciaImagens[] = json_decode(($response->getBody()->getContents()));
        }
            
        foreach ($residenciaImagens as $residenciaImagem) {
            $return[] = $residenciaImagem->data->link;
        }

        return json_encode($return);
    }

}
