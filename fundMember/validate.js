
     <script type="text/javascript">
	 

     // Form validation code will come here.
      function validate()
      {
		  
		  if( document.myForm.fname.value == "" )
         {
            document.getElementById("fname").style.border="3px solid red";
            document.myForm.fname.focus() ;
            return false;
         }else {
			 document.getElementById("fname").style.border="1px solid black";
		 }
         
          if( document.myForm.lname.value == "" )
         {
            document.getElementById("lname").style.border="3px solid red";
            document.myForm.lname.focus() ;
            return false;
         }else {
			 document.getElementById("lname").style.border="1px solid black";
		 }
         
          if( document.myForm.address1.value == "" )
         {
            document.getElementById("address1").style.border="3px solid red";
            document.myForm.address1.focus() ;
            return false;
         }else {
			 document.getElementById("address1").style.border="1px solid black";
		 }
		 
         if( document.myForm.city.value == "" )
         {
            document.getElementById("city").style.border="3px solid red";
            document.myForm.state.focus() ;
            return false;
         }else {
			 document.getElementById("city").style.border="1px solid black";
		 }
		 
         if( document.myForm.state.value == "" )
         {
            document.getElementById("state").style.border="3px solid red";
            document.myForm.state.focus() ;
            return false;
         }else {
			 document.getElementById("state").style.border="1px solid black";
		 }
		 
         if( document.myForm.zip.value == "" )
         {
            document.getElementById("zip").style.border="3px solid red";
            document.myForm.zip.focus() ;
            return false;
         }else {
			 document.getElementById("zip").style.border="1px solid black";
		 }
         
         if( document.myForm.email.value == "" )
         {
            document.getElementById("email").style.border="3px solid red";
            document.myForm.email.focus() ;
            return false;
         }else {
			 document.getElementById("email").style.border="1px solid black";
		 }
         
         if( document.myForm.zip.value == "" ||
         isNaN( document.myForm.zip.value ) ||
         document.myForm.Zip.value.length != 5 )
         {
            document.getElementById("zip").style.border="3px solid red";
            document.myForm.zip.focus() ;
            return false;
         }else {
			 document.getElementById("zip").style.border="1px solid black";
		 }
         
         if( document.myForm.Country.value == "-1" )
         {
            document.getElementById("Country").style.border="3px solid red";
            return false;
         }else {
			 document.getElementById("Country").style.border="1px solid black";
		 }
	
		 
		 if(document.myForm.password == "" ||
		 document.myForm.cpassword == "" ||
		 document.myForm.password != document.myForm.cpassword )
		 {
			document.getElementById("password").style.border="3px solid red";
			document.getElementById("cpassword").style.border="3px solid red";
            document.myForm.password.focus() ;
            return false;
		 }else {
			 document.getElementById("password").style.border="1px solid black";
			 document.getElementById("cpassword").style.border="1px solid black";
		 }
		 
		 if(document.myForm.vpid == "Select VP Account")
		 {
			document.getElementById("vpid").style.border="3px solid red";
            document.myForm.password.focus();
            return false;
		 }else {
			 document.getElementById("vpid").style.border="1px solid black";
		 }
         
		 return( true );
      }
 
</script>