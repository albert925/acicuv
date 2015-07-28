$(document).on("ready",inicio_pasas);
function inicio_pasas () {
	$("#nvpasand").on("click",validselects);
	$("#nvtppas").on("click",nuevo_tipo);
	$("#camvspu").on("click",cambiar_imagen);
	$(".cambtip").on("click",camb_pasas);
}
var mal={color:"#BD2119"};
var normal={color:"#000"};
var bien={color:"#004900"};
function es_imagen (tipederf) {
	switch(tipederf.toLowerCase()){
		case 'jpg':
			return true;
			break;
		case 'gif':
			return true;
			break;
		case 'png':
			return true;
			break;
		case 'jpeg':
			return true;
			break;
		default:
			return false;
			break;
	}
}
function validselects () {
	var sella=$("#sltp").val();
	if (sella=="0" || sella=="") {
		alert("Selecione el tipo");
		return false;
	}
	else{
		return true;
	}
}
function nuevo_tipo () {
	var tttpas=$("#nmtp").val();
	if (tttpas=="") {
		$("#txB").css(mal).text("Ingrese el nombre");
		return false;
	}
	else{
		$("#txB").css(normal).text("");
		$("#txB").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
		$.post("new_tipo.php",{a:tttpas},resultipo);
		return false;
	}
}
function resultipo (rrA) {
	if (rrA=="2") {
		$("#txB").css(mal).text("Nombre ingresado ya existe");
		return false;
	}
	else{
		if (rrA=="3") {
			$("#txB").css(bien).text("Tipo ingresado");
			location.reload(20);
		}
		else{
			$("#txB").css(mal).html(rrA);
			return false;
		}
	}
}
function camb_pasas () {
	var ida=$(this).attr("data-id");
	var nma=$("#nmF_"+ida).val();
	if (nma=="") {
		$("#txB_"+ida).css(mal).text("ingrese el nombre");
	}
	else{
		$("#txB_"+ida).css(normal).text("");
		$("#txB_"+ida).prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
		$.post("modif_tipo.php",{fa:ida,a:nma},function (sttp) {
			if (sttp=="2") {
				$("#txB_"+ida).css(bien).text("nombre modificado");
				location.reload(20);
			}
			else{
				$("#txB_"+ida).css(mal).html(sttp);
			}
		});
	}
}
function cambiar_imagen () {
	var ida=$("#idda").val();
	var gif=$("#jhpas")[0].files[0];
	var namegif=gif.name;
	var extegif=namegif.substring(namegif.lastIndexOf('.')+1);
	var tamgif=gif.size;
	var tipogif=gif.type;
	if (!es_imagen(extegif)) {
		$("#txC").css(mal).text("Tipo de imagen no permitido");
		return false;
	}
	else{
		$("#txC").css(normal).text("");
		var formu=new FormData($("#glPa")[0]);
		$.ajax({
			url: '../../../modifcimgpasando.php',
			type: 'POST',
			data: formu,
			cache: false,
			contentType: false,
			processData: false,
			beforeSend:function () {
				$("#txC").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
			},
			success:reulimg,
			error:function () {
				$("#txC").css(mal).text("Ocurrió un error");
				$("#txC").fadeIn();$("#txC").fadeOut(3000);
			}
		});
		return false;
	}
}
function reulimg (dtst) {
	if (dtst=="2") {
		$("#txC").css(mal).text("Carpeta sin permisos o resolución de imagen no permitido");
		$("#txC").fadeIn();$("#txC").fadeOut(3000);
		return false;
	}
	else{
		if (dtst=="3") {
			$("#txC").css(mal).text("Tamaño no permitido");
			$("#txC").fadeIn();$("#txC").fadeOut(3000);
			return false;
		}
		else{
			if (dtst=="4") {
				$("#txC").css(mal).text("Carpeta sin permisos o resolución de imagen no permitido");
				$("#txC").fadeIn();$("#txC").fadeOut(3000);
				return false;
			}
			else{
				if (dtst=="5") {
					$("#txC").css(bien).text("Imagen subida");
					$("#txC").fadeIn();$("#txC").fadeOut(3000);
					location.reload(20);
				}
				else{
					$("#txC").css(mal).html(dtst);
					$("#txC").fadeIn();
					return false;
				}
			}
		}
	}
}