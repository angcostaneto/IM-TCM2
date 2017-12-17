<?php

namespace App\Helper;

class ConsultaApi 
{
    /**
     * Consulta uma api
     * 
     * @param $method
     *  Method for API POST|PUT|GET.
     * 
     * @param $url
     *  Url from service.
     * 
     * @param $data
     *  Data for post or put.
     * 
     * @param $authName
     *  The name for authentication.
     * 
     * @param $authPass
     *  The password for authentication.
     */
    public static function consultaApi($method, $url, $responseIsJson = FALSE, $data = FALSE, $authName = FALSE, $authPass = FALSE) {
        $curl = curl_init();

        if (!empty($authName) && !empty($authPass)) {
            $authentication = $authName . ':' . $authPass;
        }

        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, TRUE);
                if ($data) {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                }
                break;
            
            case "PUT":
                curl_setopt($curl, CURLOPT_PUT, TRUE);
                break;

            default: 
                // TODO needs tests
                $method = "GET";
        }

        if (!empty($authName) && !empty($authPass)) {
            $authentication = $authName . ':' . $authPass;
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($curl, CURLOPT_USERPWD, $authentication);
        }

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

        $data = curl_exec($curl);
        
        curl_close($curl);

        if ($responseIsJson) {
            $data = json_decode($data);
        }

        return $data;
    }
}