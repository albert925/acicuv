$(document).on("ready",inicio_pasas);
function inicio_pasas () {
	$("#nvpasand").on("click",validselects);
	$("#nvtppas").on("click",nuevo_tipo);
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