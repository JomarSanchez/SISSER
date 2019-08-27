<?php
     $peticionAjax = true;
     require_once "../Config/confGeneral.php";
     if(isset($_POST['dni-reg']) || isset($_POST['codigo-del']) || isset($_POST['cuenta-up'])){
         require_once "../Controllers/ControlerAdministrador.php";
         $insAdmin = new administradorControlador();
             if(isset($_POST['dni-reg']) && isset($_POST['nombre-reg']) && isset($_POST['apellido-reg']) && isset($_POST['usuario-reg'])){
                 echo $insAdmin->agregarAdministradorControlador();
             }
             if(isset($_POST['codigo-del']) && isset($_POST['privilegio-admin'])){
                 echo $insAdmin -> eliminarAdministradorControlador();
             }
             if(isset($_POST['cuenta-up']) && isset($_POST['dni-up'])){
                 echo $insAdmin -> editarDatosAdminControlador();
             }
     }else{
         session_start(['name' => 'SER']);
         session_destroy();
         echo '<script> window.location.href="'.SERVERURL.'login/" </script>';
     }