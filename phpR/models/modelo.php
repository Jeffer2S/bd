<?php
class EnlacesPaginas{
    public static function enlacesPaginas($enlaceModel){
        if($enlaceModel=="nosotros"||$enlaceModel=="servicios"||$enlaceModel=="contactanos"){
            $module = "views/interfaces/".$enlaceModel.".php";
        }else{
            $module = "views/interfaces/inicio.php";
        }
        return $module;
    }


}