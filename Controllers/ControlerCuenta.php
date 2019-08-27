 <?php
     if($peticionAjax){
         require_once '../Config/mainModelo.php';
     }else{
         require_once './Config/mainModelo.php';
     }
     class cuentaControlador extends mainModelo{
         public function datosCuentaControlador($codigo,$tipo) {
              $codigo = mainModelo::decryption($codigo);
              $tipo = mainModelo::limpiarCadena($tipo);
                 if($tipo == "admin"){
                     $tipo = "Administrador";
                 }else{
                     $tipo = "User";
                 }
              return mainModelo::datosCuenta($codigo,$tipo);
         }
         public function actualizarCuentaControlador(){
             $codigo = mainModelo::decryption($_POST['codigo-up']);
             $tipoCuenta = mainModelo::decryption($_POST['tipoCuenta-up']);
             $query1 = mainModelo::ejecutarConsultaSimple("SELECT * FROM cuenta WHERE codigo = '$codigo'");
             $datosCuenta = $query1 -> fetch();
             $user = mainModelo::limpiarCadena($_POST['usuario-log']);
             $pass = mainModelo::limpiarCadena($_POST['password-log']);
             $pass = mainModelo::encryption($pass);
                 if($user != "" && $pass != ""){
                     if(isset($_POST['privilegio-up'])){
                         $login = mainModelo::ejecutarConsultaSimple("SELECT id FROM cuenta WHERE usuario = '$user' AND clave = '$pass'");
                     }else{
                         $login = mainModelo::ejecutarConsultaSimple("SELECT id FROM cuenta WHERE usuario = '$user' AND clave = '$pass' AND codigo = '$codigo'");
                     }
                     if($login->rowCount()==0){
                         $alerta = [
                             "Alerta" => "simple",
                             "Titulo" => "ERROR",
                             "Texto" => "¡ USUARIO / CONTRASEÑA INCORRECTOS !",
                             "Tipo" =>"error"
                         ];
                         return mainModelo::sweetAlert($alerta);
                         exit();
                     }
                 }else{
                     $alerta = [
                         "Alerta" => "simple",
                         "Titulo" => "ERROR",
                         "Texto" => "¡ INGRESE USUARIO / CONTRASEÑA PARA ACTULIZAR LOS DATOS !",
                         "Tipo" =>"error"
                     ];
                     return mainModelo::sweetAlert($alerta);
                     exit();
                 }

             /* VERIFICAR SI EXISTE USUARIO AL MOMENTO DE EDITAR */
             $cuentaUsuario = mainModelo::limpiarCadena($_POST['usuario-up']);
             if($cuentaUsuario != $datosCuenta['usuario']){
                 $query2 = mainModelo::ejecutarConsultaSimple("SELECT usuario FROM cuenta WHERE usuario = '$cuentaUsuario'");
                 if($query2->rowCount()>=1){
                     $alerta = [
                         "Alerta" => "simple",
                         "Titulo" => "ERROR",
                         "Texto" => "¡ EL NOMBRE DE USUARIO SE ENCUENTRA REGISTRADO EN EL SISTEMA !",
                         "Tipo" =>"error"
                     ];
                     return mainModelo::sweetAlert($alerta);
                     exit();
                 }
             }
             /* VERIFICAR SI EL EMAIL EXISTE AL MOMENTO DE EDITAR */
             $cuentaEmail = mainModelo::limpiarCadena($_POST['email-up']);
             if($cuentaEmail != $datosCuenta['email']){
                 $query3 = mainModelo::ejecutarConsultaSimple("SELECT email FROM cuenta WHERE email = '$cuentaEmail'");
                 if($query3->rowCount()>=1){
                     $alerta = [
                         "Alerta" => "simple",
                         "Titulo" => "ERROR",
                         "Texto" => "¡ EL EMAIL INGRESADO SE ENCUENTRA REGISTRADO EN EL SISTEMA !",
                         "Tipo" =>"error"
                     ];
                     return mainModelo::sweetAlert($alerta);
                     exit();
                 }
             }
             $CuentaGenero = mainModelo::limpiarCadena($_POST['optionsGenero-up']);
             if(isset($_POST['estadoCuenta-up'])){
                 $cuentaEstado = mainModelo::limpiarCadena($_POST['estadoCuenta-up']);
             }else{
                 $cuentaEstado = $datosCuenta['estado'];
             }
             if($tipoCuenta=="admin"){
                 if(isset($_POST['optionsPrivilegio-up'])){
                     $cuentaPrivilegio = mainModelo::decryption($_POST['optionsPrivilegio-up']);
                 }else{
                     $cuentaPrivilegio = $datosCuenta['privilegio'];
                 }
                 if($CuentaGenero == "Masculino"){
                     $cuentaFoto = "admin1.png"; 
                 }else {
                     $cuentaFoto = "admin3.png";
                 }
             }else{
                 $cuentaPrivilegio = $datosCuenta['privilegio'];
                 if($CuentaGenero == "Masculino"){
                     $cuentaFoto = "admin1.png"; 
                 }else {
                     $cuentaFoto = "admin3.png";
                 }
             }
             /* VERIFICAR EL CAMBIO DE PASSWORD */
             $passwordN1 = mainModelo::limpiarCadena($_POST['newPassword1-up']);
             $passwordN2 = mainModelo::limpiarCadena($_POST['newPassword2-up']);
                 if($passwordN1 != "" || $passwordN2 != "" ){
                     if($passwordN1 == $passwordN2){
                         $cuentaPassword = mainModelo::encryption($passwordN1);
                     }else{
                         $alerta = [
                             "Alerta" => "simple",
                             "Titulo" => "ERROR",
                             "Texto" => "¡ LAS CONTRASEÑAS NO COINCIDEN, PARA ACTUALIZAR LA NUEVA CONTRASEÑA DE LA CUENTA, VERIFICAR POR FAVOR !",
                             "Tipo" =>"error"
                         ];
                         return mainModelo::sweetAlert($alerta);
                         exit(); 
                     }
                 }else{
                     $cuentaPassword = $datosCuenta['clave'];
                 }
                 //ENVIANDO DATOS AL MODELO 
                 $datosUpdate = [
                      "privilegio" => $cuentaPrivilegio,
                      "codigo" => $codigo,
                      "usuario" => $cuentaUsuario,
                      "clave" => $cuentaPassword,
                      "email" => $cuentaEmail,
                      "estado" => $cuentaEstado,
                      "genero" => $CuentaGenero,
                      "foto" => $cuentaFoto 
                 ];
                 if(mainModelo::actualizarCuenta($datosUpdate)){
                     if(!isset($_POST['privilegio-up'])){
                         session_start(['name' => 'SER']);
                         $_SESSION['usuario_ser'] = $cuentaUsuario;
                         $_SESSION['foto_ser'] = $cuentaFoto;
                     }
                     $alerta = [
                         "Alerta" => "recarga",
                         "Titulo" => "OK",
                         "Texto" => "¡SE HAN ACTUALIZADOS LOS DATOS DE CUENTA !",
                         "Tipo" =>"success"
                     ];
                 }else{
                     $alerta = [
                         "Alerta" => "simple",
                         "Titulo" => "ERROR",
                         "Texto" => "¡ NO SE HAN ACTUALIZADOS LOS DATOS DE CUENTA, INTENTE MÁS TARDE !",
                         "Tipo" =>"error"
                     ];
                    }
                    return mainModelo::sweetAlert($alerta);
         }
     }