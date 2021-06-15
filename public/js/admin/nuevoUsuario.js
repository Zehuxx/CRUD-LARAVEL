 

$(document).ready(function() {
	loadContent();
});

/*CARGA TODO EL CONTENIDO*/

function loadContent(){
	loadFunctions();
	loadDatePicker()
}

function loadFunctions(){
	$('#pais').on('change',function(){
		var pais = $(this).val();
		var dependent = $(this).data('dependent');
		$(this).attr("disabled", true);
		$.ajax({
			url: urlEstadosFetch,
			method:"POST",
			data:{pais:pais, _token: $('meta[name=csrf-token]').attr("content")},
			success:function(result){
				$('#pais').attr("disabled", false);
				$('#'+dependent).html(result);
			},
            error:function(e){
                console.log(e);
            }
		});
	});

    $('#estado').on('change',function(){
		var estado = $(this).val();
		var dependent = $(this).data('dependent');
		$(this).attr("disabled", true);
		$.ajax({
			url: urlCiudadesFetch,
			method:"POST",
			data:{estado:estado, _token: $('meta[name=csrf-token]').attr("content")},
			success:function(result){
				$('#estado').attr("disabled", false);
				$('#'+dependent).html(result);
			},
            error:function(e){
                console.log(e);
            }
		});
	});
}


/*FILTROS FECHA NACIMIENTO*/

function loadDatePicker(){
 
	$('#dFecNacimiento input').datepicker({
		language: 'es',
		format: 'yyyy-mm-dd',
		autoclose: true,
	});
	
}
