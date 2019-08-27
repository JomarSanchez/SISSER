 <?php
     $peticionAjax = true;
     require_once '../Config/confGeneral.php';
     if(isset($_POST['codigo-up'])){
         require_once '../Controllers/ControlerCuenta.php';
         $instCuenta = new cuentaControlador();
             if(isset($_POST['codigo-up']) && isset($_POST['tipoCuenta-up']) && isset($_POST['usuario-log']) && isset($_POST['password-log'])){
                  echo $instCuenta->actualizarCuentaControlador();
             }
     }else{
         session_start(['name' => 'SER']);
         session_destroy();
         echo '<script> window.location.href="'.SERVERURL.'login/" </script>';
     }