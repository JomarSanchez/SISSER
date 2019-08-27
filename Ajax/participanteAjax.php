<?php
     $peticionAjax = true;
     require_once "../Config/confGeneral.php";
     if(isset($_POST['dni-reg'])){
         require_once "../Controllers/ControlerParticipante.php";
         $insParticipante = new participanteControlador();
             if(isset($_POST['dni-reg']) && isset($_POST['nombre-reg']) && isset($_POST['apellidoPa-reg'])){
                 echo $insParticipante->agregarParticipanteControlador();
                 var_dump($insParticipante);
             }
     }else{
         session_start(['name' => 'SER']);
         session_destroy();
         echo '<script> window.location.href="'.SERVERURL.'login/" </script>';
     }