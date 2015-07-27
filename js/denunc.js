$(document).on("ready",inicio_denuncia);
function inicio_denuncia () {
	$(".acdesdn").on("change",actdesdenunc);
}
var mal={color:"#BD2119"};
var normal={color:"#000"};
var bien={color:"#004900"};
function actdesdenunc () {
	var selida=$(this).attr("data-id");
	var numi=$("#selesdn_"+selida).val();
	if (numi=="0" || numi=="") {
		alert("selecione el estado activado o desactivado");
	}
	else{
		$.post("camb_estado.php",{fad:selida,a:numi},resulestado);
	}
}
function resulestado (res) {
	if (res=="2") {
		alert("Estado cambiado");
		location.reload(20);
	}
	else{
		alert(res);
	}
}