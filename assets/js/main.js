$(function(){
	var main = {};

	(function(app){
		app.init = function(){
			app.bind();
		}

		app.bind = function(){
			$("#btnAceptarPeople").on('click', function(e){
				e.preventDefault();

				var frm      = $("#frmPersonas"),
					nombre   = $("#nombre").val(),
					apellido = $("#apellido").val();

				if(nombre && apellido)
					frm.submit();
				else
					alert('El nombre y el apellido son campos obligatorios');
			});

			$("#btnAceptarRooms").on('click', function(e){
				e.preventDefault();

				var frm      = $("#frmSalas"),
					nombre   = $("#nombre").val();

				if(nombre)
					frm.submit();
				else
					alert('El nombre es un campo obligatorio');
			});

			$(document).on('click', '.editRooms', function(e){
				e.preventDefault();

				var id     = $(this).data('id'),
				    nombre = $(this).data('nombre');

				$("#idRooms").val(id);
				$("#nombre").val(nombre);

				if($("#idRooms").val() > 0)
					$("#btnCancelarRooms").css('display', 'inline-block');
			});

			$("#btnCancelarRooms").on('click', function(){
				$("#idRooms").val(0);
				$("#nombre").val('');
				$(this).css('display', 'none');
			});

			$(document).on('click', '.editPeople', function(e){
				e.preventDefault();

				var id       = $(this).data('id'),
				    nombre   = $(this).data('nombre'),
				    apellido = $(this).data('apellido');

				$("#idPeople").val(id);
				$("#nombre").val(nombre);
				$("#apellido").val(apellido);

				if($("#idPeople").val() > 0)
					$("#btnCancelarPeople").css('display', 'inline-block');
			});

			$("#btnCancelarPeople").on('click', function(){
				$("#idPeople").val(0);
				$("#nombre").val('');
				$("#apellido").val('');
				$(this).css('display', 'none');
			});

			$("#btnAceptarAssign").on('click', function(e){
				e.preventDefault();

				var frm     = $("#frmAsignarSalas"),
					persona = $("#persona").val(),
					sala    = $("#sala").val(),
					fecha   = $("#fecha").val();

				if(persona && sala && fecha)
					frm.submit();
				else
					alert('Todos los campos son obligatorios');
			});

			$(document).on('click', '.editAssign', function(e){
				e.preventDefault();

				var id      = $(this).data('id'),
				    persona = $(this).data('id_persona'),
				    sala    = $(this).data('id_sala'),
				    fecha   = $(this).data('fecha');

				//Formateo la fecha para que el input datetime me lo tome bien al momento de editar
				fecha = fecha.split(':');
				fecha = fecha[0]+':'+fecha[1];
				fecha = fecha.replace(' ', 'T');

				$("#idAssign").val(id);
				$("#persona").val(persona);
				$("#sala").val(sala);
				$("#fecha").val(fecha);

				if($("#idAssign").val() > 0)
					$("#btnCancelarAssign").css('display', 'inline-block');
			});

			$("#btnCancelarAssign").on('click', function(){
				$("#idAssign").val(0);
				$("#persona").val('');
				$("#sala").val('');
				$("#fecha").val('');
				$(this).css('display', 'none');
			});
		}

		app.init();
	})(main);
});