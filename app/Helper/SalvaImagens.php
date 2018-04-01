<?php

namespace App\Helper;

class SalvaImagens {
    //NECESSÁRIO PASSAR O PARÂMETRO $TIPO = RESIDENCIA OU USER
    public static function SalvaImagens($imagens, $codigo, $tipo) {
        if (!empty($imagens) && $tipo == "residencia"){
            $fotos = [];
            $i=1;
            foreach($imagens as $imagem){
                $ext = $imagem->getClientOriginalExtension();
                $imagem->storeAs(null, $codigo.'_foto_'.$i.'.'.$ext, 'fotos');
                $fotos[] = 'img/residenciasImagens/'.$codigo.'_foto_'.$i.'.'.$ext;
                $i++;
            }
            return json_encode($fotos);
        }elseif (!empty($imagens) && $tipo == "user"){
            $ext = $imagens->getClientOriginalExtension();
            $imagens->storeAs(null, $codigo.'_foto.'.$ext, 'users');
            $fotos = "img/usersImagens/".$codigo."_foto.".$ext;
            return $fotos;
        }else{
            $fotos = [];
        }
        return null;
    }
}