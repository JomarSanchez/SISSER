 <script>
     $(document).ready(function(){
        $('.btn-exit-system').on('click', function(e){
		 e.preventDefault();
		 var token = $(this).attr('href');
		 swal({
		  	title: '¿Estas seguro de cerrar sesión?',
		  	text: "La sesión actual se cerrara",
		  	type: 'warning',
		  	showCancelButton: true,
		  	confirmButtonColor: '#03A9F4',
		  	cancelButtonColor: '#F44336',
		  	confirmButtonText: '<i class="zmdi zmdi-run"></i> SI, Cerrar! ',
		  	cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> No, Cancelar!'
		 }).then(function(){
			 $.ajax({
				 url:'<?php echo SERVERURL;?>Ajax/loginAjax.php?token='+token,
				 success:function(data){
						 console.log("data",data);
					 if(data == "true"){
						 window.location.href="<?php echo SERVERURL;?>login/";
					 }else{
						 swal(
							 "ERROR",
							 "No se pudo cerrar la sesión",
							 "error"
						 );
					 }
				 }
			 })
	 	 });
	 });
    })
 </script>