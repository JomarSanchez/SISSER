<?php
     if($peticionAjax){
        require_once '../Models/ModelAdministrador.php';
     }else{
         require_once './Models/ModelAdministrador.php';
     }
     class administradorControlador extends administradorModelo{
         /* FUNCION PARA GUARDAR ADMINISTRADOR */
         public function agregarAdministradorControlador(){
             $dni = mainModelo::limpiarCadena($_POST['dni-reg']);
             $nombre = mainModelo::limpiarCadena($_POST['nombre-reg']);
             $apellidos = mainModelo::limpiarCadena($_POST['apellido-reg']);
             $celular= mainModelo::limpiarCadena($_POST['celular-reg']);
             $direccion = mainModelo::limpiarCadena($_POST['direccion-reg']);
             /* DATOS PARA CUENTA */
             $usuario = mainModelo::limpiarCadena($_POST['usuario-reg']);
             $password1 = mainModelo::limpiarCadena($_POST['password1-reg']);
             $password2 = mainModelo::limpiarCadena($_POST['password2-reg']);
             $email = mainModelo::limpiarCadena($_POST['email-reg']);
             $genero = mainModelo::limpiarCadena($_POST['optionsGenero']);
             $privilegio = mainModelo::decryption($_POST['optionsPrivilegio']);
             $privilegio = mainModelo::limpiarCadena($privilegio);
             
             if($genero == "Masculino"){
                 $foto = "admin1.png";
             }else{
                 $foto = "admin3.png";
             }
             if($privilegio < 1 || $privilegio > 3){
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "ERROR",
                    "Texto" => "Nivel de privilegio incorrecto",
                    "Tipo" =>"error"
                ];
             }else{
                 if($password1 != $password2){
                     $alerta = [
                         "Alerta" => "simple",
                         "Titulo" => "ERROR",
                         "Texto" => "Las contraseña no coinciden, ¡ Por Favor, Intente de Nuevo!",
                         "Tipo" =>"error"
                     ];
                 }else{
                     $query1 = mainModelo::ejecutarConsultaSimple("SELECT dni FROM administrador WHERE dni = '$dni'");
                         if($query1 -> rowCount() == 1){
                             $alerta = [
                                 "Alerta" => "simple",
                                 "Titulo" => "ERROR",
                                 "Texto" => "El DNI que ingreso ya se ecuentra registrado en el sistema",
                                 "Tipo" =>"error"
                             ];
                         }else{
                             if($email != ""){
                                 $query2 = mainModelo::ejecutarConsultaSimple("SELECT email FROM cuenta WHERE email ='$email'");
                                 $emailCuenta = $query2->rowCount();
                             }else{
                                 $emailCuenta = 0;
                             }
                             if($emailCuenta>=1){
                                 $alerta = [
                                     "Alerta" => "simple",
                                     "Titulo" => "ERROR",
                                     "Texto" => "El email que acaba de ingresar ya existe en el sistema",
                                     "Tipo" =>"error"
                                 ];
                             }else{
                                 $query3 = mainModelo::ejecutarConsultaSimple("SELECT usuario FROM cuenta WHERE usuario ='$usuario'");
                                 if($query3 -> rowCount()==1){
                                     $alerta = [
                                         "Alerta" => "simple",
                                         "Titulo" => "ERROR",
                                         "Texto" => "El usuario ya existe, ingrese uno diferente",
                                         "Tipo" =>"error"
                                     ];
                                 }else{
                                     $query4 = mainModelo::ejecutarConsultaSimple("SELECT id FROM cuenta ");
                                     $numero = ($query4->rowCount())+1;
                                     $codigo = mainModelo::generarCodigoAleatorio("S",8,$numero);
                                     $clave = mainModelo::encryption($password1);
                                     $dataCuenta = [
                                         "codigo" => $codigo,
                                         "privilegio" => $privilegio,
                                         "usuario" => $usuario,
                                         "clave" => $clave,
                                         "email" => $email,
                                         "estado" => "Activo",
                                         "tipo" => "Administrador",
                                         "genero" => $genero,
                                         "foto" => $foto
                                     ];
    
                                     $guardarCuenta = mainModelo:: agregarCuenta($dataCuenta);
                                     if($guardarCuenta->rowCount()==1){
                                         $dataAdmin = [
                                             "dni" => $dni,
                                             "nombre" => $nombre,
                                             "apellidos" => $apellidos,
                                             "celular" => $celular,
                                             "direccion" => $direccion,
                                             "codigo" => $codigo 
                                         ];  
                                         $guardarAdmin = administradorModelo::agregarAdministradorModelo($dataAdmin);
                                             if($guardarAdmin ->rowCount()>=1){
                                                 $alerta = [
                                                    "Alerta" => "limpiar",
                                                    "Titulo" => "OK",
                                                    "Texto" => "Administrador registrado con exito",
                                                    "Tipo" => "success"
                                                 ];
                                             }else{
                                                 mainModelo::eliminarCuenta($codigo);
                                                 $alerta = [
                                                     "Alerta" => "simple",
                                                     "Titulo" => "ERROR",
                                                     "Texto" => "No se agregaron los datos del administrador",
                                                     "Tipo" =>"error"
                                                 ];
                                             }
                                     }else{
                                         $alerta = [
                                            "Alerta" => "simple",
                                            "Titulo" => "ERROR",
                                            "Texto" => "No se agregaron los datos del administrador",
                                            "Tipo" => "error"
                                         ];
                                     }
                                 }
                             }
                         }
                 }
             }
             return mainModelo::sweetAlert($alerta);
         }
         /* PAGINADOR DE ADMINISTRADOR */
         public function paginadorAdministradorControlador($pagina,$registro,$privilegio,$codigoA,$busqueda){
             $pagina = mainModelo::limpiarCadena($pagina);
             $registro = mainModelo::limpiarCadena($registro);
             $privilegio = mainModelo::limpiarCadena($privilegio);
             $codigoA = mainModelo::limpiarCadena($codigoA);
             $busqueda = mainModelo::limpiarCadena($busqueda);
             $tabla = "";
             $pagina = (isset($pagina) && $pagina>0) ? (int)$pagina : 1;
             $inicio = ($pagina>0) ? (($pagina*$registro)-$registro) : 0 ;
             if(isset($busqueda) && $busqueda != ""){
                 $consulta = "SELECT SQL_CALC_FOUND_ROWS * FROM administrador WHERE ((codigo !='$codigoA'AND id != '1') AND (nombre LIKE '%$busqueda%' OR apellidos LIKE '%$busqueda%' OR dni LIKE '%$busqueda%')) ORDER BY nombre ASC LIMIT $inicio,$registro";
                 $paginaUrl = "adminsearch";
             }else{
                 $consulta = "SELECT SQL_CALC_FOUND_ROWS * FROM administrador WHERE codigo !='$codigoA'AND id != '1' ORDER BY nombre ASC LIMIT $inicio,$registro";
                 $paginaUrl = "adminlist";
             }

             $cn= mainModelo::Conectar();
             $datos  = $cn->query($consulta);
             $datos = $datos->fetchAll();
             $total = $cn->query("SELECT FOUND_ROWS()");
             $total = (int) $total->fetchColumn();
             $npagina = ceil($total/$registro);
             $tabla .='
                 <div class="table-responsive">
                     <table class="table table-hover text-center">
                         <thead>
                             <tr>
                                 <th class="text-center">#</th>
                                 <th class="text-center">DNI</th>
                                 <th class="text-center">NOMBRES</th>
                                 <th class="text-center">APELLIDOS</th>
                                 <th class="text-center">TELÉFONO</th>';
                                     if($privilegio<=2){
                                         $tabla .= '
                                             <th class="text-center">A. CUENTA</th>
                                             <th class="text-center">A. DATOS</th>
                                         ';
                                     }
                                     if($privilegio == 1){
                                         $tabla .= '
                                             <th class="text-center">ELIMINAR</th>
                                         ';
                                     }
                  $tabla .= '</tr>
                         </thead>
                         <tbody>';
                             if($total>=1 && $pagina<=$npagina){
                                 $contador = $inicio+1; 
                                     foreach ($datos as $key => $value) {
                                         $tabla .= '
                                             <tr>
                                                 <td>'.$contador.'</td>
                                                 <td>'.$value['dni'].'</td>
                                                 <td>'.$value['nombre'].'</td>
                                                 <td>'.$value['apellidos'].'</td>
                                                 <td>'.$value['celular'].'</td>';
                                                 if($privilegio <=2){
                                                     $tabla .= '
                                                     <td>
                                                         <a href="'.SERVERURL.'account/admin/'.mainModelo::encryption($value['codigo']).'/" class="btn btn-success btn-raised btn-xs">
                                                             <i class="zmdi zmdi-refresh"></i>
                                                         </a>
                                                     </td>
                                                     <td>
                                                         <a href="'.SERVERURL.'data/admin/'.mainModelo::encryption($value['codigo']).'/" class="btn btn-success btn-raised btn-xs">
                                                             <i class="zmdi zmdi-refresh"></i>
                                                         </a>
                                                     </td>
                                                     ';
                                                 }
                                                 if($privilegio ==1 ){
                                                     $tabla .= '
                                                      <td>
                                                         <form action="'.SERVERURL.'Ajax/administradorAjax.php" method="POST" class="FormularioAjax" data-form="delete" enctype="multipart/form-data" autocomplete="off">
                                                             <input type="hidden" name="codigo-del" value="'.mainModelo::encryption($value['codigo']).'">
                                                             <input type="hidden" name="privilegio-admin" value="'.mainModelo::encryption($privilegio).'">
                                                             <button type="submit" class="btn btn-danger btn-raised btn-xs">
                                                                  <i class="zmdi zmdi-delete"></i>
                                                             </button>
                                                             <div class="RespuestaAjax"></div>
                                                         </form>
                                                      </td>
                                                     ';
                                                 }
                                   $tabla .='
                                             </tr>
                                         ';   
                                         $contador ++;
                                     }
                             }else{
                                 if($total >=1){
                                     $tabla .= '
                                     <tr>
                                         <td colspan="8"> 
                                             <a href="'.SERVERURL.$paginaUrl.'/" class="btn btn-sm btn-info btn-raised"> Recargar Página de listado
                                             </a>
                                          </td>
                                     </tr>
                                     ';
                                 }else{
                                     $tabla .= '
                                         <tr>
                                             <td colspan="8">No hay registros en el sistema </td>
                                         </tr>
                                     ';
                                 }
                             }
             $tabla .='</tbody>
                     </table>
                 </div>';
                 if($total>=1 && $pagina<=$npagina){
                     $tabla .= '
                         <nav class="text-center">
                             <ul class="pagination pagination-sm">
                     ';
                         if($pagina==1){
                             $tabla .='
                                 <li class="disabled"><a><i class="zmdi zmdi-arrow-left"></i></a></li>
                             ';
                         }else{
                             $tabla .='
                                 <li><a href="'.SERVERURL.$paginaUrl.'/'.($pagina-1).'/"> <i class="zmdi zmdi-arrow-left"></i> </a></li>
                             ';
                         }

                         for ($i=1; $i <=$npagina; $i++) { 
                             if($pagina == $i){
                                 $tabla .='
                                     <li class="active"><a href="'.SERVERURL.$paginaUrl.'/'.$i.'/">'.$i.'</a></li>
                                 ';
                             }else{
                                 $tabla .='
                                     <li><a href="'.SERVERURL.$paginaUrl.'/'.$i.'/">'.$i.'</a></li>
                                 ';
                             }
                         }
                         if($pagina==$npagina){
                            $tabla .='
                                <li class="disabled"><a><i class="zmdi zmdi-arrow-right"></i></a></li>
                            ';
                        }else{
                           $tabla .='
                                <li><a href="'.SERVERURL.$paginaUrl.'/'.($pagina+1).'/"> <i class="zmdi zmdi-arrow-right"></i> </a></li>
                            ';
                        }
                     $tabla .= '
                             </ul>
                         </nav>
                     ';
                 }
             return $tabla;
         }
         /* ELIMINAR ADMINISTRADOR */
         public function eliminarAdministradorControlador(){
             $codigo = mainModelo::decryption($_POST['codigo-del']);
             $privilegio = mainModelo::decryption($_POST['privilegio-admin']);
             $codigo = mainModelo::limpiarCadena($codigo);
             $privilegio = mainModelo::limpiarCadena($privilegio);

             if($privilegio == 1){
                 $query1 = mainModelo::ejecutarConsultaSimple("SELECT id FROM administrador WHERE codigo = '$codigo'");
                     $datosAdmin = $query1->fetch();
                         if($datosAdmin['id']!=1){
                             $elimarAdmin = administradorModelo::eliminarAdministradorModelo($codigo);
                             mainModelo::eliminarBitacora($codigo);
                             if($elimarAdmin->rowCount()>=1){
                                 $eliminarCuenta = mainModelo::eliminarCuenta($codigo);
                                     if($eliminarCuenta->rowCount()>=1){
                                         $alerta = [
                                             "Alerta" => "recarga",
                                             "Titulo" => "OK",
                                             "Texto" => "¡ ADMINISTRADOR ELIMINADO !",
                                             "Tipo" =>"success"
                                         ];
                                     }else{
                                         $alerta = [
                                            "Alerta" => "simple",
                                            "Titulo" => "ERROR",
                                            "Texto" => "¡ PROBLEMAS PARA ELIMINAR ADMINISTRADOR !",
                                            "Tipo" =>"error"
                                         ];
                                     }
                             }else{
                                 $alerta = [
                                    "Alerta" => "simple",
                                    "Titulo" => "ERROR",
                                    "Texto" => "¡ PROBLEMAS PARA ELIMINAR ADMINISTRADOR !",
                                    "Tipo" =>"error"
                                 ];
                             }
                         }else{
                             $alerta = [
                                "Alerta" => "simple",
                                "Titulo" => "ERROR",
                                "Texto" => "¡ PERMISO DENEGADO !",
                                "Tipo" =>"error"
                            ];
                         }
             }else{
                 $alerta = [
                     "Alerta" => "simple",
                     "Titulo" => "ERROR",
                     "Texto" => "Permiso denegado para realizar está operación",
                     "Tipo" =>"error"
                 ];
             } 
             return mainModelo::sweetAlert($alerta);
         }
         /* MOSTRAR DATOS DE ADMINISTARDOR */
         public function mostrarDatosAdminControlador($tipo,$codigo){
             $tipo = mainModelo::limpiarCadena($tipo);
             $codigo = mainModelo::decryption($codigo);
             return administradorModelo::mostrarDatosAdminModelo($tipo,$codigo);
         }
         /* EDITAR DATOS DEL ADMINISTRADOR */
         public function editarDatosAdminControlador(){
             $cuenta = mainModelo::decryption($_POST['cuenta-up']);
             $dni = mainModelo::limpiarCadena($_POST['dni-up']);
             $nombre = mainModelo::limpiarCadena($_POST['nombre-up']);
             $apellidos = mainModelo::limpiarCadena($_POST['apellido-up']);
             $celular = mainModelo::limpiarCadena($_POST['celular-up']);
             $direccion = mainModelo::limpiarCadena($_POST['direccion-up']);

             $query = mainModelo::ejecutarConsultaSimple("SELECT * FROM administrador WHERE codigo = '$cuenta'");
             $datosAdmin = $query->fetch();
             if($dni!=$datosAdmin['dni']){
                 $query1 = mainModelo::ejecutarConsultaSimple("SELECT dni FROM administrador WHERE dni = '$dni'");
                     if($query1->rowCount()>=1){
                         $alerta = [
                            "Alerta" => "simple",
                            "Titulo" => "ERROR",
                            "Texto" => "¡ EL DNI QUE ACABA DE INGRESAR SE ENCUENTRA REGISTRADO !",
                            "Tipo" =>"error"
                         ];
                         return mainModelo::sweetAlert($alerta);
                         exit();
                     }
             }
             $datosAdmin = [
                  "dni" => $dni,
                  "nombre" => $nombre,
                  "apellidos" => $apellidos,
                  "celular" => $celular,
                  "direccion" => $direccion,
                  "codigo" => $cuenta
             ];
             if(administradorModelo::editarDatosAdminModelo($datosAdmin)){
                 $alerta = [
                    "Alerta" => "recarga",
                    "Titulo" => "OK",
                    "Texto" => "¡ DATOS ACTUALIZADOS CORRECTAMENTE !",
                    "Tipo" =>"success"
                 ];
             }else{
                 $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "ERROR",
                    "Texto" => "¡ PROBLEMAS AL MOMENTO DE ACTUALIZAR LOS DATOS !",
                    "Tipo" =>"error"
                 ];
             }
             return mainModelo::sweetAlert($alerta);
         }
     }