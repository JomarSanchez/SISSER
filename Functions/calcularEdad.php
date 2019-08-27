<?php
     include 'funciones.php';
     $fechaNaci = $_POST['fecnacimieto-reg'];
     $factual = date('Y-m-d');
     echo calcularEdad($fechaNaci,$factual)[0];