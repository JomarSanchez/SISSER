 <div class="container-fluid">
	 <div class="page-header">
	 	 <h1 class="text-titles"><i class="zmdi zmdi-settings zmdi-hc-fw"></i> MI CUENTA</small></h1>
	 </div>
	 <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse voluptas reiciendis tempora voluptatum eius porro ipsa quae voluptates officiis sapiente sunt dolorem, velit quos a qui nobis sed, dignissimos possimus!</p>
 </div>
 <?php 
	 $datos = explode("/",$_GET['vistas']);
 		 if(isset($datos[1]) && ($datos[1] == "admin" || $datos[1] == "user")){
			 require_once './Controllers/ControlerCuenta.php';
			 $instCuenta = new cuentaControlador();
			 $filaCuenta = $instCuenta->datosCuentaControlador($datos[2],$datos[1]);
			 if($filaCuenta->rowCount()==1){
				 $campos = $filaCuenta->fetch();
 ?>
				 <!-- Panel mi cuenta -->
				 	 <div class="container-fluid">
						 <div class="panel panel-success">
							 <div class="panel-heading">
							 	 <h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; MI CUENTA</h3>
							 </div>
							 <div class="panel-body">
								 <form action="<?php echo SERVERURL;?>Ajax/cuentaAjax.php" method="POST" data-form="update" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
								 <?php
									 if($_SESSION['codigoCuenta_ser'] != $campos['codigo']){
										 if($_SESSION['tipo_ser'] != "Administrador" || $_SESSION['privilegio_ser'] <1 || $_SESSION['privilegio_ser'] > 2 ){
											 echo $loginCon -> cerrarSessionLogin();
									     }else{
											 echo '<input type="hidden" name="privilegio-up" value="verdadero">';
										 }
									 }
								 ?>
								 <input type="hidden" name="codigo-up" value="<?php echo $datos[2];?>">
								 <input type="hidden" name="tipoCuenta-up" value="<?php echo $loginCon->encryption($datos[2]);?>">
									 <fieldset>
										 <legend><i class="zmdi zmdi-key"></i> &nbsp; Datos de la cuenta</legend>
											 <div class="container-fluid">
												 <div class="row">
													 <div class="col-xs-12 col-sm-6">
														 <div class="form-group label-floating">
															 <label class="control-label">Nombre de usuario *</label>
															 <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,15}" class="form-control" type="text" name="usuario-up" required="" value="<?php echo $campos['usuario'] ?>" maxlength="15">
														 </div>
													 </div>
													 <div class="col-xs-12 col-sm-6">
														 <div class="form-group label-floating">
															 <label class="control-label">E-mail</label>
															 <input class="form-control" type="email" name="email-up" value="<?php echo $campos['email'] ?>" maxlength="50">
														 </div>
													 </div>
													 <div class="col-xs-12 col-sm-6">
														 <div class="form-group">
															 <label class="control-label">Genero</label>
															 <div class="radio radio-primary">
																 <label>
																 <input type="radio" name="optionsGenero-up" <?php if($campos['genero']=="Masculino"){echo 'checked=""';};?> id="optionsRadios1" value="Masculino">
																 <i class="zmdi zmdi-male-alt"></i> &nbsp; Masculino
																 </label>
															 </div>
															 <div class="radio radio-primary">
																 <label>
																 <input type="radio" name="optionsGenero-up" <?php if($campos['genero']=="Femenino"){echo 'checked=""';};?> id="optionsRadios2" value="Femenino">
																 <i class="zmdi zmdi-female"></i> &nbsp; Femenino
																 </label>
															 </div>
														 </div>
													 </div>
													 <?php if($_SESSION['tipo_ser'] == "Administrador" && $_SESSION['privilegio_ser']==1 && $campos['id'] != 1): ?>
													 <div class="col-xs-12 col-sm-6">
														 <div class="form-group">
															 <label class="control-label">Estado de cuenta</label>
															 <div class="radio radio-primary">
																 <label>
																 <input type="radio" name="estadoCuenta-up" id="optionsRadios1" <?php if($campos['estado']=="Activo"){echo 'checked=""';};?> value="Activo">
																 <i class="zmdi zmdi-circle-o"></i> &nbsp; Activo
																 </label>
															 </div>
															 <div class="radio radio-primary">
																 <label>
																 <input type="radio" name="estadoCuenta-up" id="optionsRadios2" value="Deshabilitado" <?php if($campos['estado']=="Deshabilitado"){echo 'checked=""';};?>>
																 <i class="zmdi zmdi-block"></i> &nbsp; Deshabilitado
																 </label>
															 </div>
														 </div>
													 </div>
													 <?php endif;?>
												 </div>
											 </div>
									 </fieldset>
									 <br>
									 <fieldset>
										 <legend><i class="zmdi zmdi-lock"></i> &nbsp; Actualizar Contraseña</legend>
											 <p>
												Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo minima cupiditate tempore nobis. Dolor, blanditiis, mollitia. Alias fuga fugiat molestias debitis odit, voluptatibus explicabo quia sequi doloremque numquam dignissimos quis.
											 </p>
											 <div class="container-fluid">
												 <div class="row">
													 <div class="col-xs-12 col-sm-6">
														 <div class="form-group label-floating">
															 <label class="control-label">Nueva contraseña *</label>
															 <input class="form-control" type="password" name="newPassword1-up"  maxlength="70">
														 </div>
													 </div>
													 <div class="col-xs-12 col-sm-6">
														 <div class="form-group label-floating">
															 <label class="control-label">Repita la nueva contraseña *</label>
															 <input class="form-control" type="password" name="newPassword2-up"  maxlength="70">
														 </div>
													 </div>
												 </div>
											 </div>
									 </fieldset>
									 <br>
									 <?php if($_SESSION['tipo_ser'] == "Administrador" && $_SESSION['privilegio_ser']==1 && $campos['id']!= 1 && $campos['tipo'] == "Administrador" && $datos[1] == "admin") : ?>
									 <fieldset>
										 <legend><i class="zmdi zmdi-star"></i> &nbsp; Nivel de privilegios</legend>
											 <div class="container-fluid">
												 <div class="row">
													 <div class="col-xs-12 col-sm-6">
														 <p class="text-left">
															 <div class="label label-success">Nivel 1</div> Control total del sistema
														 </p>
														 <p class="text-left">
															 <div class="label label-primary">Nivel 2</div> Permiso para registro y actualización
														 </p>
														 <p class="text-left">
														 	 <div class="label label-info">Nivel 3</div> Permiso para registro
														 </p>
													 </div>
													 <div class="col-xs-12 col-sm-6">
														 <div class="radio radio-primary">
															 <label>
																 <input type="radio" name="optionsPrivilegio-up" id="optionsRadios1" value="<?php echo $loginCon->encryption(1);?>" <?php if($campos['privilegio']== 1){echo 'checked=""';};?>>
																 <i class="zmdi zmdi-star"></i> &nbsp; Nivel 1
														 	 </label>
														 </div>
														 <div class="radio radio-primary">
															 <label>
																 <input type="radio" name="optionsPrivilegio-up" id="optionsRadios2" value="<?php echo $loginCon->encryption(2);?>" <?php if($campos['privilegio']== 2){echo 'checked=""';};?>>
																 <i class="zmdi zmdi-star"></i> &nbsp; Nivel 2
															 </label>
														 </div>
														 <div class="radio radio-primary">
															 <label>
																 <input type="radio" name="optionsPrivilegio-up" id="optionsRadios3" value="<?php echo $loginCon->encryption(3);?>" <?php if($campos['privilegio']== 3){echo 'checked=""';};?>>
																 <i class="zmdi zmdi-star"></i> &nbsp; Nivel 3
															 </label>
														 </div>
													 </div>
												 </div>
											</div>
									 </fieldset>
									 <br>
									 <?php  endif;?>
									 <fieldset>
										 <legend><i class="zmdi zmdi-account-circle"></i> &nbsp; Datos de la cuenta</legend>
										 <p>
											 Para poder actualizar los datos de la cuenta, por favor ingrese su nombre de usuario y contraseña.
										 </p> 
										 <div class="container-fluid">
												 <div class="row">
													 <div class="col-xs-12 col-sm-6">
														 <div class="form-group label-floating">
															 <label class="control-label">Nombre de usuario *</label>
															 <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,15}" class="form-control" type="text" name="usuario-log" required=""  maxlength="15">
														 </div>
													 </div>
													 <div class="col-xs-12 col-sm-6">
														 <div class="form-group label-floating">
															 <label class="control-label">Contraseña</label>
															 <input class="form-control" type="password" name="password-log"  maxlength="50">
														 </div>
													 </div>
												 </div>
											 </div>
									 </fieldset>
									 <p class="text-center" style="margin-top: 20px;">
										<button type="submit" class="btn btn-success btn-raised btn-sm"><i class="zmdi zmdi-refresh"></i> Actualizar</button>
									 </p>
									 <div class="RespuestaAjax"></div>
								 </form>
							 </div>
					 	 </div>
					 </div> 
 <?php
				 }else{
 ?>
					  <div class="container-fluid btn-danger">
						  <div class="row">
					 		 <h4 class="text-center">
							  <i class="zmdi zmdi-alert-circle zmdi-hc-5x"></i>
								 <p>ERROR</p>
								 <label for="">ACCESO RESTRINGIDO, REGRESE A SUS ACTIVIDADES</label>  
							 </h4>
				 		 </div>
			 		 </div>
 <?php
				 }
		 }else{
 ?>
			 <div class="container-fluid btn-danger">
				 <div class="row">
					 <h4 class="text-center">ERROR</h4>
				 </div>
			 </div>
			 
 <?php
		 }
 ?>		 