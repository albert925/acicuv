$(document).on("ready",inicio_denuncia);
function inicio_denuncia () {
	$("#nvpubli").on("click",nuevo_publicidad);
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
function nuevo_publicidad () {
	var ppa=$("#ttpu").val();
	var ppc=$("#lkpu").val();
	var ppd=$("#nups").val();
	var ppb=$("#puig")[0].files[0];
	var nameppb=ppb.name;
	var exteppb=nameppb.substring(nameppb.lastIndexOf('.')+1);
	var tamppb=ppb.size;
	var tipoppb=ppb.type;
	if (ppd=="0" || ppd=="") {
		$("#txA").css(mal).text("Selecione la posición");
		return false;
	}
	else{
		if (ppa=="") {
			$("#txA").css(mal).text("Ingrese el titulo");
			return false;
		}
		else{
			if (!es_imagen(exteppb)) {
				$("#txA").css(mal).text("Tpo de imagen no permitido");
				return false;
			}
			else{
				$("#txA").css(normal).text("");
				var formu=new FormData($("#glPu")[0]);
				$.ajax({
					url: '../../../new_publicidad.php',
					type: 'POST',
					data: formu,
					cache: false,
					contentType: false,
					processData: false,
					beforeSend:function () {
						$("#txA").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
					},
					success:reulimg,
					error:function () {
						$("#txA").css(mal).text("Ocurrió un error");
						$("#txA").fadeIn();$("#txA").fadeOut(3000);
					}
				});
				return false;
			}
		}
	}
}
function reulimg (dtst) {
	if (dtst=="2") {
		$("#txA").css(mal).text("Carpeta sin permisos o resolución de imagen no permitido");
		$("#txA").fadeIn();$("#txA").fadeOut(3000);
		return false;
	}
	else{
		if (dtst=="3") {
			$("#txA").css(mal).text("Tamaño no permitido");
			$("#txA").fadeIn();$("#txA").fadeOut(3000);
			return false;
		}
		else{
			if (dtst=="4") {
				$("#txA").css(mal).text("Carpeta sin permisos o resolución de imagen no permitido");
				$("#txA").fadeIn();$("#txA").fadeOut(3000);
				return false;
			}
			else{
				if (dtst=="5") {
					$("#txA").css(bien).text("Publicidad ingresado");
					$("#txA").fadeIn();$("#txA").fadeOut(3000);
					location.reload(20);
				}
				else{
					$("#txA").css(mal).html(dtst);
					$("#txA").fadeIn();
					return false;
				}
			}
		}
	}
}