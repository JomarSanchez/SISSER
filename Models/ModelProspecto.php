<?php
     if($peticionAjax){
         require_once '../Config/mainModelo.php';
     }else{
         require_once './Config/mainModelo.php';
     }
     class prospectoModelo extends mainModelo{
        protected function agregarProspectoModelo($datos){
           $state = mainModelo::Conectar()-> prepare("INSERT INTO prospecto (nombre,apellidoPaterno,apellidoMaterno,genero,email,celular,estado,codigoProducto,codigoSede,observacion) VALUES (:nombre,:apellidoPaterno,:apellidoMaterno,:genero,:email,:celular,:estado,:codigoProducto,:codigoSede,:observacion)");
           $state -> bindParam(":nombre",$datos['nombre']);
           $state -> bindParam(":apellidoPaterno",$datos['apellidoPaterno']);
           $state -> bindParam(":apellidoMaterno",$datos['apellidoMaterno']);
           $state -> bindParam(":genero",$datos['genero']);
           $state -> bindParam(":email",$datos['email']);
           $state -> bindParam(":celular",$datos['celular']);
           $state -> bindParam(":estado",$datos['estado']);
           $state -> bindParam(":codigoProducto",$datos['codigoProducto']);
           $state -> bindParam(":codigoSede",$datos['codigoSede']);
           $state -> bindParam(":observacion",$datos['observacion']);
           $state -> execute();
           return $state;
        }
    }