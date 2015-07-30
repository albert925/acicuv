var axpr=/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
$(document).on("ready",inicio_pagina);
var contador=1;
var mal={color:"#BD2119"};
var normal={color:"#000"};
var bien={color:"#004900"};
function inicio_pagina () {
	if ($(window).width()<910) {
		$(window).scroll(movermenu);
	}
	$("#mn_mv").on("click",abrirmenu);
	$("#nvmsms").on("click",nuevo_mesdenunc);
	$(".submen").on("click",abrirsubmenu);
}
function abrirmenu () {
	if (contador==1) {
		$("#mnP").animate({left:"0"}, 500);
		contador=0;
	}
	else{
		$("#mnP").animate({left:"-100%"},500);
		contador=1;
	}
}
function abrirsubmenu () {
	var numerothis=$(this).attr("data-num");
	$(".children"+numerothis).slideToggle();
}
function movermenu () {
	if ($(window).width()>499) {
		var altura=180;
	}
	else{
		var altura=320;
	}
	if ($(window).scrollTop()>altura) {
		$("#cajmn").css({position:"fixed"});
	}
	else{
		$("#cajmn").css({position:"relative"});
	}
}
function nuevo_mesdenunc () {
	var dda=$("#nmevdn").val();
	var ddb=$("#corevdn").val();
	var ddc=$("#ausevdn").val();
	var ddd=$("#xxttevdn").val();
	if (dda=="") {
		$("#txDn").css(mal).text("ingrese nombres y apellidos");
		return false;
	}
	else{
		if (ddb=="" || !axpr.test(ddb)) {
			$("#txDn").css(mal).text("ingrese el correo valido");
			return false;
		}
		else{
			if (ddc=="") {
				$("#txDn").css(mal).text("ingrese el asunto");
				return false;
			}
			else{
				if (ddd=="") {
					$("#txDn").css(mal).text("ingrese el mensaje");
					return false;
				}
				else{
					$("#txDn").css(normal).text("");
					$("#txDn").prepend("<center><img src='imagenes/loadingb.gif' alt='loading' /></center>");
					$.post("new_denunmesj.php",{a:ddc,b:ddb,c:ddc,d:ddd},resuldenummsm);
					return false;
				}
			}
		}
	}
}
function resuldenummsm (jjss) {
	if (jjss=="2") {
		$("#txDn").css(bien).text("Mensaje enviado");
		location.reload(20);
	}
	else{
		$("#txDn").css(mal).html(jjss);
		return false;
	}
}