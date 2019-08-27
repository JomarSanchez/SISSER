<?php
       require_once './Config/confGeneral.php';
       require_once './Controllers/VistaControlador.php';
       $plantilla = new vistasControlador();
       $plantilla -> obtenerPlantilla();
