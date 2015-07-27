$(document).on("ready",inicio_csradmin);
function inicio_csradmin () {
	$("#btA").on("click",abrirA);
	$("#btB").on("click",abrirB);
	$(".doll").on("click",confirborr);
}
function confirborr () {
	return confirm("Estas seguro de eliminarlo?");
}
function abrirA (aa) {
	aa.preventDefault();
	$("#cjA").each(animarA);
}
function abrirB (bb) {
	bb.preventDefault();
	$("#cjB").each(animarB);
}
function animarA () {
	if ($(window).width()>800) {
		var hag="250px";
	}
	else{
		var hag="350px";
	}
	var alto=$(this).css("height");
	if (alto==hag) {
		$(this).animate({height:"0"}, 500);
	}
	else{
		$(this).animate({height:hag}, 500);
	}
}
function animarB () {
	if ($(window).width()>800) {
		var hag="650px";
	}
	else{
		var hag="750px";
	}
	var alto=$(this).css("height");
	if (alto==hag) {
		$(this).animate({height:"0"}, 500);
	}
	else{
		$(this).animate({height:hag}, 500);
	}
}