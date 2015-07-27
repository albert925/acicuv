$(document).on("ready",inicio_siti);
function inicio_siti () {
	$("#fcmigl").on("click",cambiarimgsitio);
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
function cambiarimgsitio () {
	var ida=$("#idstgl").val();
	var gfg=$("#fgsgt")[0].files[0];
	var namegfg=gfg.name;
	var extegfg=namegfg.substring(namegfg.lastIndexOf('.')+1);
	var tamgfg=gfg.size;
	var tipogfg=gfg.type;
	if (ida=="0" || ida=="") {
		$("#txB").css(mal).text("Id de sitio no disponible");
		return false;
	}
	else{
		if (!es_imagen(extegfg)) {
			$("#txB").css(mal).text("Tipo de imagen no disponible");
			return false;
		}
		else{
			var formu=new FormData($("#stlG")[0]);
		$.ajax({
				url: '../../../modifimgsitio.php',
				type: 'POST',
				data: formu,
				cache: false,
				contentType: false,
				processData: false,
				beforeSend:function () {
					$("#txB").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
				},
				success:reulimg,
				error:function () {
					$("#txB").css(mal).text("Ocurrió un error");
					$("#txB").fadeIn();$("#txB").fadeOut(3000);
				}
			});
		return false;
		}
	}
}
function reulimg (dtst) {
	if (dtst=="2") {
		$("#txB").css(mal).text("Carpeta sin permisos o resolución de imagen no permitido");
		$("#txB").fadeIn();$("#txB").fadeOut(3000);
		return false;
	}
	else{
		if (dtst=="3") {
			$("#txB").css(mal).text("Tamaño no permitido");
			$("#txB").fadeIn();$("#txB").fadeOut(3000);
			return false;
		}
		else{
			if (dtst=="4") {
				$("#txB").css(mal).text("Carpeta sin permisos o resolución de imagen no permitido");
				$("#txB").fadeIn();$("#txB").fadeOut(3000);
				return false;
			}
			else{
				if (dtst=="5") {
					$("#txB").css(bien).text("Imagen subida");
					$("#txB").fadeIn();$("#txB").fadeOut(3000);
					location.reload(20);
				}
				else{
					$("#txB").css(mal).html(dtst);
					$("#txB").fadeIn();
					return false;
				}
			}
		}
	}
}