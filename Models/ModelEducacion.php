 <?php
     if($peticionAjax){
         require_once '../Config/mainModelo.php';
     }else{
         require_once './Config/mainModelo.php';
     }
     class educacionModelo extends mainModelo{
        protected function agregarEducacionModelo($datos){
           $state = mainModelo::Conectar()-> prepare("INSERT INTO educacion (dni,nombre,apellidoPaterno,apellidoMaterno,genero,fNacimiento,edad,iddepartamento,direccion,email,celular,codigoProducto,codigoServicio,codigoSede,codigoPsicologo,hclinica,observacion) VALUES (:dni,:nombre,:apellidoPaterno,:apellidoMaterno,:genero,:fNacimiento,:edad,:iddepartamento,:direccion,:email,:celular,:codigoProducto,:codigoServicio,:codigoSede,:codigoPsicologo,:hclinica,:observacion)");
           $state -> bindParam(":dni",$datos['dni']);
           $state -> bindParam(":nombre",$datos['nombre']);
           $state -> bindParam(":apellidoPaterno",$datos['apellidoPaterno']);
           $state -> bindParam(":apellidoMaterno",$datos['apellidoMaterno']);
           $state -> bindParam(":genero",$datos['genero']);
           $state -> bindParam(":fNacimiento",$datos['fNacimiento']);
           $state -> bindParam(":edad",$datos['edad']);
           $state -> bindParam(":iddepartamento",$datos['iddepartamento']);
           $state -> bindParam(":direccion",$datos['direccion']);
           $state -> bindParam(":email",$datos['email']);
           $state -> bindParam(":celular",$datos['celular']);
           $state -> bindParam(":codigoProducto",$datos['codigoProducto']);
           $state -> bindParam(":codigoServicio",$datos['codigoServicio']);
           $state -> bindParam(":codigoSede",$datos['codigoSede']);
           $state -> bindParam(":codigoPsicologo",$datos['codigoPsicologo']);
           $state -> bindParam(":hclinica",$datos['hclinica']);
           $state -> bindParam(":observacion",$datos['observacion']);
           $state -> execute();
           return $state;
        }
    }