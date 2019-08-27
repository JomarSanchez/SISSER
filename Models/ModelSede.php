<?php
     if($peticionAjax){
         require_once '../Config/mainModelo.php';
     }else{
         require_once './Config/mainModelo.php';
     }
     class sedeModelo extends mainModelo{
         protected function agregarSedeModelo($datos){
             $state = mainModelo::Conectar()-> prepare("INSERT INTO sede (nombre) VALUES (:nombre)");
             $state -> bindParam(":nombre",$datos['nombre']);
             $state -> execute();
             return $state;
         }
     }