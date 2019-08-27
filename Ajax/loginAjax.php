<?php
     $peticionAjax = true;
     require_once "../Config/confGeneral.php";
     if(isset($_GET['token'])){
         require_once "../Controllers/ControlerLogin.php";
         $logout = new loginControlador();
         echo $logout-> cerrarSesionControlador();
     }else{
         session_start(['name' => 'SER']);
         session_destroy();
         echo '<script> window.location.href="'.SERVERURL.'login/" </script>';
     }