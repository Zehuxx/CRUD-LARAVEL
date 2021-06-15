var tableVacantes = null;
var vacanteId = 0;

var eyeColNum = 0; 
var nombreColNum = 1;
var paisColNum = 2;
var relacionColNum = 3; 
var fecPublicacionColNum = 4;
var fecVencimientoColNum = 5;

$(document).ready(function() {
	loadContent();
});

/*CARGA TODO EL CONTENIDO*/

function loadContent(){
	loadTable();
	$.fn.dataTable.ext.errMode = 'none'; // si se da algun error con los datos del datatable el error no saldra como una alerta
										 // solo se mostrara en consola, comentarlo si se desea ver los alerts
}

/*DEFINICION  DE COLUMNAS USADA EN DATATABLE*/

var columnsDef = [
{ data: 'descripcion',
render: function(data, type, row, meta){
	return '<button class="btn btn-primary btn-circle" onClick="ShowDesVacante('+ row.id_vacante +',\'' + row.nombre + '\',\'' + row.descripcion  + '\');"><i class="fas fa-eye"></i></button>';
}
},
	{ data: 'nombre', name: 'a.nombre'}, // se debe mapear el nombre de la columna con su respectivo
	{ data: 'nombre_pais', name: 'c.nombre'}, //alias nombrado en la consulta, de lo contrario no se puede filtrar
	{ data: 'nombre_relacion', name: 'd.nombre'}, 
	{ data: 'fecha_publicacion', name: 'a.fecha_publicacion'},
	{ data: 'fecha_vencimiento', name: 'a.fecha_vencimiento'},
	{ data: 'id_vacante',
	render: function(data){
			return ""; //se hace asi para que cuando se cambie el tamaño de la tabla aparezca
		}              // una nueva columna con el boton que muestra las columnas que se ocultan
	}
	];

/*CONFIGURACION DE OPCIONES PARA LA TABLA */

function loadTable(){
    var domContent = '<"toolbar">brtip';
    tableVacantes = $('#tableVacantes').DataTable({
        processing: true,
        serverSide: true,
        ajax: urlTableVacantes,
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
        targets: [eyeColNum],
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
    order: [[fecPublicacionColNum, 'desc']],
    pageLength: 10,
    autoWidth: false,
    responsive: { //hace que el boton de row childs aparezca a la derecha
        details: {
            type: 'column',
            target: -1
        }
    },
    dom: domContent,
    lengthChange: false, //oculta el selector del tamño de paginas a mostrar
    sDom: 't'// hay que dejarlo asi, para ocultar el input de busqueda
                // y funcione el search con los demas inputs
            });
}


/*CARGA LA INFORMACION DE LA VACANTE EN LA MODAL Y LA MUESTRA, SUMMERNOTE ES UN EDITOR DE TEXTO
  ENRIQUECIDO, EN EL MODAL SE DESHABILITAN TODAS LAS OPCIONES DE EDICION Y SE DEJA SOLO EN LECTURA */
	
function ShowDesVacante(id_vacante, vacanteNombre, descripcion){
    $('#aplicarVacante ').attr('disabled', false);
    vacanteId = id_vacante;
    $("#vacantes-titulo").html(vacanteNombre);
    $('#desVacante').summernote('code', descripcion);
    $('#modal-vacantes-user').modal('show'); 
}


/*CONFIGURACION DEL EDITOR DE TEXTO PARA MOSTRAR LA DESCRIPCION DE LA VACANTE*/	
$('#desVacante').summernote({
    toolbar: [],
    height: 350,  //altura del area que contiene el texto
    disableResizeEditor: true, //evita cambiar el tamño del textarea que contiene la descripcion de la vacante
    disableDragAndDrop: true
});
$('#desVacante').summernote('disable');
$('.note-statusbar').hide();