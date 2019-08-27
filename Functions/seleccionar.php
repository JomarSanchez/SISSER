 <?php
         require_once '../Models/Conexion.php';
         function listarDepartamento(){
             $state = mainModelo::Conectar()->prepare("SELECT * FROM departamento");
             $state ->execute();
             $lista = '<option value = "0" > Seleccione Departamento </option>';
             while ($row = $state->fetch_array(MYSQLI_ASSOC)) {
                 $lista .= "<option value ='$row[id]'> $row[departamento] </option>";
             }
             return $lista;
         }
      echo listarDepartamento();
 ?>