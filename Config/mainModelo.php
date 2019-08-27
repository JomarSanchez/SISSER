<?php
     if($peticionAjax){
        require_once '../Config/confConexion.php';
     }else{
         require_once './Config/confConexion.php';
     }
     class mainModelo{  
         protected function Conectar(){
             try {
                 $enlace = new PDO(SGBD,USER,PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                 PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                 return $enlace;
             } catch (PDOException $e) {
                  echo 'Error:' . $e->getMessage();
             }
         }
         public function listarProvincia(){
            $query = mainModelo::Conectar()->prepare("SELECT * FROM provincia WHERE iddepartamento = :iddepartamento");
            $query -> execute();
            $provincia = $query->fetchAll();
            foreach ($provincia as $key ) {
                echo "<option value='".$key['id']."'>".$key['nombre']."</option>";
            }
         }
         protected function ejecutarConsultaSimple($consulta){
             $result = self::Conectar()-> prepare($consulta);
             $result -> execute();
             return $result;
         }
         protected function agregarCuenta($datos){
             $state = self::Conectar() -> prepare("INSERT INTO cuenta (codigo,privilegio,usuario,clave,email,estado,tipo,genero,foto) VALUES (:codigo,:privilegio,:usuario,:clave,:email,:estado,:tipo,:genero,:foto)"); 
             $state -> bindParam(":codigo",$datos['codigo']);
             $state -> bindParam(":privilegio",$datos['privilegio']);
             $state -> bindParam(":usuario",$datos['usuario']);
             $state -> bindParam(":clave",$datos['clave']);
             $state -> bindParam(":email",$datos['email']);
             $state -> bindParam(":estado",$datos['estado']);
             $state -> bindParam(":tipo",$datos['tipo']);
             $state -> bindParam(":genero",$datos['genero']);
             $state -> bindParam(":foto",$datos['foto']);
             $state -> execute();
             return $state;
         }
         protected function eliminarCuenta($codigo){
             $state = self::Conectar()-> prepare("DELETE FROM cuenta WHERE codigo = :codigo");
             $state -> bindParam(":codigo",$codigo);
             $state -> execute();
             return $state;
         }
         protected function datosCuenta($codigo,$tipo){
             $state = self::Conectar() -> prepare("SELECT * FROM cuenta WHERE codigo = :codigo AND tipo = :tipo");
             $state -> bindParam(":codigo",$codigo);
             $state -> bindParam(":tipo",$tipo);
             $state -> execute();
             return $state;
         }
         protected function actualizarCuenta($datos){
             $state = self::Conectar()->prepare("UPDATE cuenta SET privilegio = :privilegio, usuario = :usuario, clave = :clave, email = :email, estado = :estado, genero = :genero, foto=:foto WHERE codigo = :codigo");
             $state -> bindParam(":privilegio",$datos['privilegio']);
             $state -> bindParam(":usuario",$datos['usuario']);
             $state -> bindParam(":clave",$datos['clave']);
             $state -> bindParam(":email",$datos['email']);
             $state -> bindParam(":estado",$datos['estado']);
             $state -> bindParam(":genero",$datos['genero']);
             $state -> bindParam(":foto",$datos['foto']);
             $state -> bindParam(":codigo",$datos['codigo']);
             $state -> execute();
             return $state;
         }
         protected function guardarBitacora($datos){
             $state = self::Conectar() -> prepare("INSERT INTO bitacora (codigoB,fecha,horaInicio,horaFinal,tipo,bYear,codigo) VALUES (:codigoB,:fecha,:horaInicio,:horaFinal,:tipo,:bYear,:codigo)");
             $state -> bindParam(":codigoB",$datos['codigoB']);
             $state -> bindParam(":fecha",$datos['fecha']);
             $state -> bindParam(":horaInicio",$datos['horaInicio']);
             $state -> bindParam(":horaFinal",$datos['horaFinal']);
             $state -> bindParam(":tipo",$datos['tipo']);
             $state -> bindParam(":bYear",$datos['bYear']);
             $state -> bindParam(":codigo",$datos['codigo']);
             $state -> execute();
             return $state;   
         }
         protected function actualizarBitacora($codigo,$hora){
             $state = self::Conectar() -> prepare("UPDATE bitacora SET horaFinal = :hora WHERE codigoB = :codigoB");
             $state -> bindParam(":hora",$hora);
             $state -> bindParam(":codigoB",$codigo);
             $state -> execute();
             return $state;
         }
         protected function eliminarBitacora($codigo){
             $state = self::Conectar()->prepare("DELETE FROM bitacora WHERE codigo = :codigo");
             $state -> bindParam(":codigo",$codigo);
             $state -> execute();
             return $state;
         }
         public function encryption($string){
             $outPut = FALSE;
             $key =hash("sha256",SECRET_KEY);
             $iv = substr(hash("sha256",SECRET_IV),0,16);
             $outPut = openssl_encrypt($string,METHOD,$key,0,$iv);
             $outPut = base64_encode($outPut);
             return $outPut;
         }
         protected function decryption($string){
             $key = hash("sha256",SECRET_KEY);
             $iv = substr(hash("sha256",SECRET_IV),0,16);
             $outPut = openssl_decrypt(base64_decode($string),METHOD,$key,0,$iv);
             return $outPut;
         }
         protected function generarCodigoAleatorio($letra,$tamaño,$num){
              for ($i=1; $i <= $tamaño; $i++) { 
                  $numero = rand(0,9);
                  $letra.=$numero;
              }
              return $letra.$num;
         }
         protected function limpiarCadena($cadena){
             $cadena = trim($cadena);
             $cadena = stripslashes($cadena);
             $cadena = str_ireplace("<script>","",$cadena);
             $cadena = str_ireplace("</script>","",$cadena);
             $cadena = str_ireplace("<script src","",$cadena);
             $cadena = str_ireplace("<script type","",$cadena);
             $cadena = str_ireplace("SELECT * FROM ","",$cadena);
             $cadena = str_ireplace("DELETE FROM","",$cadena);
             $cadena = str_ireplace("INSERT INTO","",$cadena);
             $cadena = str_ireplace("--","",$cadena);
             $cadena = str_ireplace("^","",$cadena);
             $cadena = str_ireplace("[","",$cadena);
             $cadena = str_ireplace("]","",$cadena);
             $cadena = str_ireplace("==","",$cadena);
             $cadena = str_ireplace(";","",$cadena);
             return $cadena;
         }
         protected function sweetAlert($datos){
             if($datos['Alerta'] == "simple"){
                 $alerta = "
                     <script>    
                         swal({
                             title : '".$datos['Titulo']."',
                             text :'".$datos['Texto']."',
                              type :'".$datos['Tipo']."'
                         });
                     </script>";
             }else if($datos['Alerta'] == "recarga"){
                 $alerta = "
                     <script>    
                         swal({
                             title: '".$datos['Titulo']."',
                             text: '".$datos['Texto']."',
                             type: '".$datos['Tipo']."',
                             confirmButtonText: 'Aceptar'
                         }).then((result) => {
                             location.reload();
                         });
                     </script>";
             }else if($datos['Alerta'] == "limpiar"){
                 $alerta = "
                     <script>    
                         swal({
                             title: '".$datos['Titulo']."',
                             text: '".$datos['Texto']."',
                             type: '".$datos['Tipo']."',
                             confirmButtonText: 'Aceptar'
                         }).then((result) => {
                             $('.FormularioAjax')[0].reset();
                         });
                     </script>";
             }
             return $alerta;
         }
     }