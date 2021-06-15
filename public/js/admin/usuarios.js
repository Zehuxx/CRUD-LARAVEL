var tableUsuariosAdmin = null;

var filtroNombres = '';
var filtroRol = '';
var filtroEmail = '';
var filtroTelefono = '';
var filtroCedula = '';
var filtroFechaN = '';
var filtroResidencia = '';


var updateColNum = 0;
var deleteColNum = 1;
var nombresColNum = 2;
var rolColNum = 3;
var emailColNum = 4;
var telefonoColNum = 5;
var cedulaColNum = 6;
var fechaNColNum = 7;
var residenciaColNum = 8;

var exportCols = [nombresColNum, rolColNum, emailColNum, emailColNum, telefonoColNum, cedulaColNum,	fechaNColNum, residenciaColNum];

$(document).ready(function() {
	loadContent();
});

/*CARGA TODO EL CONTENIDO*/

function loadContent(){
	loadTable();
	loadFilters();
	$.fn.dataTable.ext.errMode = 'none'; // si se da algun error con los datos del datatable el error no saldra como una alerta
										 // solo se mostrara en consola, comentarlo si se desea ver los alerts

}


/*DEFINICION  DE COLUMNAS USADA EN DATATABLE*/

var columnsDef = [
	{ data: 'id',
		render: function(data, type, row, meta){
			return '<a class="btn btn-success  btn-sm btn-circle" href="'+ rutaEditarUsuario.replace(':id', row.id) +'"><i class="fas fa-edit"></i></a>';
		}
	},
	{ data: 'id',
		render: function(data, type, row, meta){
				return '<button class="btn btn-danger btn-sm btn-circle" onClick="confirmarEliminacion('+ data +');"><i class="fas fa-trash"></i></button>';
		}
	},
	{ data: 'nombre', name: 'a.nombre'},
	{ data: 'nombre_rol', name: 'b.nombre'}, //alias nombrado en la consulta, de lo contrario no se puede filtrar
	{ data: 'email', name: 'a.email'},
	{ data: 'celular', name: 'a.celular'},
	{ data: 'cedula', name: 'a.cedula'},
	{ data: 'fecha_nacimiento', name: 'a.fecha_nacimiento'},
	{ data: 'nombre_ciudad', name: 'c.nombre'},
	{ data: 'id',
		render: function(data){
				return ""; //se hace asi para que cuando se cambie el tamaño de la tabla aparezca
			}              // una nueva columna con el boton que muestra las columnas que se ocultan
	}
	];

	/*CONFIGURACION DE OPCIONES PARA LA TABLA */

	function loadTable(){
		var domContent = '<"toolbar">Brtipl';
		var docsTitle = 'Usuarios';
		tableUsuariosAdmin = $('#tableUsuariosAdmin').DataTable({
			processing: true,
			serverSide: true,
			ajax: urlTableUsuarios,
			language: {
				url: dtSpanishJsonUrl
			},
			oLanguage: {
				sUrl: dtSpanishJsonUrl
			},
			select: {
			style: 'single'//permite la seleccion de una fila a la vez
		},
		columns: columnsDef,
		columnDefs: [ {
			targets: [updateColNum, deleteColNum],
			data: null,
			orderable: false,
			searchable: false,
			bLengthChange: false,
			width: "5%"
		},
		{
			className: 'control',
			orderable: false,
			targets:   -1
		}],
		order: [[nombresColNum, 'desc']],
		paging: true,
		pageLength: 10,
		autoWidth: false,
		responsive: { //hace que el boton de row childs aparezca a la derecha
			details: {
				type: 'column',
				target: -1
			}
		},
		dom: domContent,
		buttons: [
			{
				extend: 'excelHtml5',
				titleAttr: 'Exportar a Excel',
				title: docsTitle,
				text: '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Excel',//'Excel',
				exportOptions: {
					columns: exportCols,
					modifier: {
						selected: null
	                }
				}
			},
			{ 
				extend: 'pdfHtml5',
				orientation: 'landscape',
				titleAttr: 'Exportar a PDF',
				title: docsTitle,
				text: '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF',
				exportOptions: {
					columns: exportCols,
					modifier: {
						selected: null
	                }
				}
			},
			{
				extend: 'print',
				title: docsTitle,
				text: '<i class="fa fa-print" aria-hidden="true"></i> Imprimir',
				exportOptions: {
					columns: exportCols,
					modifier: {
						selected: null
	                }
				}
			}
		],
		//lengthChange: false, //oculta el selector del tamaño de paginas a mostrar
		sDom: 't',// hay que dejarlo asi, para ocultar el input de busqueda
				 // y funcione el search con los demas inputs
				 fnInitComplete: function(){
				 	$('div.toolbar').html('<a id="btnAgregarUsuario" href="'+rutaNuevoUsuario+'" class="btn btn-warning"><i class="fa fa-plus"></i>&nbsp;Agregar usuario</a> &nbsp;');
				 }
				});

	}

/* FUNCION QUE OPTIENE EL VALOR DE LOS INPUTS PARA SU POSTERIOR USO EN EL FILTRADO*/
function getFilterValues(){
	filtroNombres =  $('#filtroNombres').val().trim();
	filtroRol =  $('#filtroRol').val().trim();
	filtroEmail =  $('#filtroEmail').val().trim();
	filtroTelefono =  $('#filtroTelefono').val().trim();
	filtroCedula =  $('#filtroCedula').val().trim();
	filtroFechaN =  $('#filtroFechaN').val().trim();
	filtroResidencia =  $('#filtroResidencia').val().trim();
}

/*DEFINE QUE CADA VEZ QUE SE CAMBIE EL VALOR DE LOS FILTROS SE RECARGUEN LOS DATOS EN LA TABLA*/
function loadFilters(){
	$('#filtroNombres').on('input', function() {
		reloadTable();
	});

	$('#filtroRol').on('input', function() {
		reloadTable();
	});

	$('#filtroEmail').on('input', function() {
		reloadTable();
	});

	$('#filtroTelefono').on('input', function() {
		reloadTable();
	});

	$('#filtroCedula').on('input', function() {
		reloadTable();
	});

	$('#filtroFechaN').on('input', function() {
		reloadTable();
	});

	$('#filtroResidencia').on('input', function() {
		reloadTable();
	});

}

/*FUNCION QUE RECARGA LOS DATOS EN LA TABLA, PRIMERO OPTIENE EL VALOR DE LOS FILTROS Y LUEGO HACE EL
FILTRADO DE LOS VALORES POR COLUMNA*/
function reloadTable(){
	getFilterValues();

	tableUsuariosAdmin.column(nombresColNum).search(filtroNombres);
	tableUsuariosAdmin.column(rolColNum).search(filtroRol);
	tableUsuariosAdmin.column(emailColNum).search(filtroEmail);
	tableUsuariosAdmin.column(telefonoColNum).search(filtroTelefono);
	tableUsuariosAdmin.column(cedulaColNum).search(filtroCedula)
	tableUsuariosAdmin.column(fechaNColNum).search(filtroFechaN)
	tableUsuariosAdmin.column(residenciaColNum).search(filtroResidencia).draw();

}

/*MODAL QUE SE MUESTRA PARA CONFIRMAR SI EL USUARIO ESTA SEGURO DE ELIMINAR EL USUARIO*/
function confirmarEliminacion(id){
	Swal.fire({
		title: '¿Estás seguro?',
		text: "",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, eliminarlo!',
		cancelButtonText: 'Cancelar'
	}).then((result) => {
		if (result.value) {
			borrarUsuario(id);
		}
	})
}

/*FUNCION QUE BORRA EL USUARIO DE MODO ASINCRONO (SIN RECARGAR LA PAGINA)*/
function borrarUsuario(id){
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax(
	{
		url: rutaBorrarUsuario.replace(':id', id),
		type: 'DELETE',
		dataType: "JSON",
		data: {
			"id": id
		},
		success: function (response)
		{
			if (response.status) {
				Swal.fire(
				'Eliminado!',
				response.message,
				'success'
				);
				reloadTable();
			}else{
				Swal.fire(
				'Error!',
				response.message,
				'error'
				);
			}

		},
		error: function(xhr) {
			console.log(xhr.responseText); // this line will save you tons of hours while debugging
			// do something here because of error
		}
	});
}

