 <?php
     if($peticionAjax){
         require_once '../Config/mainModelo.php';
     }else{
         require_once './Config/mainModelo.php';
     }
     class servicioModelo extends mainModelo{
         protected function agregarServicioModelo($datos){
            $state = mainModelo::Conectar()-> prepare("INSERT INTO servicio (nombre) VALUES (:nombre)");
            $state -> bindParam(":nombre",$datos['nombre']);
            $state -> execute();
            return $state;
         }
     }