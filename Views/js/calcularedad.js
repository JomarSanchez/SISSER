 $(document).ready(function() {
     $("#fnacimiento").datepicker({
         changeMonth : true,
         changeYear : true,
         yearRange : '1900:' + 2019,
         dateFormat : 'yy-mm-dd'
     });
     $("#fnacimiento").change(function(){
         $.ajax({
             type : "POST",
             data : "fecnacimieto-reg=" + $("#fnacimiento").val(),
             url : "../Functions/calcularEdad.php",
             success:function(respuesta){
                 var capturarEdad = document.getElementById("edad");
                 $('#lflo').addClass('is-focused');
                 capturarEdad.value = respuesta;
             }
         });
     });
 });


