function senToServer(element){
    
actualizar_prom(element.id.replace(/_n[1-9]{1}[0]{0,1}/gi, ""));
send(element.id.replace(/_n[1-9]{1}[0]{0,1}/gi, ""),element.id.replace(/[0-9]{0,1}[0-9]{0,1}[0-9]{0,1}_/gi, ""),element.value,element.name.replace(/_p[1-2]{1}/gi, ""),element.name.replace(/[a-zA-Z]{1,15}_/gi, ""));

if(element.value<4){ document.getElementById(element.id).style.color="red";}
else { document.getElementById(element.id).style.color="black";}
}

function actualizar_prom(numId){
	
	var total=0;
	var contador=0;

    for(i=1; i < 11; i++){
	  var idInput= numId.concat("_n").concat(String(i));
	  if (parseFloat(document.getElementById(idInput).value) > 0.00 ) { 
	  	 total += parseFloat(document.getElementById(idInput).value); 
	  	 contador += 1;
	  }
	  
	}
     var idInput= numId.concat("_prom");
     total=total.toFixed(2);
     total=total/contador;
     total=total.toFixed(2);
     var prom = Math.round(total* 10)/10;
   document.getElementById(idInput).value = prom;
   if(prom < 4){ document.getElementById(idInput).style.color="red";}
   else { document.getElementById(idInput).style.color="black";}
   actualizarProm(document.getElementById(idInput));
}

function send(tid,tcampo,tnuevoValor,tasignatura,tsemestre){

 var xhttp = new XMLHttpRequest();
 if(tnuevoValor=='') {tnuevoValor=0;}
 var url="http://www.sgsintranet.cl/registro_calificaciones.php?idalumno="+ tid + "&campo=" +tcampo+"&nuevovalor="+tnuevoValor+"&nasignatura="+tasignatura+"&nsemestre="+tsemestre;
 //alert(url);
xhttp.open("GET", url, true);
 xhttp.send();
   
}

function send2(tid,tcampo,tnuevoValor,tasignatura,tsemestre){

 var xhttp = new XMLHttpRequest();
 if(tnuevoValor=='') {tnuevoValor=0;}
 var url="http://www.sgsintranet.cl/registro_calificaciones_reli.php?idalumno="+ tid + "&campo=" +tcampo+"&nuevovalor="+tnuevoValor+"&nasignatura="+tasignatura+"&nsemestre="+tsemestre;
 //alert(url);
 xhttp.open("GET", url, true);
 xhttp.send();
   
}

function actualizarProm(elemento){
    
 send(elemento.id.replace(/_prom/gi, ""),'prom',elemento.value,elemento.name.replace(/_p[1-2]{1}/gi, ""),elemento.name.replace(/[a-zA-Z]{1,}_/gi, ""));   
    
}

function actualizarPromReligion(elemento,prom){
    
 send2(elemento.id.replace(/_n[1-9]{1}[0]{0,1}/gi, ""),'prom',prom,elemento.name.replace(/_p[1-2]{1}/gi, ""),elemento.name.replace(/[a-zA-Z]{1,}_/gi, ""));   
    
}

function actualizar_nombre(elemento){
    
 var xhttp = new XMLHttpRequest();
 var url="http://www.sgsintranet.cl/registro_nombre_calificacion.php?id="+ elemento.id.replace(/_n[1-9]{1}[0]{0,1}/gi, "") + "&campo=" +elemento.id.replace(/[0-9]{1,4}_/gi, "") +"&nuevovalor="+elemento.value;
 //alert(url);
 xhttp.open("GET", url, true);
 xhttp.send();
 }
 
 function actualizar_nota_religion(elemento){
    
 var xhttp = new XMLHttpRequest();
 var url="http://www.sgsintranet.cl/registro_calificaciones_reg.php?id="+ elemento.id.replace(/_n[1-9]{1}[0]{0,1}/gi, "") + "&campo=" +elemento.id.replace(/[0-9]{1,4}_/gi, "") +"&nuevovalor="+elemento.value+"&nasignatura="+elemento.name.replace(/_p[1-2]{1}/gi, "")+"&nsemestre="+elemento.name.replace(/[a-zA-Z]{1,}_/gi, "");
 //alert(url);
 xhttp.open("GET", url, true);
 xhttp.send();
 actualizar_prom_religion(elemento);
 }
 
 
 function actualizar_prom_religion(elemento,prom){
	
	var total=0;
	var contador=0;
	var numId = elemento.id.replace(/_n[1-9]{1}[0]{0,1}/gi, "");

            for(i=1; i < 11; i++)
            {
        	  var idInput= numId.concat("_n").concat(String(i));
        	  switch(document.getElementById(idInput).value.toString()) {
            case 'MB':
                total += 6.5;
                contador += 1;
                break;
            case 'B':
               contador += 1;
               total += 5.5;
                break;
            case 'S':
               contador += 1;
               total += 4.5;
                break;
            case 'I':
               contador += 1;
               total += 3.5;
                break;
            default:
               break;
            }
	 
            }
    var idInput= numId.concat("_prom");
   // alert("El total es "+ total + " y el contador es " + String(contador));
    var prom=total/contador
   if (prom < 4) {
    prom='I';
} else if (prom < 5) {
    prom='S';
} else if (prom < 6) {
    prom='B';
} else if (prom < 7) {
    prom='MB';
}
 document.getElementById(idInput).value = prom;
 actualizarPromReligion(elemento,prom);
}