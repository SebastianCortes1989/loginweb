$(document).ready(function()
{

	if($.Rut)
	{
		$(".rut").Rut(
		{
			on_error: function()
			{ 
				alert('El rut ingresado es incorrecto');
			}
		});
	};	

	$.datetimepicker.setLocale('es');

	$('.datetime').datetimepicker(
		{
			format: 'd/m/Y H:i',
		}
	);

	$(".date").datetimepicker(
		{
			timepicker: false,
			format: 'd/m/Y',
		}
	);

});