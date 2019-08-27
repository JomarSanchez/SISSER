<?php
	 if($_SESSION['tipo_ser'] != "Administrador"){
		 echo $loginCon -> redireccionarUsuarioControlador($_SESSION['tipo_ser']);
	 }
 ?>
 <div class="container-fluid">
     <div class="page-header">
         <h1 class="text-titles"> INICIO </h1>
     </div>
 </div>
 <?php
     require './Controllers/ControlerAdministrador.php';
     $instanciaAdmin = new administradorControlador();
     $countAdmin = $instanciaAdmin->mostrarDatosAdminControlador("conteo",0);
 ?>
 <div class="full-box text-center" style="padding: 30px 10px;">
     <article class="full-box tile">
         <a href="<?php echo SERVERURL;?>admin/">
             <div class="full-box tile-title text-center text-titles text-uppercase">
                ADMINISTRADORES
             </div>
             <div class="full-box tile-icon text-center">
                 <i class="zmdi zmdi-account"></i>
             </div>
             <div class="full-box tile-number text-titles">
                 <p class="full-box"><?php echo $countAdmin->rowCount();?></p>
                     <small>Registros</small>
             </div>
         </a>
     </article>
     <article class="full-box tile">
         <a href="<?php echo SERVERURL;?>prospecto/">
             <div class="full-box tile-title text-center text-titles text-uppercase">
                 PROSPECTOS 
             </div>
             <div class="full-box tile-icon text-center">
                 <i class="zmdi zmdi-male-alt"></i>
             </div>
             <div class="full-box tile-number text-titles">
                 <p class="full-box"><?php echo $countAdmin->rowCount();?></p>
                     <small>Registros</small>
             </div>
         </a>
     </article>
     <article class="full-box tile">
         <a href="<?php echo SERVERURL;?>postulantes/">
             <div class="full-box tile-title text-center text-titles text-uppercase">
                 POSTULANTES
             </div>
             <div class="full-box tile-icon text-center">
                 <i class="zmdi zmdi-face"></i>
             </div>
             <div class="full-box tile-number text-titles">
                 <p class="full-box">70</p>
                     <small>Registros</small>
             </div>
         </a>
     </article>
 </div>