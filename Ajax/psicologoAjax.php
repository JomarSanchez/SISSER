 <?php
     $peticionAjax = true;
     require_once "../Config/confGeneral.php";
     if(isset($_POST['nombre-reg'])){
         require_once "../Controllers/ControlerPsicologo.php";
         $insPsicologo = new psicologoControlador();
             if(isset($_POST['nombre-reg'])){
                 echo $insPsicologo->agregarPsicologoControlador();
             }
     }else{
         session_start(['name' => 'SER']);
         session_destroy();
         echo '<script> window.location.href="'.SERVERURL.'login/" </script>';
     }