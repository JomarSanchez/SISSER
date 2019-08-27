 <?php
     if($peticionAjax){
        require_once '../Models/ModelServicio.php';
     }else{
         require_once './Models/ModelServicio.php';
     }
     class servicioControlador extends servicioModelo{
        public function agregarServicioControlador(){
             $nombre = mainModelo::limpiarCadena($_POST['servicio-reg']);
             if($nombre == ""){
                 $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "ERROR",
                    "Texto" => "Ingrese el nombre del Servicio",
                    "Tipo" => "error"
                 ];
             }else{
                     $dataServicio = [
                         "nombre" => $nombre
                     ];
                     $guardarServicio = servicioModelo::agregarServicioModelo($dataServicio);
                     if($guardarServicio->rowCount()>=1){
                         $alerta = [
                            "Alerta" => "limpiar",
                            "Titulo" => "OK",
                            "Texto" => "SERVICIO REGISTRADO CON ÉXITO",
                            "Tipo" => "success"
                         ];
                     }else{
                         $alerta = [
                            "Alerta" => "simple",
                            "Titulo" => "ERROR",
                            "Texto" => "No se agregaron los datos del servicio",
                            "Tipo" => "error"
                         ];
                     }
             }
             return mainModelo::sweetAlert($alerta);
        }
     }