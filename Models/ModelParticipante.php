<?php
     if($peticionAjax){
         require_once '../Config/mainModelo.php';
     }else{
         require_once './Config/mainModelo.php';
     }
     class participanteModelo extends mainModelo{
         protected function agregarParticipanteModelo($datos){
           $state = mainModelo::Conectar()-> prepare("INSERT INTO participante (dni,nombres,apellidoPaterno,apellidoMaterno,sexo,fNacimiento,edad,lNacimiento,region,provincia,distrito,direccion,email,celular,codigoProducto,codigoServicio,codigoSede,codigoPsicologo,historiaClinica,observacion) VALUES (:dni,:nombres,:apellidoPaterno,:apellidoMaterno,:sexo,:fNacimiento,:edad,:lNacimiento,:region,:provincia,:distrito,:direccion,:email,:celular,:codigoProducto,:codigoServicio,:codigoSede,:codigoPsicologo,:historiaClinica,:observacion)");
           $state -> bindParam(":dni",$datos['dni']);
           $state -> bindParam(":nombres",$datos['nombres']);
           $state -> bindParam(":apellidoPaterno",$datos['apellidoPaterno']);
           $state -> bindParam(":apellidoMaterno",$datos['apellidoMaterno']);
           $state -> bindParam(":sexo",$datos['sexo']);
           $state -> bindParam(":fNacimiento",$datos['fNacimiento']);
           $state -> bindParam(":edad",$datos['edad']);
           $state -> bindParam(":lNacimiento",$datos['lNacimiento']);
           $state -> bindParam(":region",$datos['region']);
           $state -> bindParam(":provincia",$datos['provincia']);
           $state -> bindParam(":distrito",$datos['distrito']);
           $state -> bindParam(":direccion",$datos['direccion']);
           $state -> bindParam(":email",$datos['email']);
           $state -> bindParam(":celular",$datos['celular']);
           $state -> bindParam(":codigoProducto",$datos['codigoProducto']);
           $state -> bindParam(":codigoServicio",$datos['codigoServicio']);
           $state -> bindParam(":codigoSede",$datos['codigoSede']);
           $state -> bindParam(":codigoPsicologo",$datos['codigoPsicologo']);
           $state -> bindParam(":historiaClinica",$datos['historiaClinica']);
           $state -> bindParam(":observacion",$datos['observacion']);
           $state -> execute();
           return $state;
         }
         static public function mostrarPsicologoModelo($tabla,$item,$valor){
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
    }
