<?php
     if($peticionAjax){
         require_once '../Config/mainModelo.php';
     }else{
         require_once './Config/mainModelo.php';
     }
     class productoModelo extends mainModelo{
         protected function agregarProductoModelo($datos){
             $state = mainModelo::Conectar()-> prepare("INSERT INTO producto (nombre) VALUES (:nombre)");
             $state -> bindParam(":nombre",$datos['nombre']);
             $state -> execute();
             return $state;
         }
     }