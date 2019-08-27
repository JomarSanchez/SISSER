 <?php
     $peticionAjax = true;
     require_once "../Config/confGeneral.php";
     if(isset($_POST['servicio-reg'])){
         require_once "../Controllers/ControlerServicio.php";
         $insServicio = new servicioControlador();
             if(isset($_POST['servicio-reg'])){
                 echo $insServicio->agregarServicioControlador();
             }
     }else{
         session_start(['name' => 'SER']);
         session_destroy();
         echo '<script> window.location.href="'.SERVERURL.'login/" </script>';
     }