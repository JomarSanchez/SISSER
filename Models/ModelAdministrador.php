<?php
     if($peticionAjax){
         require_once '../Config/mainModelo.php';
     }else{
         require_once './Config/mainModelo.php';
     }

     class administradorModelo extends mainModelo{
         protected function agregarAdministradorModelo($datos){
            $state = mainModelo::Conectar()-> prepare("INSERT INTO administrador (dni,nombre,apellidos,celular,direccion,codigo) VALUES (:dni,:nombre,:apellidos,:celular,:direccion,:codigo)");
            $state -> bindParam(":dni",$datos['dni']);
            $state -> bindParam(":nombre",$datos['nombre']);
            $state -> bindParam(":apellidos",$datos['apellidos']);
            $state -> bindParam(":celular",$datos['celular']);
            $state -> bindParam(":direccion",$datos['direccion']);
            $state -> bindParam(":codigo",$datos['codigo']);
            $state -> execute();
            return $state;
         }
         protected function eliminarAdministradorModelo($codigo){
             $state = mainModelo::Conectar()->prepare("DELETE FROM administrador WHERE codigo = :codigo");
             $state -> bindParam(":codigo",$codigo);
             $state -> execute();
             return $state;
         }
         protected function mostrarDatosAdminModelo($tipo,$codigo){
             if($tipo=="unico"){
                 $state = mainModelo::Conectar()->prepare("SELECT * FROM administrador WHERE codigo = :codigo");
                 $state -> bindParam(":codigo",$codigo);
             }elseif($tipo == "conteo"){
                 $state = mainModelo::Conectar()->prepare("SELECT id FROM administrador WHERE id !='1'");
             }
             $state -> execute();
             return $state;
         }
         protected function editarDatosAdminModelo($datos){
             $state = mainModelo::Conectar()->prepare("UPDATE administrador SET dni=:dni, nombre = :nombre, apellidos = :apellidos, celular = :celular, direccion = :direccion WHERE codigo = :codigo");
             $state -> bindParam(":dni",$datos['dni']);
             $state -> bindParam(":nombre",$datos['nombre']);
             $state -> bindParam(":apellidos",$datos['apellidos']);
             $state -> bindParam(":celular",$datos['celular']);
             $state -> bindParam(":direccion",$datos['direccion']);
             $state -> bindParam(":codigo",$datos['codigo']);
             $state -> execute();
             return $state;

         }
     }