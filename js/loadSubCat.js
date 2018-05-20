function loadSubCat(subType) {
	var html = "";
	var feild;
	switch(subType) {
		case 'school':
			feild = document.getElementById("one");
			if (feild.innerHTML != "") {
				feild.innerHTML = "";
				break;
			} else {
				html = "<span class='subCat shrink'>";
				html += "<p><a href='displayProspects.php?org=Elementary+School'>Elementary Schools</a></p>";
				html += "<p><a href='displayProspects.php?org=Middle+School'>Middle Schools</a></p>";
				html += "<p><a href='displayProspects.php?org=High+School'>High Schools</a></p>";
				html += "<p><a href='displayProspects.php?org=College'>Colleges & Universities</a></p>";
				html += "<p><a href='displayProspects.php?org=Other'>Other</a></p>";
				html += "</span>";
				feild.innerHTML = html;
				break;
			}
		case 'religions':
			feild = document.getElementById("two");
			if (feild.innerHTML != "") {
				feild.innerHTML = "";
				break;
			} else {
				html = "<span class='subCat shrink'>";
				html += "<p><a href='displayProspects.php?org=Church'>Churches</a></p>";
				html += "<p><a href='displayProspects.php?org=Mosque'>Mosques</a></p>";
				html += "<p><a href='displayProspects.php?org=Synogogue'>Synogogues</a></p>";
				feild.innerHTML = html;
				break;
			}
		/*
		case 'organizations':
			document.getElementById('three').innerHTML = "<span class='subCat'></span>";
			break;
		*/	
		
		default:
			break;
	}
}
