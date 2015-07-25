$(document).on("ready",inicio_adminis);
function inicio_adminis () {
	$("#inadm").on("click",ingresadm);
	$("#cambA").on("click",cambiarA);
	$("#cambB").on("click",cambiarB);
}
var mal={color:"#BD2119"};
var normal={color:"#000"};
var bien={color:"#004900"};
function ingresadm () {
	var ada=$("#adus").val();
	var adb=$("#adps").val();
	if (ada=="") {
		$("#txA").css(mal).text("Ingrese el nombre de usuario");
		return false;
	}
	else{
		if (adb=="") {
			$("#txA").css(mal).text("Ingrese la contraseña");
			return false;
		}
		else{
			$("#txA").css(normal).text("");
			$("#txA").prepend("<center><img src='../imagenes/loadingb.gif' alt='loading' /></center>");
			$.post("ingre_adm.php",{a:ada,b:adb},resulingresoad);
			return false;
		}
	}
}
function resulingresoad (srty) {
	if (srty=="2") {
		$("#txA").css(mal).text("Usuario o contraseña incorrectos");
		return false;
	}
	else{
		if (srty=="3") {
			$("#txA").css(bien).text("Ingresando...");
			window.location.href="administrador";
		}
		else{
			$("#txA").css(mal).html(srty);
			return false;
		}
	}
}
function cambiarA () {
	var ida=$(this).attr("data-adm");
	var cfa=$("#usfF").val();
	if (cfa=="") {
		$("#txB").css(mal).text("Ingrese el nombre de usuario");
	}
	else{
		$("#txB").css(normal).text("");
		$("#txB").prepend("<center><img src='../../imagenes/loadingb.gif' alt='loading' /></center>");
		$.post("camusadm.php",{fa:ida,a:cfa},resultA);
	}
}
function resultA (rra) {
	if (rra=="2") {
		$("#txB").css(mal).text("Nombre de usuario ya existe");
	}
	else{
		if (rra=="3") {
			$("#txB").css(bien).text("Cambiado");
			location.reload(20);
		}
		else{
			$("#txB").css(mal).html(rra);
		}
	}
}
function cambiarB () {
	var idb=$(this).attr("data-adm");
	var passac=$("#coac").val();
	var passnva=$("#cona").val();
	var passnvb=$("#conb").val();
	if (passac=="") {
		$("#txC").css(mal).text("Ingrese la contraseña actual");
	}
	else{
		if (passnva=="" || passnva.length<6) {
			$("#txC").css(mal).text("Contraseña nueva mínimo 6 dígitos");
		}
		else{
			if (passnvb!=passnva) {
				$("#txC").css(mal).text("las contraseñas no coinciden");
			}
			else{
				$("#txC").css(normal).text("");
				$("#txC").prepend("<center><img src='../../imagenes/loadingb.gif' alt='loading' /></center>");
				$.post("modifpassadm.php",{fb:idb,a:passac,b:passnva},resultB);
			}
		}
	}
}
function resultB (rrb) {
	if (rrb=="2") {
		$("#txC").css(mal).text("Contraseña actual incorrecta");
	}
	else{
		if (rrb=="3") {
			$("#txC").css(bien).text("Contraseña cambiada");
			setTimeout(direccionar,1500);
		}
		else{
			$("#txC").css(mal).html(rrb);
		}
	}
}
function direccionar () {
	window.location.href="../../cerrar";
}