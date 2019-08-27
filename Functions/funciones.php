<?php
 function calcularEdad($fechaNaci,$factual){
    $date1 = date_create($fechaNaci);
    $date2 = date_create($factual);
    $edad = date_diff($date1,$date2);
    $tiempo = array();
    foreach ($edad as $valor) {
        $tiempo[] = $valor;
     }
    return $tiempo;
}