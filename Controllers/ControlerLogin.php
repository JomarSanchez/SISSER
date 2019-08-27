<?php
     if($peticionAjax){
         require_once '../Models/ModelLogin.php';
     }else{
         require_once './Models/ModelLogin.php';
     }

     class loginControlador extends loginModelo{
          public function iniciarSesionControlador(){
             $usuario = mainModelo::limpiarCadena($_POST['usuario']);
             $clave = mainModelo::limpiarCadena($_POST['clave']);
             $clave = mainModelo::encryption($clave);
             $datosLogin = [
                 "usuario" => $usuario,
                 "clave" => $clave
             ];
             $datosCuenta = loginModelo::iniciarSesionModelo($datosLogin);
                 if($datosCuenta->rowCount()==1){
                     $row=$datosCuenta->fetch();
                     $fechaActual = date("Y-m-d");
                     $yearActual = date("Y");
                     $horaActual = date("h:i:s a");
                     $query1 = mainModelo::ejecutarConsultaSimple("SELECT id FROM bitacora");
                     $numero = ($query1->rowCount())+1;
                     $codigoBitacora = mainModelo::generarCodigoAleatorio("O",8,$numero);
                     $datosBitacora = [
                         "codigoB" => $codigoBitacora,
                         "fecha" => $fechaActual,
                         "horaInicio" => $horaActual,
                         "horaFinal" => "Sin registro",
                         "tipo" => $row['tipo'],
                         "bYear"=> $yearActual,
                         "codigo" => $row['codigo'] 
                     ];

                     $inserBitacora = mainModelo::guardarBitacora($datosBitacora);
                     if($inserBitacora->rowCount()>=1){

                        if($row['tipo'] == "Administrador"){
                            $query2 = mainModelo::ejecutarConsultaSimple("SELECT * FROM administrador WHERE codigo = '".$row['codigo']."'");
                        }else{

                        }

                        if($query2->rowCount() == 1){
                            session_start(['name' => 'SER']);

                            $_SESSION['usuario_ser']=$row['usuario'];
                            $_SESSION['tipo_ser']=$row['tipo'];
                            $_SESSION['privilegio_ser']=$row['privilegio'];
                            $_SESSION['foto_ser']=$row['foto'];
                            $_SESSION['token_ser']=md5(uniqid(mt_rand(),true));
                            $_SESSION['codigoCuenta_ser']=$row['codigo'];
                            $_SESSION['codigoBitacora_ser']=$codigoBitacora;
                                if($row['tipo'] == 'Administrador'){
                                    $url = SERVERURL."home/";
                                }else{
                                    $url = SERVERURL."participante/";
                                }
                                return $urlLocation='<script> window.location="'.$url.'"</script>';
                        }else{
                            $alerta = [
                                "Alerta" => "simple",
                                "Titulo" => "ERROR",
                                "Texto" => "No hemos podido iniciar sesión por problemas técnicos. ! Intente otra vez ! ",
                                "Tipo" =>"error"
                            ];
                            return mainModelo::sweetAlert($alerta);
                        }
                     }else{
                         $alerta = [
                             "Alerta" => "simple",
                             "Titulo" => "ERROR",
                             "Texto" => "No hemos podido iniciar sesión por problemas técnicos. ! Intente otra vez ! ",
                             "Tipo" =>"error"
                         ];
                         return mainModelo::sweetAlert($alerta); 
                     }
                 }else{
                     $alerta = [
                         "Alerta" => "simple",
                         "Titulo" => "ERROR",
                         "Texto" => "Usuario / Contraseña no son correctas",
                         "Tipo" => "error"
                     ];
                    }
                    return mainModelo::sweetAlert($alerta);
                }
         public function cerrarSesionControlador(){
			 session_start(['name' => 'SER']);
             $token = mainModelo::decryption($_GET['token']);
             $hora = date("h:i:s a");
             $datos = [
                 "usuario"  => $_SESSION['usuario_ser'],
                 "token_s" => $_SESSION['token_ser'],
                 "token" => $token,
                 "codigo" => $_SESSION['codigoBitacora_ser'],
                 "hora" => $hora
             ];
             return loginModelo::cerrarSesionModelo($datos);
         }
         public function cerrarSessionLogin(){
             /* session_start(['name' => 'SER']); */
             session_destroy();
             $redirict = '<script> window.location.href="'.SERVERURL.'login/" </script>';
             return $redirict;
             //return header("Location:".SERVERURL."login/");
        }
        public function redireccionarUsuarioControlador($tipo)
        {
            if($tipo=="Administrador"){
                $redirict = '<script> window.location.href="'.SERVERURL.'login/home" </script>';
            }
            return $redirict;
        }
     }