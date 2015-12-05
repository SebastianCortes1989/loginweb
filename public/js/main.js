$(document).ready(function(){

	if($.Rut){
		$(".rut").Rut({
			on_error: function(){ 
				alert('El rut ingresado es incorrecto');
			}
		});
	};
	
	if($.datepicker){
		$(".date").datepicker();
	};

});