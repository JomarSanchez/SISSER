<?php
     require_once './Models/vistaModelo.php';
     class vistasControlador extends vistasModelo{
         public function obtenerPlantilla(){
            return require_once './Views/plantilla.php';
        }
         public function obtenerVistaControlador(){
             if(isset($_GET['vistas'])){
                 $ruta = explode("/",$_GET['vistas']);
                 $result = vistasModelo::obtenerVistaModelo($ruta[0]);
             }else{
                 $result = "login";
             }
             return $result;
         }

     }