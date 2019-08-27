<?php
     if($peticionAjax){
        require_once '../Models/ModelProducto.php';
     }else{
         require_once './Models/ModelProducto.php';
     }
     class productoControlador extends productoModelo{
        public function agregarProductoControlador(){
             $nombre = mainModelo::limpiarCadena($_POST['producto-reg']);
             if($nombre == ""){
                 $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "ERROR",
                    "Texto" => "Ingrese el nombre del Producto",
                    "Tipo" => "error"
                 ];
             }else{
                 $dataProducto = [
                     "nombre" => $nombre
                 ];
                 $guardarProducto = productoModelo::agregarProductoModelo($dataProducto);
                 if($guardarProducto->rowCount()>=1){
                     $alerta = [
                     "Alerta" => "limpiar",
                     "Titulo" => "OK",
                     "Texto" => "PRODUCTO REGISTRADO CON ÉXITO",
                     "Tipo" => "success"
                     ];
                 }else{
                     $alerta = [
                     "Alerta" => "simple",
                     "Titulo" => "ERROR",
                     "Texto" => "No se agregaron los datos del producto",
                     "Tipo" => "error"
                     ];
                 }
             }
             return mainModelo::sweetAlert($alerta);
        }
     }