
function sendToServer(element){
 
 var tid = element.id.replace(/_[12]{1}/gi, "");
 var tnumobs = element.name;
 var tnvalor = element.value;
//alert(tid + " " + tnumobs + nvalor );
 var xhttp = new XMLHttpRequest();
 var url="http://www.sgsintranet.cl/registro_obs.php?idalumno="+ tid + "&numobs=" +tnumobs+"&nvalor="+tnvalor;
 //alert(url);
 xhttp.open("GET", url, true);
 xhttp.send();

   
}