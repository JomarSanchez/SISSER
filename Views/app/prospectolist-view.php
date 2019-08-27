 <?php
	 if($_SESSION['tipo_ser'] != "Administrador"){
		 echo $loginCon -> cerrarSessionLogin();
	 }
 ?>
 <div class="container-fluid">
	 <div class="page-header">
	     <h1 class="text-titles">
             <i class="zmdi zmdi-male-alt zmdi-hc-fw"></i> Lista <small>PROSPECTO</small>
         </h1>
	 </div>
	 <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse voluptas reiciendis tempora voluptatum eius porro ipsa quae voluptates officiis sapiente sunt dolorem, velit quos a qui nobis sed, dignissimos possimus! </p>
 </div>

 <div class="container-fluid">
	 <ul class="breadcrumb breadcrumb-tabs">
	     <li>
			 <a href="<?php echo SERVERURL;?>prospecto/" class="btn btn-info">
			  	 <i class="zmdi zmdi-plus"></i> &nbsp; NUEVO PROSPECTO
			 </a>
		 </li>
		 <li>
			 <a href="<?php echo SERVERURL;?>prospectolist/" class="btn btn-success">
			  	 <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE PROSPECTOS
			 </a>
		 </li>
		 <li>
			 <a href="<?php echo SERVERURL;?>prospectosearch/" class="btn btn-primary">
			  	 <i class="zmdi zmdi-search"></i> &nbsp; BUSCAR PROSPECTO
			 </a>
		 </li>
	 </ul>
 </div>
 <?php
			 require_once './Controllers/ControlerProspecto.php';
			 $insProspec = new prospectoControlador();
		 ?>
		<!-- Panel listado de categorias -->
		<div class="container-fluid">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE PROSPECTOS</h3>
				</div>
				<div class="panel-body">
					 <?php 
						 $pagina = explode("/",$_GET['vistas']);
						 echo $insProspec -> paginadorProspectoControlador($pagina[1],5,$_SESSION['privilegio_ser'],$_SESSION['codigoCuenta_ser'],"");
					 ?>
				</div>
			</div>
		</div>