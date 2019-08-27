 <div class="container-fluid">
	 <div class="page-header">
	     <h1 class="text-titles">
             <i class="zmdi zmdi-male-alt zmdi-hc-fw"></i> Registro <small>POSTULANTE</small>
         </h1>
	 </div>
	 <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse voluptas reiciendis tempora voluptatum eius porro ipsa quae voluptates officiis sapiente sunt dolorem, velit quos a qui nobis sed, dignissimos possimus! </p>
 </div>
 <div class="container-fluid">
	 <ul class="breadcrumb breadcrumb-tabs">
	     <li>
			 <a href="client.html" class="btn btn-info">
			  	 <i class="zmdi zmdi-plus"></i> &nbsp; NUEVO POSTULANTE
			 </a>
		 </li>
		 <li>
			 <a href="client-list.html" class="btn btn-success">
			  	 <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE POSTULANTES
			 </a>
		 </li>
		 <li>
			 <a href="client-search.html" class="btn btn-primary">
			  	 <i class="zmdi zmdi-search"></i> &nbsp; BUSCAR POSTULANTE
			 </a>
		 </li>
	 </ul>
 </div>
  <!-- Panel nuevo postulante -->
  <div class="container-fluid">
	 <div class="panel panel-info">
		 <div class="panel-heading">
			 <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO POSTULANTE</h3>
         </div>
         <div class="panel-body">
             <form>
                 <fieldset>
                     <legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información personal</legend>
                         <div class="container-fluid">
                             <div class="row">
                                 <div class="col-xs-12">
                                     <div class="form-group label-floating">
                                         <label class="control-label">DNI/CEDULA *</label>
                                             <input pattern="[0-9-]{1,30}" class="form-control" type="text" name="dni-reg" required="" maxlength="30">
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
                                         <label class="control-label">E-mail</label>
                                         <input class="form-control" type="email" name="email-reg" maxlength="50">
                                     </div>
                                 </div>
                                 <div class="col-xs-12 col-sm-6">
                                     <div class="form-group label-floating">
                                         <label class="control-label">Teléfono / Celular </label>
                                         <input pattern="[0-9+]{1,15}" class="form-control" type="text" name="telefono-reg" maxlength="15">
                                     </div>
                                 </div>
                                 <div class="col-xs-12 col-sm-6">
                                     <div class="form-group label-floating">
                                         <label class="control-label">Región *</label>
                                             <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="region-reg" required="" maxlength="30">
                                     </div>
                                 </div>
                                 <div class="col-xs-12 col-sm-6">
                                     <div class="form-group label-floating">
                                         <label class="control-label">Provincia *</label>
                                             <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="provincia-reg" required="" maxlength="30">
                                     </div>
                                 </div>
                                 <div class="col-xs-12 col-sm-6">
                                     <div class="form-group label-floating">
                                         <label class="control-label">Distrito *</label>
                                             <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="distrito-reg" required="" maxlength="30">
                                     </div>
                                 </div>
                                 <div class="col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Dirección *</label>
                                            <input name="direccion-reg" class="form-control" type="text" required="" maxlength="100">
                                    </div>
                                </div>
                                 <div class="col-xs-12 col-sm-6">
                                     <div class="form-group label-floating">
                                         <label class="control-label">Empresa que requiere </label>
                                             <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" class="form-control" type="text" name="empresa-reg" required="" maxlength="50">
                                     </div>
                                 </div>
                                 <div class="col-xs-12 col-sm-6">
									 <div class="form-group label-floating">
										 <label class="control-label">Cargo</label>
										 <select name="cargo-reg" class="form-control">
                                             <option value="0">Seleccione Cargo</option>
									         <option value="1">GERENTE</option>
									         <option value="2">JEFE</option>
									     </select>
									 </div>
                                 </div>
                                 <div class="col-xs-12 col-sm-6">
									 <div class="form-group label-floating">
										 <label class="control-label">Calificación</label>
										 <select name="calificacion-reg" class="form-control">
                                             <option value="0">Seleccione Calificación</option>
									         <option value="1">A</option>
                                             <option value="2">B</option>
									         <option value="3">C</option>
									     </select>
									 </div>
                                 </div>
                                 <div class="col-xs-12">
								     <div class="form-group label-floating">
									     <label class="control-label">Observación</label>
										 <textarea name="observacion-reg" class="form-control" rows="2" maxlength="100"></textarea>
								     </div>
				    		     </div>
                             </div>
                         </div>
                 </fieldset>
                 <br>
                 <p class="text-center" style="margin-top: 20px;">
                     <button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
                 </p>
             </form>
         </div>
	 </div>
 </div>