<?php
     $peticionAjax = true;
     require_once "../Config/confGeneral.php";
     if(isset($_POST['fecnacimieto-reg'])){
         require_once "../Controllers/ControlerEducacion.php";
         $insEducacion = new educacionControlador();
             if(isset($_POST['fecnacimieto-reg'])){
                 echo $insEducacion->agregarEducacionControlador();
             }
     }else{
         session_start(['name' => 'SER']);
         session_destroy();
         echo '<script> window.location.href="'.SERVERURL.'login/" </script>';
     }