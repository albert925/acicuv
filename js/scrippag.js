$(document).on("ready",inicio_pagina);
var contador=1;
function inicio_pagina () {
	if ($(window).width()<910) {
		$(window).scroll(movermenu);
	}
	$("#mn_mv").on("click",abrirmenu);
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