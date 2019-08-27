 <?php
     if($peticionAjax){
        require_once '../Models/ModelEducacion.php';
     }else{
         require_once './Models/ModelEducacion.php';
     }
     class educacionControlador extends educacionModelo{
       /*  public function listarProvincia(){
            $departamento = mainModelo::limpiarCadena($_POST['departamento-reg']);
            $cn = mainModelo::Conectar();
            $datos = $cn -> query("SELECT * FROM provincia WHERE iddepartamento = '$departamento'");
            $option = '<option value = "0" > Seleccione Provincia </option>';
            while ($row = $datos ->fetch_array(MYSQLI_ASSOC)) {
               $option .= "<option value ='$row[id]'> $row[provincia] </option>";
            }
            return $option;
        } */
         public function agregarEducacionControlador(){
             $dni = mainModelo::limpiarCadena($_POST['dni-reg']);
             $nombre = mainModelo::limpiarCadena($_POST['nombre-reg']);
             $apellidoPaterno = mainModelo::limpiarCadena($_POST['apellidoPa-reg']);
             $apellidoMaterno = mainModelo::limpiarCadena($_POST['apellidoMa-reg']);
             $genero = mainModelo::limpiarCadena($_POST['optionsGenero']);
             $fecha = mainModelo::limpiarCadena($_POST['fecnacimieto-reg']);
             $edad = mainModelo::limpiarCadena($_POST['edad-reg']);
             $departamento = mainModelo::limpiarCadena($_POST['departamento-reg']);
             $direccion = mainModelo::limpiarCadena($_POST['direccion-reg']);
             $email = mainModelo::limpiarCadena($_POST['email-reg']);
             $celular = mainModelo::limpiarCadena($_POST['celular-reg']);
             $producto = mainModelo::limpiarCadena($_POST['producto-reg']);
             $servicio = mainModelo::limpiarCadena($_POST['servicio-reg']);
             $sede = mainModelo::limpiarCadena($_POST['sede-reg']);
             $psicologo = mainModelo::limpiarCadena($_POST['psicologo-reg']);
             $hclinica = mainModelo::limpiarCadena($_POST['hclinica-reg']);
             $observacion = mainModelo::limpiarCadena($_POST['observacion-reg']);
             $query1 = mainModelo::ejecutarConsultaSimple("SELECT dni FROM educacion WHERE dni = '$dni'");
             if($query1->rowCount()>=1){
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "ERROR",
                    "Texto" => "El DNI que ingreso ya se ecuentra registrado en el sistema",
                    "Tipo" =>"error"
                ];
             }else{
                 $query2 = mainModelo::ejecutarConsultaSimple("SELECT hclinica FROM educacion WHERE hclinica = '$hclinica'");
                     if($query2->rowCount()>=1){
                        $alerta = [
                            "Alerta" => "simple",
                            "Titulo" => "ERROR",
                            "Texto" => "Número de Historia Clinica registrada en el sistema, ingrese otro por favor",
                            "Tipo" =>"error"
                        ];
                     }else{
                        $dataEducacion = [
                            "dni" => $dni,
                            "nombre" => $nombre,
                            "apellidoPaterno" => $apellidoPaterno,
                            "apellidoMaterno" => $apellidoMaterno,
                            "genero" => $genero,
                            "fNacimiento" => $fecha,
                            "edad" => $edad,
                            "iddepartamento" => $departamento,
                            "direccion" => $direccion,
                            "email" => $email,
                            "celular" => $celular,
                            "codigoProducto" => $producto,
                            "codigoServicio" => $servicio,
                            "codigoSede" => $sede,
                            "codigoPsicologo" => $psicologo,
                            "hclinica" => $hclinica,
                            "observacion" => $observacion
                        ];
                        $guardarEducacion = educacionModelo::agregarEducacionModelo($dataEducacion);
                        if($guardarEducacion->rowCount()>=1){
                            $alerta = [
                                "Alerta" => "limpiar",
                                "Titulo" => "OK",
                                "Texto" => "EDUCACION REGISTRADO CON ÉXITO",
                                "Tipo" => "success"
                                ];
                        }else{
                            $alerta = [
                                "Alerta" => "simple",
                                "Titulo" => "ERROR",
                                "Texto" => "No se agregaron los datos del educacion",
                                "Tipo" => "error"
                                ];
                        }
                 }
             }
             return mainModelo::sweetAlert($alerta);
         }
     }