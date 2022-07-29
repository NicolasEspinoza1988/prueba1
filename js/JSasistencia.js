function sendToServer(element ){

if( element.checked == true){
	 var separador= element.id.split("_");
	 var tid = separador[0];
	 var tdia = separador[1];
	 var tmes = separador[2];
	 var tcurso = separador[3];
	//alert(tid + " dia=" + tdia + " mes="+ tmes + " curso="+ tcurso);
	var xhttp = new XMLHttpRequest();
	var url="http://www.sgsintranet.cl/registro_inasistencia.php?idalumno="+tid+ "&dia=" +tdia+"&mes="+tmes+"&curso="+tcurso;
	 //alert(url);
	xhttp.open("GET", url, true);
	xhttp.send();
	//alert("Inasistencia Agregada.");
}
else
{
	 var separador= element.id.split("_");
	 var tid = separador[0];
	 var tdia = separador[1];
	 var tmes = separador[2];
	 var tcurso = separador[3];
	//alert(tid + " dia=" + tdia + " mes="+ tmes + " curso="+ tcurso);
	var xhttp = new XMLHttpRequest();
	var url="http://www.sgsintranet.cl/borrar_inasistencia.php?idalumno="+ tid + "&dia=" +tdia+"&mes="+tmes+"&curso="+tcurso;
	 //alert(url);
	xhttp.open("GET", url, true);
	xhttp.send();
	//alert("Inasistencia Removida.");	 

}

}


function checkON(idnum){
	document.getElementById(idnum).checked = true;
}

function eliminarSabDom(cantDias,tid,tmes,tcurso){

	  alert(tid+"_"+cantDias+"_"+tmes+"_"+tcurso);

	
}