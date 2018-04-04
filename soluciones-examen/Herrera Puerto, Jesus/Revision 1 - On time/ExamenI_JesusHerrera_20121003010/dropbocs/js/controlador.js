$(document).ready(function(){
	console.log("El DOM ha sido cargado");
	console.log("Carpeta actual: " + $("#txt-carpeta-actual").val());
		$.ajax({
		url:"ajax/load_table.php",
		method: "POST",
		data: "carpeta="+$("#txt-carpeta-actual").val(),
		success:function(res){
			$("tbody").html(res);
		}
	});
});

function detalleRegistro(res){
	console.log($("#u-m"+res).text())
	details = `
					<tr>
	                 	<td>${res}</td>
	                 	<td >${document.getElementById("u-m"+res).innerHTML}</td>
	                 	<td >${document.getElementById("u"+res).innerHTML}</td>
	                 	<td >${document.getElementById("t"+res).innerHTML}</td>
	               </tr>`

			$("tbody[id=tbody-detalles]").html(details);
			$("#modal-detalle").modal("show");
}

$("#crear-carpeta").click(function(){

	data_to_send = "carpeta="+$("#txt-carpeta-actual").val()+"&"+"carpeta-nueva="+$("#nombre-carpeta").val()+"&"+
					"fecha-creacion="+$("#fecha-creacion").val()+"&fecha-modificacion="+$("#fecha-modificacion").val()+"&"+
					"usuario="+$("#usuario").val()+"&tamanio="+$("#tamanio").val();
	$.ajax({
		url:"ajax/create-directory.php",
		method: "POST",
		data: data_to_send,
		success:function(res){
			if(res=="success"){
			alert("Se ha creado carpeta con éxito")
			refresh();
		}
			else{
			alert("Ha ocurrido un error")	
		}

		}
	})
})

$("#crear-archivo").click(function(){

	data_to_send = "carpeta="+$("#txt-carpeta-actual").val()+"&"+"archivo-nuevo="+$("#nombre-archivo").val()+"&"+
					"fecha-creacion="+$("#fecha-creacion-archivo").val()+"&fecha-modificacion="+$("#fecha-modificacion-archivo").val()+"&"+
					"usuario="+$("#usuario-archivo").val()+"&tamanio="+$("#tamanio-archivo").val();
	$.ajax({
		url:"ajax/create-file.php",
		method: "POST",
		data: data_to_send,
		success:function(res){
			if(res=="success"){
			alert("Se ha creado archivo con éxito")
			refresh();
		}
			else{
			alert("Ha ocurrido un error")	
		}

		}
	})
})
function refresh(){
			$.ajax({
		url:"ajax/load_table.php",
		method: "POST",
		data: "carpeta="+$("#txt-carpeta-actual").val(),
		success:function(res){
			$("tbody").html(res);
		}
	});
}