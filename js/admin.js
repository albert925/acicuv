$(document).on("ready",inicio_adminis);
function inicio_adminis () {
	$("#inadm").on("click",ingresadm);
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