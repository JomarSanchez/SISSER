<!DOCTYPE html>
<html lang="es" encoding="UTF-8">
<head>
	<title><?php echo COMPANY; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo SERVERURL;?>Views/js/jquery-ui-1.12.1.custom/jquery-ui.css"/>
	<link rel="stylesheet" href="<?php echo SERVERURL;?>Views/css/main.css">
	
	<!-- Scripts -->
	<?php include './Views/includes/script.php';?>
	</head>
<body>
	 <?php 
	 	 $peticionAjax = false;
	 	 require_once "./Controllers/VistaControlador.php"; 
		 $views = new vistasControlador();
		  $retornar =  $views -> obtenerVistaControlador();
			  if($retornar =="login" || $retornar== "404"):
				 if($retornar == "login"){
					 require_once "./Views/app/login-view.php";
				 }else{
					require_once "./Views/app/404-view.php";
				 }
			 else :
				 session_start(['name' => 'SER']);
				 require_once './Controllers/ControlerLogin.php';
					 $loginCon = new loginControlador();
				 	 if(!isset($_SESSION['token_ser']) || !isset($_SESSION['usuario_ser'])){
						 echo $loginCon -> cerrarSessionLogin();
					  }
	 ?>
	 <!-- Lado Lateral -->
     <?php include './Views/includes/lateral.php'; ?>
	 <!-- Content page-->
	 <section class="full-box dashboard-contentPage">
		 <!-- Buscador  -->
             <?php include './Views/includes/buscador.php'; ?>
		<!-- Contenido dinamico -->
		<?php  require_once $retornar; ?>
	 </section>
	 <?php 
		 include './Views/includes/logoutScript.php';
		 endif; 
	 ?>
	 <script>
    	 $.material.init();
	 </script>
</body>
</html>