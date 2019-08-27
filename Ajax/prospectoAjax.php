<?php
     $peticionAjax = true;
     require_once "../Config/confGeneral.php";
     if(isset($_POST['nombre-reg'])){
         require_once "../Controllers/ControlerProspecto.php";
         $insProspecto = new prospectoControlador();
             if(isset($_POST['nombre-reg']) && isset($_POST['apellidoPa-reg'])){
                 echo $insProspecto->agregarProspectoControlador();
             }
     }else{
         session_start(['name' => 'SER']);
         session_destroy();
         echo '<script> window.location.href="'.SERVERURL.'login/" </script>';
     }