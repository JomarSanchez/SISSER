 <?php 
     if($peticionAjax){
        require_once '../Models/ModelParticipante.php';
     }else{
         require_once './Models/ModelParticipante.php';
     }
     class participanteControlador extends participanteModelo{
         public function agregarParticipanteControlador(){
             $dni = mainModelo::limpiarCadena($_POST['dni-reg']);
             $nombre = mainModelo::limpiarCadena($_POST['nombre-reg']);
             $apellidoPaterno = mainModelo::limpiarCadena($_POST['apellidoPa-reg']);
             $apellidoMaterno = mainModelo::limpiarCadena($_POST['apellidoMa-reg']);
             $genero= mainModelo::limpiarCadena($_POST['optionsGenero']);
             $fnacimiento= mainModelo::limpiarCadena($_POST['fecnacimieto-reg']);
             $edad= mainModelo::limpiarCadena($_POST['edad-reg']);
             $lnacimiento= mainModelo::limpiarCadena($_POST['nacimiento-reg']);
             $departamento= mainModelo::limpiarCadena($_POST['departamento-reg']);
             $provincia= mainModelo::limpiarCadena($_POST['provincia-reg']);
             $distrito= mainModelo::limpiarCadena($_POST['distrito-reg']);
             $direccion= mainModelo::limpiarCadena($_POST['direccion-reg']);
             $email= mainModelo::limpiarCadena($_POST['email-reg']);
             $celular= mainModelo::limpiarCadena($_POST['telefono-reg']);
             $producto= mainModelo::limpiarCadena($_POST['producto-reg']);
             $servicio= mainModelo::limpiarCadena($_POST['servicio-reg']);
             $sede= mainModelo::limpiarCadena($_POST['sede-reg']);
             $psicologo= mainModelo::limpiarCadena($_POST['psicologo-reg']);
             $hclinica= mainModelo::limpiarCadena($_POST['hclinica-reg']);
             $observacion= mainModelo::limpiarCadena($_POST['observacion-reg']);             
             
             if($dni == ""){
                 $alerta = [
                     "Alerta" => "simple",
                     "Titulo" => "ERROR",
                     "Texto" => "Ingrese el nombre del participante",
                     "Tipo" => "error"
                 ];
             }else{
                 $dataParticipante = [
                     "dni" => $dni,
                     "nombre" => $nombre,
                     "apellidoPaterno" => $apellidoPaterno,
                     "apellidoMaterno" => $apellidoMaterno,
                     "sexo" => $genero,
                     "fNacimiento" => $fnacimiento,
                     "edad" => $edad,
                     "lNacimiento" => $lnacimiento,
                     "region" => $departamento,
                     "provincia" => $provincia,
                     "distrito" => $distrito,
                     "direccion" => $direccion,
                     "emai" => $email,
                     "celular" => $celular,
                     "codigoProducto" => $producto,
                     "codigoProducto" => $servicio,
                     "codigoProducto" => $sede,
                     "codigoProducto" => $psicologo,
                     "historiaClinica" => $hclinica,
                     "observacion" => $observacion
                 ];
                 $guardarParticipante = participanteModelo::agregarParticipanteModelo($dataParticipante);
                 if($guardarParticipante->rowCount()>=1){
                    $alerta = [
                        "Alerta" => "limpiar",
                        "Titulo" => "OK",
                        "Texto" => "PARTICIPANTE REGISTRADO CON ÉXITO",
                        "Tipo" => "success"
                        ];
                 }else{
                    $alerta = [
                        "Alerta" => "simple",
                        "Titulo" => "ERROR",
                        "Texto" => "No se agregaron los datos del participante",
                        "Tipo" => "error"
                        ];
                 }
             }
             return mainModelo::sweetAlert($alerta);
         }
    }