$(document).on("ready",incio_column);
function incio_column () {
	$("#nvartc").on("click",valarticulo);
}
function valarticulo () {
	var arsla=$("#slcm").val();
	if (arsla=="0" || arsla=="") {
		alert('Selecione el comunista');
		return false;
	}
	else{
		return true;
	}
}