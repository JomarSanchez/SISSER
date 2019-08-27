<?php
     class vistasModelo{
         protected function obtenerVistaModelo($vistas){
             $listaBlanca = ["account","admin","adminlist","adminsearch","data","educacion","educacionlist",
                           "home","pacientes","pacienteslist","parentesco","parentescolist","participante","participantelist","participantesearch","prospecto","prospectolist", "postulantes", "prospectosearch","psicologas","psicologaslist","psicologassearch","search","producto","productolist","sede","sedelist","servicio","serviciolist","consulta"];
             if(in_array($vistas,$listaBlanca)){
                 if(is_file("./Views/app/".$vistas."-view.php")){
                     $content = "./Views/app/".$vistas."-view.php";
                 }else{
                     $content = "login";
                 }
             }elseif($vistas == "login"){
                 $content = "login";
             }elseif($vistas == "index"){
                 $content = "login";
             }else{
                 $content = "404";
             }
             return $content;
         }
     }