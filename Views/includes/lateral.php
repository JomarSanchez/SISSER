<section class="full-box cover dashboard-sideBar">
		<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
		<div class="full-box dashboard-sideBar-ct">
			<!--SideBar Title -->
			<div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
				<?php echo COMPANY; ?> <i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
			</div>
			<!-- SideBar User info -->
			<div class="full-box dashboard-sideBar-UserInfo">
				<figure class="full-box">
					<img src="<?php echo SERVERURL;?>Views/assets/avatars/<?php echo $_SESSION['foto_ser'];?>" alt="UserIcon">
					<figcaption class="text-center text-titles text-uppercase"> ADM: <?php echo $_SESSION['usuario_ser'];?></figcaption>
				</figure>
				 <?php 
				 	 if($_SESSION['tipo_ser'] == "Administrador"){
						 $tipo = "admin";
					  }else{
						 $tipo = "user";
					  }
				 ?>
				<ul class="full-box list-unstyled text-center">
					<li>
						<a href="<?php echo SERVERURL;?>data/<?php echo $tipo."/".$loginCon->encryption( $_SESSION['codigoCuenta_ser']);?>/" title="Mis datos">
							<i class="zmdi zmdi-account-circle"></i>
						</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL;?>account/<?php echo $tipo."/".$loginCon->encryption( $_SESSION['codigoCuenta_ser']);?>/" title="Mi cuenta">
							<i class="zmdi zmdi-settings"></i>
						</a>
					</li>
					<li>
						<a href="<?php echo $loginCon->encryption($_SESSION['token_ser']);?>" title="Salir del sistema" class="btn-exit-system">
							<i class="zmdi zmdi-power"></i>
						</a>
					</li>
				</ul>
			</div>
			<!-- SideBar Menu -->
			<ul class="list-unstyled full-box dashboard-sideBar-Menu">
				<li>
					<a href="<?php echo SERVERURL;?>home/">
						<i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> PANEL DE CONTROL
					</a>
				</li>
					<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-case zmdi-hc-fw"></i> MODULO REGISTRO <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="<?php echo SERVERURL;?>participante/"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> PARTICIPANTE </a>
						</li>
						<li>
							<a href="<?php echo SERVERURL;?>parentesco/"><i class="zmdi zmdi-labels zmdi-hc-fw"></i> PARENTESCO </a>
						</li>
						<li>
							<a href="<?php echo SERVERURL;?>educacion/"><i class="zmdi zmdi-truck zmdi-hc-fw"></i> EDUCACIÓN </a>
						</li>
					</ul>
					</li>
					<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-case zmdi-hc-fw"></i> MODULO 2 <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="<?php echo SERVERURL;?>prospecto/"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> PROSPECTO </a>
						</li>
					</ul>
					</li>
					<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-case zmdi-hc-fw"></i> MODULO 3 <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="<?php echo SERVERURL;?>postulantes/"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> POSTULANTE </a>
						</li>
					</ul>
					</li>
					<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-case zmdi-hc-fw"></i> MODULO MANTENIMIENTO <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="<?php echo SERVERURL;?>producto/"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> PRODUCTO </a>
						</li>
						<li>
							<a href="<?php echo SERVERURL;?>psicologas/"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> PSICOLOGAS </a>
						</li>
						<li>
							<a href="<?php echo SERVERURL;?>servicio/"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> SERVICIO </a>
						</li>
						<li>
							<a href="<?php echo SERVERURL;?>sede/"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> SEDE </a>
						</li>
					</ul>
					</li>
				 <li>
				 	 <a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-case zmdi-hc-fw"></i> MODULO CONSULTA <i class="zmdi zmdi-caret-down pull-right"></i>
					 </a>
					 <ul class="list-unstyled full-box">
					 	 <li>
						 	 <a href="<?php echo SERVERURL;?>consulta/"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> CONSULTA </a>
						 </li>
					 </ul>
				 </li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-account-add zmdi-hc-fw"></i> MODULO USUARIOS <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="<?php echo SERVERURL;?>admin/" class="text-uppercase" ><i class="zmdi zmdi-account zmdi-hc-fw"></i> Administradores</a>
						</li>
						<li>
							<a href="<?php echo SERVERURL;?>usuarios/" class="text-uppercase" ><i class="zmdi zmdi-male-female zmdi-hc-fw"></i> Usuarios</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	 </section>