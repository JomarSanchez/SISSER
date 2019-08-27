<?php
     if($peticionAjax){
         require_once '../Config/mainModelo.php';
     }else{
         require_once './Config/mainModelo.php';
     }
     class psicologoModelo extends mainModelo{
         protected function agregarPsicologoModelo($datos){
             $state = mainModelo::Conectar()-> prepare("INSERT INTO psicologo (nombre) VALUES (:nombre)");
             $state -> bindParam(":nombre",$datos['nombre']);
             $state -> execute();
             return $state;
         }
         protected function mostrarPsicologoModelo($tabla,$item,$valor){
            if($item != null){

                $state = mainModelo::Conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
    
                $state -> bindParam(":".$item, $valor, PDO::PARAM_STR);
    
                $state -> execute();
    
                return $state -> fetch();
    
            }else{
    
                $state = mainModelo::Conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");
    
                $state -> execute();
    
                return $state -> fetchAll();
    
            }
    
            $state -> close();
            
            $state = null;
         }
         protected function mostrarProductoModelo($tabla,$item,$valor){
            if($item != null){

                $state = mainModelo::Conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
    
                $state -> bindParam(":".$item, $valor, PDO::PARAM_STR);
    
                $state -> execute();
    
                return $state -> fetch();
    
            }else{
    
                $state = mainModelo::Conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");
    
                $state -> execute();
    
                return $state -> fetchAll();
    
            }
    
            $state -> close();
            
            $state = null;
         }
         protected function mostrarSedeModelo($tabla,$item,$valor){
            if($item != null){

                $state = mainModelo::Conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
    
                $state -> bindParam(":".$item, $valor, PDO::PARAM_STR);
    
                $state -> execute();
    
                return $state -> fetch();
    
            }else{
    
                $state = mainModelo::Conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");
    
                $state -> execute();
    
                return $state -> fetchAll();
    
            }
    
            $state -> close();
            
            $state = null;
         }
         protected function mostrarServicioModelo($tabla,$item,$valor){
            if($item != null){

                $state = mainModelo::Conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
    
                $state -> bindParam(":".$item, $valor, PDO::PARAM_STR);
    
                $state -> execute();
    
                return $state -> fetch();
    
            }else{
    
                $state = mainModelo::Conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");
    
                $state -> execute();
    
                return $state -> fetchAll();
    
            }
    
            $state -> close();
            
            $state = null;
         }
         protected function mostrarDepartamentoModelo($tabla){
             $state = mainModelo::Conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");
             $state -> execute();
             return $state -> fetchAll();
             $state -> close();
             $state = null;
         }
         protected function mostrarProvinciaModelo($tabla,$iddepartamento){    
             $state = mainModelo::Conectar()->prepare("SELECT * FROM $tabla WHERE iddepartamento = '$iddepartamento' ORDER BY id ASC");
             $state -> execute();
             while ($filas = $state -> fetch()) {
                  $html = "<option value='".$filas['id']."'>".$filas['provincia']."</option>";
             }
             echo $html;
         }
         protected function mostrarDistritoModelo($tabla,$item,$valor){
            if($item != null){

                $state = mainModelo::Conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item  ");
    
                $state -> bindParam(":".$item, $valor, PDO::PARAM_STR);
    
                $state -> execute();
    
                return $state -> fetch();
    
            }else{
    
                $state = mainModelo::Conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");
    
                $state -> execute();
    
                return $state -> fetchAll();
    
            }
    
            $state -> close();
            
            $state = null;
         }
         protected function mostrarEstadoModelo($tabla,$item,$valor){
            if($item != null){

                $state = mainModelo::Conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item  ");
    
                $state -> bindParam(":".$item, $valor, PDO::PARAM_STR);
    
                $state -> execute();
    
                return $state -> fetch();
    
            }else{
    
                $state = mainModelo::Conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");
    
                $state -> execute();
    
                return $state -> fetchAll();
    
            }
    
            $state -> close();
            
            $state = null;
         }
     }