var expr=/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
$(document).on("ready",inicio_contacto);
var mal={color:"#BD2119"};
var normal={color:"#000"};
var bien={color:"#004900"};
function inicio_contacto () {
	$("#nvxjs").on("click",nuevo_mensaje);
}
function nuevo_mensaje () {
	var ssa=$("#nmsj").val();
	var ssb=$("#corsj").val();
	var ssc=$("#xxsj").val();
	var ssd=$("#tlsj").val();
	if (ssa=="") {
		$("#jxA").css(mal).text("Ingrese el nombre");
		return false;
	}
	else{
		if (ssb=="" || !expr.test(ssb)) {
			$("#jxA").css(mal).text("Ingrese un correo válido");
			return false;
		}
		else{
			if (ssd=="") {
				$("#jxA").css(mal).text("Ingrese un número de teléfono");
				return false;
			}
			else{
				if (ssc=="" || ssc.length<6) {
					$("#jxA").css(mal).text("Ingrese el mensaje");
					return false;
				}
				else{
					$("#jxA").css(normal).text("");
					$("#jxA").prepend("<center><img src='../imagenes/loadingb.gif' alt='loading' /></center>");
					$.post("new_mensaje.php",{a:ssa,b:ssb,c:ssc,d:ssd},resulmensaje);
					return false;
				}	
			}
		}
	}
}
function resulmensaje (eemt) {
	if (eemt=="2") {
		$("#jxA").css(bien).text("Mensaje enviado");
		location.reload(20);
	}
	else{
		$("#jxA").css(mal).html(eemt);
		return false;
	}
}