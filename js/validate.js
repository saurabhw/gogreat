String.prototype.trim = function() { return this.replace(/^\s+|\s+$/, ''); };
function validateForm() {
	var x = document.forms["addOrg"]["clubTeam"].value;
	if (x==null || x=="") {
		alert("Club name must be filled out");
		return false;
	}
	x = document.forms["addOrg"]["orgName"].value;
	if (x==null || x=="") {
		alert("Organization name must be filled out");
		return false;
	}
	x = document.forms["addOrg"]["phone"].value;
	if (x==null || x=="") {
		alert("Phone number must be filled out");
		return false;
	}
	x = document.forms["addOrg"]["street"].value;
	if (x==null || x=="") {
		alert("Street address must be filled out");
		return false;
	}
	x = document.forms["addOrg"]["city"].value;
	if (x==null || x=="") {
		alert("City must be filled out");
		return false;
	}
	x = document.forms["addOrg"]["state"].value;
	if (x==null || x=="") {
		alert("State must be filled out");
		return false;
	}
	x = document.forms["addOrg"]["zip"].value;
	if (x==null || x=="") {
		alert("Zip code must be filled out");
		return false;
	}
	x = document.forms["addOrg"]["FName"].value;
	if (x==null || x=="") {
		alert("First Name must be filled out");
		return false;
	}
	x = document.forms['addOrg']['LName'].value;
	if (x==null || x=="") {
		alert("Last Name must be filled out");
		return false;
	}
	x = document.forms['addOrg']['email'].value;
	if (x==null || x=="") {
		alert("Email must be filled out");
		return false;
	} else if (x.indexOf(".") == -1 || x.indexOf("@") == -1) {
		alert("Please enter a valid Email");
		return false;
	}
}
