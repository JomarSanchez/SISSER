<?php
     if($peticionAjax){
        require_once '../Config/mainModelo.php';
     }else{
         require_once './Config/mainModelo.php';
     }

     class loginModelo  extends mainModelo{
          protected function iniciarSesionModelo($datos){
             $state = mainModelo::Conectar()->prepare("SELECT * FROM cuenta WHERE usuario = :usuario AND clave = :clave AND estado ='Activo'");
             $state -> bindParam(":usuario",$datos['usuario']);
             $state -> bindParam(":clave",$datos['clave']);
             $state -> execute();
             return $state;
          }
          protected function cerrarSesionModelo($datos){
             if($datos['usuario'] != "" && $datos['token_s'] == $datos['token']){
                 $actuBitacora = mainModelo::actualizarBitacora($datos['codigo'],$datos['hora']);
                     if($actuBitacora->rowCount()==1){
                         session_unset();
                         session_destroy();
                         $respuesta = "true";
                     }else{
                         $respuesta = "false";
                     }
             }else{
                $respuesta = "false";
             }
             return $respuesta; 
          }
     }