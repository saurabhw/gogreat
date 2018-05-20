// makes an ajax call to 'page' and inserts the result of which into 'id' (an html id)
var xmlhttp;
function loadXMLDoc(page, id) {
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	} else {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
			
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {	
			document.getElementById(id).innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET", page, true);
	xmlhttp.send();	
}
