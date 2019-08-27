<?php
     $peticionAjax = true;
     require_once "../Config/confGeneral.php";
     if(isset($_POST['producto-reg'])){
         require_once "../Controllers/ControlerProducto.php";
         $insProducto = new productoControlador();
             if(isset($_POST['producto-reg'])){
                 echo $insProducto->agregarProductoControlador();
             }
     }else{
         session_start(['name' => 'SER']);
         session_destroy();
         echo '<script> window.location.href="'.SERVERURL.'login/" </script>';
     }