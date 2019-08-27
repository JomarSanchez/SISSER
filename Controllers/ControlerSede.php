<?php
     if($peticionAjax){
        require_once '../Models/ModelSede.php';
     }else{
         require_once './Models/ModelSede.php';
     }
     class sedeControlador extends sedeModelo{
        public function agregarSedeControlador(){
             $nombre = mainModelo::limpiarCadena($_POST['nombre-reg']);
             if($nombre == ""){
                 $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "ERROR",
                    "Texto" => "Ingrese el nombre del Sede",
                    "Tipo" => "error"
                 ];
             }else{
                     $dataSede = [
                         "nombre" => $nombre
                     ];
                     $guardarSede = sedeModelo::agregarSedeModelo($dataSede);
                     if($guardarSede->rowCount()>=1){
                         $alerta = [
                            "Alerta" => "limpiar",
                            "Titulo" => "OK",
                            "Texto" => "SEDE REGISTRADO CON ÉXITO",
                            "Tipo" => "success"
                         ];
                     }else{
                         $alerta = [
                            "Alerta" => "simple",
                            "Titulo" => "ERROR",
                            "Texto" => "No se agregaron los datos del sede",
                            "Tipo" => "error"
                         ];
                     }
             }
             return mainModelo::sweetAlert($alerta);
        }
     }