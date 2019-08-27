<?php
	 if($_SESSION['tipo_ser'] != "Administrador"){
		 echo $loginCon -> cerrarSessionLogin();
	 }
	 if($peticionAjax){
		require_once '../Controllers/ControlerPsicologo.php';
	 }else{
		 require_once './Controllers/ControlerPsicologo.php';
	 }
 ?>
 <div class="container-fluid">
 	 <div class="page-header">
	 	 <h1 class="text-titles"><i class="zmdi zmdi-redo zmdi-hc-fw"></i><small> PANEL CONSULTA</small></h1>
	 </div>
	 <p class="lead">SEÑORES ADMINISTRADORES ESTE PANEL SERA UNICAMENTE PARA REALIZAR CONSULTAS POR LOS CAMPOS MOSTRADOS EN LOS FORMULARIOS </p>
 </div> 

 <div class="container-fluid">
	 <ul class="breadcrumb breadcrumb-tabs">
		 <li>
			 <a href="<?php echo SERVERURL;?>consulta/" class="btn btn-info">
				 <i class="zmdi zmdi-search"></i> &nbsp; REALIZAR CONSULTA 
			 </a>
		 </li>
	 </ul>
 </div>

 <div class="container-fluid">
 	 <div class="panel panel-info">
	 	 <div class="panel-heading">
			 <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; CONSULTAR</h3>
		 </div>
		 <div class="panel-body">
		 <?php
			 require_once './Controllers/ControlerAdministrador.php';
			 $insAdmin = new administradorControlador();
			 	 if(isset($_POST['nombre-con'])){
					 $_SESSION['busquedaAdmin'] = $_POST['nombre-con'];
				 }

				 if(!isset($_SESSION['busquedaAdmin']) && empty($_SESSION['busquedaAdmin'])):

		 ?>
			 <form action="" method="POST"  autocomplete="off" >
			 	 <fieldset>	
					 <legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información personal</legend>
	 					 <div class="container-fluid">
	 						 <div class="row">
								 <div class="col-xs-12 col-sm-4">
								 	 <div class="form-group label-floating">
										 <label class="control-label">Buscar por Nombres </label>
									   	 <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombre-con" maxlength="30">
									 </div>
								 </div>
								 <div class="col-xs-12 col-sm-4">
								 	 <div class="form-group label-floating">
										 <label class="control-label">Buscar por Email </label>
									   	 <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,100}" class="form-control" type="email" name="email-con"  maxlength="100">
									 </div>
								 </div>
								 <div class="col-xs-12 col-sm-4">
								 	 <div class="form-group label-floating">
										 <label class="control-label">Buscar por Historial Clinico </label>
									   	 <input pattern="[0-9 ]{1,15}" class="form-control" type="text" name="hclinico-con" maxlength="15">
									 </div>
								 </div>
								 <div class="col-xs-12 col-sm-4">
									 <div class="form-group label-floating">
										 <label class="control-label">Producto</label>
										 <select name="producto-reg" class="form-control">
                                             <option value="0">Seleccione Producto</option>
									         <?php
                                                 $item = null;
                                                 $valor = null;
                                                 $producto = psicologoControlador::mostrarProductoControlador($item,$valor);
                                                 foreach ($producto as $key => $value) {
                                             ?>
                                                 <option value="<?php echo $value['id'];?>"> <?php echo $value['nombre']; ?></option>
                                             <?php
                                                 }
                                             ?>
									     </select>
									 </div>
								 </div>
								 <div class="col-xs-12 col-sm-4">
									 <div class="form-group label-floating">
										 <label class="control-label">TALLER</label>
										 <select name="taller-con" class="form-control">
                                             <option value="0">Seleccione Taller</option>
									         <?php
                                                 $item = null;
                                                 $valor = null;
                                                 $producto = psicologoControlador::mostrarServicioControlador($item,$valor);
                                                 foreach ($producto as $key => $value) {
                                             ?>
                                                 <option value="<?php echo $value['id'];?>"> <?php echo $value['nombre']; ?></option>
                                             <?php
                                                 }
                                             ?>
									     </select>
									 </div>
                                 </div>
								 <div class="col-xs-12 col-sm-4">
									 <div class="form-group">
										 <label class="control-label">Buscar por Edad</label>
											 <div class="radio radio-primary">
												 <label>
												 	 <input type="radio" name="optionsEdad" id="optionsRadios1" value="menor">
												 	 <i class="zmdi zmdi-chevron-left"></i> &nbsp; Menor que 18
												 </label>
											 </div>
											 <div class="radio radio-primary">
												 <label>
													 <input type="radio" name="optionsEdad" id="optionsRadios2" value="adulto">
													 <i class="zmdi zmdi-chevron-right"></i> &nbsp; Mayor que 18
												 </label>
											 </div>
									 </div>
				    			 </div>
							 </div>
						 </div>
				  </fieldset>
				  <div class="col-xs-12">
						<p class="text-center">
							<button type="submit" class="btn btn-danger btn-raised btn-sm"><i class="zmdi zmdi-search"></i> &nbsp; Buscar</button>
						</p>
					</div>
			 </form>
			 <?php
			 else:
		 	 ?>
			 <div class="container-fluid">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-search"></i> &nbsp; BUSCAR ADMINISTRADOR</h3>
				</div>
				<div class="panel-body">
					 <?php 
						 $pagina = explode("/",$_GET['vistas']);
						 echo $insAdmin -> paginadorAdministradorControlador($pagina[1],5,$_SESSION['privilegio_ser'],$_SESSION['codigoCuenta_ser'],$_SESSION['busquedaAdmin']);
					 ?>
				</div>
			</div>
		</div>
		 </div>
	 </div>
 </div>
 <?php
		endif; 
	 ?>