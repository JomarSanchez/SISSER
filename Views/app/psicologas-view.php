<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> PSICOLOGO (a) <small>MANTENIMIENTO</small></h1>
			</div>
			<p class="lead">Mantenimiento para ingresar psicologo (a)</p>
		</div>

		<div class="container-fluid">
			<ul class="breadcrumb breadcrumb-tabs">
			  	<li>
			  		<a href="<?php echo SERVERURL;?>psicologas" class="btn btn-info">
			  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO PSICOLOGO (a)
			  		</a>
			  	</li>
			  	<li>
			  		<a href="<?php echo SERVERURL;?>psicologaslist" class="btn btn-success">
			  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE PSICOLOGO (a)
			  		</a>
			  	</li>
			</ul>
		</div>

		<!-- Panel nuevo PSICOLOGO (A) -->
		<div class="container-fluid">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO PSICOLOGO (a)</h3>
				</div>
				<div class="panel-body">
					<form action="<?php echo SERVERURL;?>Ajax/psicologoAjax.php" method="POST" data-form="save" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
				    	<fieldset>
				    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información del psicologo (a)</legend>
				    		<div class="container-fluid">
				    			<div class="row">
				    				<div class="col-xs-12">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Nombre *</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ: ]{1,90}" class="form-control" type="text" name="nombre-reg" autofocus="true" maxlength="90">
										</div>
				    				</div>
				    			</div>
				    		</div>
				    	</fieldset>
				    	<br>
					    <p class="text-center" style="margin-top: 20px;">
					    	<button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
						</p>
						<div class="RespuestaAjax">

						</div>
				    </form>
				</div>
			</div>
		</div>