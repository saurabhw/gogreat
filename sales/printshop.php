<?
     include '../includes/autoload.php';
       if(!isset($_SESSION['authenticated']) || $_SESSION['role'] != "SC")
       {
            header('Location: ../repSignup.php');
            exit;
       }
       if($_SESSION['freeze'] == "TRUE")
       {
          // echo "Account Frozen";
           header('Location: accountEdit.php');
       }
     $userID = $_SESSION['userId'];
     
     $query = "SELECT * FROM user_info 	WHERE userInfoID='$userID'";
     $result = mysqli_query($link, $query)or die ("couldn't execute query.".mysql_error($link));
     $row = mysqli_fetch_assoc($result);
     $myPic = $row['picPath'];
?>

<!DOCTYPE html>
<head>
	<title>Printshop | Representative</title>
</head>
	
<body>
<div id="container">
      <?php include 'header.inc.php' ; ?>
      <?php include 'sidenav.php' ; ?>
      
    <div id="content">
    <h1>Printshop</h1>
    <h3>Forms to Download &/or Print</h3>

	<div id >
      	   <h5>Account List Research Prospect Forms:</h5>
      	   
      	      <ul> <!-- Pam, If you're doing a list, remember to have those 'li' tags inside the 'ul' tag -->
   	   	<li>
   	   	    High School Prospects List Form &nbsp; <a href="../forms/V16.0 High School Prospects List Form.doc">DOC</a> | 
    	   	   <a href="../forms/V16.0 High School Prospects List Form.pdf" target="_blank" title="Click to download file">PDF</a>
   	   	</li>
   	   	<li>
   	   	    Middle School Prospects List Form &nbsp; <a href="../forms/V16.0 Middle School Prospects List Form.doc">DOC</a> |
   	           <a href="../forms/V16.0 Middle School Prospects List Form.pdf" target="_blank" title="Click to download file">PDF</a>
               </li>
   	        <li>
     	            Elementary School Prospects List Form &nbsp; <a href="../forms/V16.0 Elementary School Prospects List Form.doc">DOC</a> |
   	           <a href="../forms/V16.0 Elementary School Prospects List Form.pdf" target="_blank" title="Click to download file">PDF</a>
               </li>
               <li>
     	           School Fundraising Leaders Notes &nbsp;  <a href="../forms/V16.0 School Fundraising Leaders Team Notes List Form.doc">DOC</a> |
   	           <a href="../forms/V16.0 School Fundraising Leaders Team Notes List Form.pdf" target="_blank" title="Click to download file">PDF</a>
               </li>
               <li>
     	           Church Prospects List Form &nbsp; <a href="../forms/V16.0 Religious or Church Prospects List Form.doc">DOC</a> |
   	           <a href="../forms/V16.0 Religious or Church Prospects List Form.pdf" target="_blank" title="Click to download file">PDF</a>
               </li>
               <li>
     	            Organization Prospects List Form &nbsp; <a href="../forms/V16.0 Organization Prospects List Form.doc">DOC</a> |
   	           <a href="../forms/V16.0 Organization Prospects List Form.pdf" target="_blank" title="Click to download file">PDF</a>
               </li>
                        
              </ul>   
                <br>
              
            <h5>Appointment, Website Set-Up, Notes and Referral Forms:</h5>
               <ul> 
               <li>
     	            School Appointment & Referral Form &nbsp; <a href="../forms/V16.0 School Appointment Website Set-Up Notes and Referral Form.doc">DOC</a> |
   	           <a href="../forms/V16.0 School Appointment Website Set-Up Notes and Referral Form.pdf" target="_blank" title="Click to download file">PDF</a>
               </li>
                <li>
     	            Church Appointment & Referral Form &nbsp; <a href="../forms/V16.0 Church Contact Goal Website Setup Notes Form.doc">DOC</a> |
   	           <a href="../forms/V16.0 Church Contact Goal Website Setup Notes Form.pdf" target="_blank" title="Click to download file">PDF</a>
               </li>
                <li>
     	            Organization Appointment & Referral Form &nbsp; <a href="../forms/V16.0 Organization Contact Goal Website Setup Notes Form.doc">DOC</a> |
   	           <a href="../forms/V16.0 Organization Contact Goal Website Setup Notes Form.pdf" target="_blank" title="Click to download file">PDF</a>
               </li>


   	       </ul>
   	       <br>
   	       
   	       
   	     <h5>Sales Rep Checklists:</h5>
   	       <ul>
   	       <li> 
     	                 Representative Daily Fundraiser Sales and Call Report &nbsp; <a href="../forms/V17.0 Representative Daily Sales and Call Report Form.doc">DOC</a> |
   	   		<a href="../forms/V17.0 Representative Daily Sales and Call Report Form.pdf" target="_blank" title="Click to download file">PDF</a>
   		</li>
   		<li> 
     	                 Referral Form &nbsp; <a href="../forms/V16.0 Referral Form.doc">DOC</a> |
   	   		<a href="../forms/V16.0 Referral Form.pdf" target="_blank" title="Click to download file">PDF</a>
   		</li>
                <li> 
     	                30 Day Fundraising Form &nbsp; <a href="../forms/V17.0 Representative 30 Daily Fundraising Form.doc">DOC</a> |
   	   		<a href="../forms/V17.0 Representative 30 Daily Fundraising Form.pdf" target="_blank" title="Click to download file">PDF</a>
   		</li>
   		 </ul>
   		<br>
   		
   		<h5>Fundraising Account Forms:</h5>
   	       <ul>
   		 <li> 
     	                 Student/Member Leave Behind Form &nbsp; <a href="../forms/v17.0 Student Member Fundraising Leave Behind Form.doc">DOC</a> |
   	   		<a href="../forms/v17.0 Student Member Fundraising Leave Behind Form.pdf" target="_blank" title="Click to download file">PDF</a>
   		</li>
   		 <li> 
     	                Friends, Family or Business Contact Names &nbsp; <a href="../forms/V17.0 Friends, Family or Business Contact Names Form.doc">DOC</a> |
   	   		<a href="../forms/V17.0 Friends, Family or Business Contact Names Form.pdf" target="_blank" title="Click to download file">PDF</a>
   		</li>
              </ul>
              <br>
              
              <h5>Presentations:</h5>
   	       <ul>
   	       <li> 
     	                 GreatMoods Presentation &nbsp; <a href="../forms/greatmoods_marketing_packet_v4.docx">DOC</a> |
   	   		<a href="../forms/greatmoods_marketing_packet_v4.pdf" target="_blank" title="Click to download file">PDF</a>
   		</li>
                 <li> 
     	                 Prospect Presentation Script &nbsp; <a href="../forms/The Fundraising Prospect Presentation.doc">DOC</a> |
   	   		<a href="../forms/The Fundraising Prospect Presentation.pdf" target="_blank" title="Click to download file">PDF</a>
   		</li>

   	 	
   	</ul>
	</div> <!--end column1-->
    
	<div id="column2">
	   <!-- <div>
	    	<img src="" width="404" height="270" alt="">
		<img class="imgLeft" src="" width="198" height="166" alt="">
		<img class="imgRight" src="" width="198" height="166" alt="">
	    </div>-->

	</div>    <!--end column2--> 
      </div>  <!--end content-->
      
	<?php include 'footer.php' ; ?>
</div> <!--end container-->

</body>
</html>
<pre>
<?php if ($_POST && $mailSent){
	echo htmlentities($message, ENT_COMPAT, 'UTF-8')."\n";
	echo 'Headers: '.htmlentities($headers, ENT_COMPAT, 'UTF-8');
} ?>
</pre>
<?php
   ob_end_flush();
?>