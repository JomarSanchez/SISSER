<?php
     if($peticionAjax){
        require_once '../Models/ModelProspecto.php';
     }else{
         require_once './Models/ModelProspecto.php';
     }
     class prospectoControlador extends prospectoModelo{
         public function agregarProspectoControlador(){
             $nombre = mainModelo::limpiarCadena($_POST['nombre-reg']);
             $apellidoPaterno = mainModelo::limpiarCadena($_POST['apellidoPa-reg']);
             $apellidoMaterno = mainModelo::limpiarCadena($_POST['apellidoMa-reg']);
             $genero = mainModelo::limpiarCadena($_POST['optionsGenero']);
             $email = mainModelo::limpiarCadena($_POST['email-reg']);
             $celular = mainModelo::limpiarCadena($_POST['celular-reg']);
             $estado = mainModelo::limpiarCadena($_POST['estado-reg']);
             $producto = mainModelo::limpiarCadena($_POST['producto-reg']);
             $sede = mainModelo::limpiarCadena($_POST['sede-reg']);
             $observacion = mainModelo::limpiarCadena($_POST['observacion-reg']);
             $query1 = mainModelo::ejecutarConsultaSimple("SELECT email FROM prospecto WHERE email = '$email'");
             if($query1->rowCount()>=1){
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "ERROR",
                    "Texto" => "El email que ingreso ya se ecuentra registrado en el sistema",
                    "Tipo" =>"error"
                ];
             }else{
                        $dataProspecto = [
                            "nombre" => $nombre,
                            "apellidoPaterno" => $apellidoPaterno,
                            "apellidoMaterno" => $apellidoMaterno,
                            "genero" => $genero,
                            "email" => $email,
                            "celular" => $celular,
                            "estado" => $estado,
                            "codigoProducto" => $producto,
                            "codigoSede" => $sede,
                            "observacion" => $observacion
                        ];
                        $guardarProspecto = prospectoModelo::agregarProspectoModelo($dataProspecto);
                        if($guardarProspecto->rowCount()>=1){
                            $alerta = [
                                "Alerta" => "limpiar",
                                "Titulo" => "OK",
                                "Texto" => "PROSPECTO REGISTRADO CON ÉXITO",
                                "Tipo" => "success"
                                ];
                        }else{
                            $alerta = [
                                "Alerta" => "simple",
                                "Titulo" => "ERROR",
                                "Texto" => "No se agregaron los datos del prospecto",
                                "Tipo" => "error"
                                ];
                        }
             }
             return mainModelo::sweetAlert($alerta);
         }
         /* PAGINADOR DE PROSPECTO */
         public function paginadorProspectoControlador($pagina,$registro,$privilegio,$codigoA,$busqueda){
            $pagina = mainModelo::limpiarCadena($pagina);
            $registro = mainModelo::limpiarCadena($registro);
            $privilegio = mainModelo::limpiarCadena($privilegio);
            $codigoA = mainModelo::limpiarCadena($codigoA);
            $busqueda = mainModelo::limpiarCadena($busqueda);
            $tabla = "";
            $pagina = (isset($pagina) && $pagina>0) ? (int)$pagina : 1;
            $inicio = ($pagina>0) ? (($pagina*$registro)-$registro) : 0 ;
            if(isset($busqueda) && $busqueda != ""){
                $consulta = "SELECT SQL_CALC_FOUND_ROWS * FROM prospecto WHERE nombre LIKE '%$busqueda%' OR apellidos LIKE '%$busqueda%' OR dni LIKE '%$busqueda%' ORDER BY id DESC LIMIT $inicio,$registro";
                $paginaUrl = "prospectosearch";
            }else{
                $consulta = "SELECT SQL_CALC_FOUND_ROWS * FROM prospecto  ORDER BY id DESC LIMIT $inicio,$registro";
                $paginaUrl = "prospectolist";
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
                                <th class="text-center">F-REG</th>
                                <th class="text-center">NOMBRES</th>
                                <th class="text-center">CORREO</th>
                                <th class="text-center">CELULAR</th>
                                <th class="text-center">OBSERVACIÓN</th>';
                                    if($privilegio<=2){
                                        $tabla .= '
                                            <th class="text-center">EDITAR</th>
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
                                                <td>'.$value['fecha'].'</td>
                                                <td>'.$value['nombre'].' '.$value['apellidoPaterno'].' '.$value['apellidoMaterno'].'</td>
                                                <td>'.$value['email'].'</td>
                                                <td>'.$value['celular'].'</td>
                                                <td>'.$value['observacion'].'</td>';
                                                if($privilegio <=2){
                                                    $tabla .= '
                                                    <td>
                                                        <a href="'.SERVERURL.'data/admin/'.mainModelo::encryption($value['id']).'/" class="btn btn-success btn-raised btn-xs">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                    </td>
                                                    ';
                                                }
                                                if($privilegio ==1 ){
                                                    $tabla .= '
                                                     <td>
                                                        <form action="'.SERVERURL.'Ajax/administradorAjax.php" method="POST" class="FormularioAjax" data-form="delete" enctype="multipart/form-data" autocomplete="off">
                                                            <input type="hidden" name="codigo-del" value="'.mainModelo::encryption($value['id']).'">
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
     }