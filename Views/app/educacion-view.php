<?php
 if($peticionAjax){
    require_once '../Controllers/ControlerPsicologo.php';
 }else{
     require_once './Controllers/ControlerPsicologo.php';
 }
 ?>
 <div class="container-fluid">
	 <div class="page-header">
	     <h1 class="text-titles">
             <i class="zmdi zmdi-male-alt zmdi-hc-fw"></i> Registro <small>EDUCACION</small>
         </h1>
	 </div>
	 <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse voluptas reiciendis tempora voluptatum eius porro ipsa quae voluptates officiis sapiente sunt dolorem, velit quos a qui nobis sed, dignissimos possimus! </p>
 </div>
 <div class="container-fluid">
	 <ul class="breadcrumb breadcrumb-tabs">
	     <li>
			 <a href="<?php echo SERVERURL;?>educacion" class="btn btn-info">
			  	 <i class="zmdi zmdi-plus"></i> &nbsp; NUEVO EDUCACION
			 </a>
		 </li>
		 <li>
			 <a href="<?php echo SERVERURL;?>educacionlist" class="btn btn-success">
			  	 <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE EDUCACIONS
			 </a>
		 </li>
		 <li>
			 <a href="<?php echo SERVERURL;?>educacionsearch" class="btn btn-primary">
			  	 <i class="zmdi zmdi-search"></i> &nbsp; BUSCAR EDUCACION
			 </a>
		 </li>
	 </ul>
 </div>

 <!-- Panel nuevo PARTICIPANTE -->
 <div class="container-fluid">
	 <div class="panel panel-info">
		 <div class="panel-heading">
		   	 <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO PRODUCTO</h3>
		 </div>
		 <div class="panel-body">
			 <form action="<?php echo SERVERURL;?>Ajax/educacionAjax.php" method="POST" data-form="save" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
				 <fieldset>
				     <legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información del PRODUCTO</legend>
				    	 <div class="container-fluid">
				    		 <div class="row">
							 	 <div class="col-xs-12 col-sm-6">
                                     <div class="form-group label-floating">
                                         <label class="control-label">DNI/CEDULA *</label>
                                         <input pattern="[0-9-]{1,8}" class="form-control" type="text" name="dni-reg" required="" maxlength="8">
                                     </div>
                                 </div>
                                 <div class="col-xs-12 col-sm-6">
                                     <div class="form-group label-floating">
                                         <label class="control-label">Nombres *</label>
                                         <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombre-reg" required="" maxlength="30">
                                     </div>
                                 </div>
                                 <div class="col-xs-12 col-sm-6">
                                     <div class="form-group label-floating">
                                         <label class="control-label">Apellido Paterno *</label>
                                         <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellidoPa-reg" required="" maxlength="30">
                                     </div>
                                 </div>
                                 <div class="col-xs-12 col-sm-6">
                                     <div class="form-group label-floating">
                                         <label class="control-label">Apellido Materno *</label>
                                         <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellidoMa-reg" required="" maxlength="30">
                                     </div>
                                 </div>
                                 <div class="col-xs-12 col-sm-6">
                                     <div class="form-group">
                                         <label class="control-label">Genero</label>
                                             <div class="radio radio-primary">
                                                 <label>
                                                     <input type="radio" name="optionsGenero" id="optionsRadios1" value="Masculino" checked="">
                                                     <i class="zmdi zmdi-male-alt"></i> &nbsp; Masculino
                                                 </label>
                                             </div>
                                             <div class="radio radio-primary">
                                                 <label>
                                                     <input type="radio" name="optionsGenero" id="optionsRadios2" value="Femenino">
                                                     <i class="zmdi zmdi-female"></i> &nbsp; Femenino
                                                 </label>
                                             </div>
                                     </div>
                                 </div>
				    			 <div class="col-xs-12 col-sm-6">
									 <div class="form-group label-floating">
										 <label class="control-label">Fecha Nacimiento *</label>
										 <input class="form-control" type="text" id="fnacimiento" name="fecnacimieto-reg" readonly >
									 </div>
                                 </div>
								 <div class="col-xs-12 col-sm-2">
									 <div class="form-group label-floating is-empty" id="lflo">
										 <label class="control-label">Edad</label>
										 <input type="text" class="form-control edad" id="edad" name="edad-reg" readonly >
									 </div>
                                 </div>
                                 <div class="col-xs-12 col-sm-6">
                                     <div class="form-group label-floating">
                                         <label class="control-label">Departamento *</label>
                                             <select name="departamento-reg" class="form-control" id="departamento" >
												 <option value="0">Seleccione Departamento</option>
												 <?php
													 $departamento = psicologoControlador::mostrarDepartamentoControlador();
													 foreach ($departamento as $key => $value) {
												 ?>
													 <option value="<?php echo $value['id'];?>"> <?php echo $value['departamento']; ?></option>
												 <?php
													 }
												 ?>
									     	 </select>
                                     </div>
                                 </div>
                                 <div class="col-xs-12 col-sm-6">
                                     <div class="form-group label-floating ">
                                         <label class="control-label">Provincia *</label>
                                         <select name="provincia-reg" id="provincia" class="form-control">
                                             <option value="0">Seleccione Provincia</option>
                                         </select>
                                     </div>
                                 </div>
                                 <div class="col-xs-12 col-sm-6">
                                     <div class="form-group label-floating ">
                                         <label class="control-label">Distrito *</label>
                                         <select name="distrito-reg" id="distrito" class="form-control">
                                             <option value="0">Seleccione Distrito</option>
												 <?php
												 	 $item = null;
													 $valor = null;
													 $distrito = psicologoControlador::mostrarDistritoControlador($item,$valor);
													 foreach ($distrito as $key => $value) {
												 ?>
													 <option value="<?php echo $value['id'];?>"> <?php echo $value['distrito']; ?></option>
												 <?php
													 }
												 ?>
                                         </select>
                                     </div>
                                 </div>
								 <div class="col-xs-12 col-sm-6">
                                     <div class="form-group label-floating">
                                         <label class="control-label">Dirección *</label>
                                         <input name="direccion-reg" class="form-control" type="text" required="" maxlength="100">
                                     </div>
                                 </div>
                                 <div class="col-xs-12 col-sm-6">
                                     <div class="form-group label-floating">
                                         <label class="control-label">E-mail *</label>
                                         <input class="form-control" type="email" name="email-reg" maxlength="50">
                                     </div>
                                 </div>
                                 <div class="col-xs-12 col-sm-6">
                                     <div class="form-group label-floating">
                                         <label class="control-label">Teléfono / Celular </label>
                                         <input pattern="[0-9+]{1,15}" class="form-control" type="text" name="celular-reg" maxlength="15">
                                     </div>
                                 </div>
                                 <div class="col-xs-12 col-sm-6">
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
                                 <div class="col-xs-12 col-sm-6">
									 <div class="form-group label-floating">
										 <label class="control-label">Servicio</label>
										 <select name="servicio-reg" class="form-control">
                                             <option value="0">Seleccione Servicio</option>
									         <?php
                                                 $item = null;
                                                 $valor = null;
                                                 $servicio = psicologoControlador::mostrarServicioControlador($item,$valor);
                                                 foreach ($servicio as $key => $value) {
                                             ?>
                                                 <option value="<?php echo $value['id'];?>"> <?php echo $value['nombre']; ?></option>
                                             <?php
                                                 }
                                             ?>
									     </select>
									 </div>
                                 </div>
                                 <div class="col-xs-12 col-sm-6">
									 <div class="form-group label-floating">
										 <label class="control-label">Sede</label>
										 <select name="sede-reg" class="form-control">
                                             <option value="0">Seleccione Sede</option>
									         <?php
                                                 $item = null;
                                                 $valor = null;
                                                 $sede = psicologoControlador::mostrarSedeControlador($item,$valor);
                                                 foreach ($sede as $key => $value) {
                                             ?>
                                                 <option value="<?php echo $value['id'];?>"> <?php echo $value['nombre']; ?></option>
                                             <?php
                                                 }
                                             ?>
									     </select>
									 </div>
                                 </div>
                                 <div class="col-xs-12 col-sm-6">
									 <div class="form-group label-floating">
										 <label class="control-label">Psicologo / a</label>
										 <select name="psicologo-reg" id="psicologo-reg" class="form-control">
                                         <option value="0">Selecionar Psicologo</option>
                                             <?php
                                                 $item = null;
                                                 $valor = null;
                                                 $p = psicologoControlador::mostrarPsicologoControlador($item,$valor);
                                                 foreach ($p as $key => $value) {
                                             ?>
                                                 <option value="<?php echo $value['id'];?>"> <?php echo $value['nombre']; ?></option>
                                             <?php
                                                 }
                                             ?>
									     </select>
									 </div>
                                 </div>
								 <div class="col-xs-12 col-sm-6">
                                     <div class="form-group label-floating">
                                         <label class="control-label">Historia Clinica </label>
                                         <input pattern="[0-9+]{1,20}" class="form-control" type="hclinica" name="hclinica-reg" maxlength="20">
                                     </div>
								 </div>
								 <div class="col-xs-12">
								     <div class="form-group label-floating">
									     <label class="control-label">Observación</label>
										 <textarea name="observacion-reg" class="form-control" rows="2" maxlength="500"></textarea>
								     </div>
				    		     </div>
				    		 </div>
				    	 </div>
				 </fieldset>
				 <br>
				 <p class="text-center" style="margin-top: 20px;">
					 <button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
				 </p>
				 <div class="RespuestaAjax"></div>
			 </form>
		 </div>
	 </div>
 </div>