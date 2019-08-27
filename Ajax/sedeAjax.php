<?php
     $peticionAjax = true;
     require_once "../Config/confGeneral.php";
     if(isset($_POST['nombre-reg'])){
         require_once "../Controllers/ControlerSede.php";
         $insSede = new sedeControlador();
             if(isset($_POST['nombre-reg'])){
                 echo $insSede->agregarSedeControlador();
             }
     }else{
         session_start(['name' => 'SER']);
         session_destroy();
         echo '<script> window.location.href="'.SERVERURL.'login/" </script>';
     }