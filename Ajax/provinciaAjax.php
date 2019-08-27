<?php
     require_once "../Controllers/ControlerPsicologo.php";
     require_once "../Models/ModelPsicologo.php";

     class ajaxListado{
            /*=============================================
        TRAER PROVINCIA DE ACUERDO AL DEPARTAMENTO
        =============================================*/	

        public $idDepartamento;

        public function ajaxTraerDepartamento(){

            $item = "iddepartamento";
            $valor = $this->idDepartamento;

            $respuesta = psicologoControlador::mostrarProvinciaControlador($item, $valor);

            var_dump($respuesta);

        }
     }
     