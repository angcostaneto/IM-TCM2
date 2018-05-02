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
     * Cria o header da requisição.
     */
    protected function montaHeader() {
        return [
            'Authorization' => 'Bearer ' . 'b61557f7549eadd40fc367ef00e4d5d2c8bf9997',
            'Authorization' => 'Client-ID ' . '585cd8860a04521', 
            'content-type' => 'application/x-www-form-urlencoded',
        ]; 
    }

    /**
     * Utiliza a api do imgur para o upload da imagem.
     */
    public function sobeImagem(array $imagens) {
        
        $return = [];
        $residenciaImagens = [];;
        
        foreach ($imagens as $imagem) {
            $response = $this->client->request('POST', 'https://api.imgur.com/3/image', [
                'headers' => $this->montaHeader(),

                'form_params' => [
                    'image' => base64_encode(file_get_contents($imagem->path())),
                    'album' => '9m3tknUNXkn4x9S',
                ],
            ]);

            $residenciaImagens[] = json_decode(($response->getBody()->getContents()));
        }
            
        foreach ($residenciaImagens as $residenciaImagem) {
            $return[] = [
                'link' => $residenciaImagem->data->link,
                'idImgur' => $residenciaImagem->data->id,
                'deletehash' => $residenciaImagem->data->deletehash,
            ];
        }

        return json_encode($return);
    }


    /**
     * Deleta a imagem.
     * 
     * !TODO: Finalizar a função após a inserção da interface.
     */
    public function deletaImagem(array $deleteHashes) {
        foreach ($deleteHashes as $deleteHash) {
            $response = $this->client->request('POST', 'https://api.imgur.com/3/image/' . $deleteHash, [
                'headers' => $this->montaHeader(),
            ]);

            $return[] = json_decode(($response->getBody()->getContents()));
        }

    }

}
