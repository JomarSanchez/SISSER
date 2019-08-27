<?php
     if($peticionAjax){
        require_once '../Models/ModelPsicologo.php';
     }else{
         require_once './Models/ModelPsicologo.php';
     }
     class psicologoControlador extends psicologoModelo{
        public function agregarPsicologoControlador(){
             $nombre = mainModelo::limpiarCadena($_POST['nombre-reg']);
             if($nombre == ""){
                 $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "ERROR",
                    "Texto" => "Ingrese el nombre del Psicologo (a)",
                    "Tipo" => "error"
                 ];
             }else{
                     $dataPsicologo = [
                         "nombre" => $nombre
                     ];
                     $guardarPsicologo = psicologoModelo::agregarPsicologoModelo($dataPsicologo);
                     if($guardarPsicologo->rowCount()>=1){
                         $alerta = [
                            "Alerta" => "limpiar",
                            "Titulo" => "OK",
                            "Texto" => "PSICOLOGO (a) REGISTRADO CON ÉXITO",
                            "Tipo" => "success"
                         ];
                     }else{
                         $alerta = [
                            "Alerta" => "simple",
                            "Titulo" => "ERROR",
                            "Texto" => "No se agregaron los datos del psicologo",
                            "Tipo" => "error"
                         ];
                     }
             }
             return mainModelo::sweetAlert($alerta);
        }
        
         public function mostrarPsicologoControlador($item,$valor){
            $tabla = "psicologo";
            $respuesta = psicologoModelo::mostrarPsicologoModelo($tabla,$item,$valor);
            return $respuesta;
         }
         public function mostrarProductoControlador($item,$valor){
            $tabla = "producto";
            $respuesta = psicologoModelo::mostrarProductoModelo($tabla,$item,$valor);
            return $respuesta;
         }
         public function mostrarSedeControlador($item,$valor){
            $tabla = "sede";
            $respuesta = psicologoModelo::mostrarSedeModelo($tabla,$item,$valor);
            return $respuesta;
         }
         public function mostrarServicioControlador($item,$valor){
            $tabla = "servicio";
            $respuesta = psicologoModelo::mostrarServicioModelo($tabla,$item,$valor);
            return $respuesta;
         }
         public function mostrarEstadoControlador($item,$valor){
            $tabla = "estado";
            $respuesta = psicologoModelo::mostrarEstadoModelo($tabla,$item,$valor);
            return $respuesta;
         }
         public function mostrarDepartamentoControlador(){
            $tabla = "departamento";
            $respuesta = psicologoModelo::mostrarDepartamentoModelo($tabla);
            return $respuesta;
         }
         public function mostrarProvinciaControlador($iddepartamento){
            $iddepartamento = mainModelo::limpiarCadena($_POST['departamento-reg']);
            $tabla = "provincia";
            $respuesta = psicologoModelo::mostrarProvinciaModelo($tabla,$iddepartamento);
            return $respuesta;
         }
         public function mostrarDistritoControlador($item,$valor){
            $tabla = "distrito";
            $respuesta = psicologoModelo::mostrarDistritoModelo($tabla,$item,$valor);
            return $respuesta;
         }
     }